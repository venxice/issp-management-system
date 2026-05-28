<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DbTest extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        if ($db->connect()) {
            echo "Database connection SUCCESS";
        } else {
            echo "Database connection FAILED";
        }
    }
}