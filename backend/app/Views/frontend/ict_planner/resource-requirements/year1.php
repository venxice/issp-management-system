<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$resources = [
    [
        'type' => 'Hardware'
        'description' => 'Desktop Computers'
        'quantity' => '10',
        'cost' => '300000'
    ],
    [
        'type' => 'Software'
        'description' => 'Microsoft Office Licenses'
        'quantity' => '10',
        'cost' => '500000'
    ],
    [
        'type' => 'Network'
        'description' => 'Network Switches'
        'quantity' => '2',
        'cost' => '200000'
    ]
];

$total = array_sum(array_column($resources, 'cost'));
?>

<div class="card">
    <div class="card-header">
          <h3>Year 1 Resource Requirements</h3>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                 </tr> 
          </thead>   
          <tbody>
               <?php for each ($resources as $resource) : ?>
                <tr>
                    <td><?= esc($resource['type']) ?></td>
                        <td><?= esc($resource['description']) ?></td>
                        <td><?= esc($resource['quantity']) ?></td>
                        <td>₱<?= number_format($resource['cost'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h5 class="mt-3">
            Total Budget: ₱<?= number_format($total, 2) ?>
        </h5>
    </div>
</div>

<?= $this->endSection() ?>
