<?php
$this->title = 'Dashboard';
?>

<h3>Dashboard</h3>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total de Utilizadores</h6>
                <h2><?= $totalUsers ?></h2>
            </div>
        </div>
    </div>
</div>

<canvas id="usersChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('usersChart'), {
        type: 'line',
        data: {
            labels: <?= json_encode($months) ?>,
            datasets: [{
                label: 'Registos',
                data: <?= json_encode($data) ?>,
                borderWidth: 2
            }]
        }
    });
</script>
