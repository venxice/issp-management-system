<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditLogModel extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $allowedFields = [
        'user_id',
        'action',
        'description',
        'metadata',
        'created_at',
        'page_url',
        'user_agent',
        'ip_address',
        'new_data',
        'contact_number',
        'position',
    ];

    protected $beforeInsert = ['populateRequestData'];

    public function recent(int $limit = 10): array
    {
        return $this->select('logs.*, logs.page_url, logs.user_agent, logs.ip_address, logs.new_data, logs.contact_number, logs.position, users.name AS user_name, users.email AS user_email, roles.name AS role_name, departments.name AS department_name, positions.name AS position_name')
            ->join('users', 'users.id = logs.user_id', 'left')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->join('positions', 'positions.id = users.position_id', 'left')
            ->orderBy('logs.created_at', 'DESC')
            ->findAll($limit);
    }

    protected function populateRequestData(array $data): array
    {
        $request = \Config\Services::request();
        $now = date('Y-m-d H:i:s');

        if (! isset($data['data']['created_at']) || $data['data']['created_at'] === null) {
            $data['data']['created_at'] = $now;
        }

        if (! isset($data['data']['page_url']) || $data['data']['page_url'] === null) {
            $data['data']['page_url'] = (string) $request->getURI();
        }

        if (! isset($data['data']['user_agent']) || $data['data']['user_agent'] === null) {
            $data['data']['user_agent'] = (string) $request->getUserAgent();
        }

        if (! isset($data['data']['ip_address']) || $data['data']['ip_address'] === null) {
            $data['data']['ip_address'] = (string) $request->getIPAddress();
        }

        if (! isset($data['data']['new_data']) || $data['data']['new_data'] === null || $data['data']['new_data'] === '') {
            try {
                $jsonBody = $request->getJSON(true);
            } catch (\Exception $e) {
                $jsonBody = null;
            }

            if (! empty($jsonBody) && is_array($jsonBody)) {
                $data['data']['new_data'] = json_encode($jsonBody, JSON_UNESCAPED_SLASHES);
            } else {
                $raw = (string) $request->getBody();
                if ($raw !== '') {
                    $trim = trim($raw);
                    if (($trim !== '') && (($trim[0] ?? '') === '{' || ($trim[0] ?? '') === '[')) {
                        $data['data']['new_data'] = $raw;
                    } else {
                        $post = $request->getPost();
                        if (! empty($post) && is_array($post)) {
                            $data['data']['new_data'] = json_encode($post, JSON_UNESCAPED_SLASHES);
                        }
                    }
                }
            }

            if (empty($data['data']['new_data']) || $data['data']['new_data'] === '') {
                if (isset($data['data']['metadata']) && $data['data']['metadata'] !== null && $data['data']['metadata'] !== '') {
                    $md = $data['data']['metadata'];
                    $data['data']['new_data'] = is_scalar($md) ? (string) $md : json_encode($md, JSON_UNESCAPED_SLASHES);
                } elseif (isset($data['data']['description']) && is_string($data['data']['description'])) {
                    $desc = trim($data['data']['description']);
                    if (($desc !== '') && (($desc[0] ?? '') === '{' || ($desc[0] ?? '') === '[')) {
                        $decoded = json_decode($desc, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $data['data']['new_data'] = json_encode($decoded, JSON_UNESCAPED_SLASHES);
                        }
                    }
                }
            }
        }

        return $data;
    }
}
