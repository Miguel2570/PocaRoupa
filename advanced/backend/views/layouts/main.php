<?php
use backend\assets\AdminAsset;
use yii\helpers\Html;

AdminAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-md-2 bg-dark min-vh-100 p-3">
            <h5 class="text-white">Admin Panel</h5>
            <hr class="text-secondary">

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/backend/web/dashboard">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="/backend/web/user">
                        <i class="bi bi-people"></i> Utilizadores
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <?= Html::beginForm(['/site/logout'], 'post') ?>
                    <?= Html::submitButton('Sair', ['class' => 'btn btn-danger w-100']) ?>
                    <?= Html::endForm() ?>
                </li>
            </ul>
        </aside>

        <!-- CONTEÚDO -->
        <main class="col-md-10 p-4">
            <?= $content ?>
        </main>

    </div>
</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
