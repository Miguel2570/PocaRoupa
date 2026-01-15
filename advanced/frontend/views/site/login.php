<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>

<div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="mb-8">
        <a href="<?= Url::to(['site/index']) ?>" class="text-3xl font-bold block text-center text-gray-900 no-underline hover:no-underline">
            Poca<span class="bg-gradient-to-r from-rose-500 to-pink-500 bg-clip-text text-transparent">Roupa</span>
        </a>
    </div>

    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-pink-100">

        <div class="text-center">
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Bem-vinda de volta!</h2>
            <p class="mt-2 text-sm text-gray-600">
                Entre na sua conta para aceder aos seus favoritos e encomendas.
            </p>
        </div>

        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'mt-8 space-y-6'],
                'fieldConfig' => [
                        'template' => "{label}\n<div class=\"relative\">{input}</div>\n{error}",
                        'labelOptions' => ['class' => 'block text-sm font-medium text-gray-700 mb-1'],
                        'inputOptions' => ['class' => 'appearance-none block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm'],
                ],
        ]); ?>

        <div class="space-y-4">

            <?= $form->field($model, 'username', [
                    'template' => "{label}\n<div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none\">
                            <i class=\"fas fa-envelope text-gray-400\"></i>
                        </div>
                        {input}
                    </div>\n{error}"
            ])->textInput(['placeholder' => 'seu.email@exemplo.com', 'autofocus' => true])->label('Email') ?>

            <?= $form->field($model, 'password', [
                    'template' => "{label}\n<div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none\">
                            <i class=\"fas fa-lock text-gray-400\"></i>
                        </div>
                        {input}
                    </div>\n{error}"
            ])->passwordInput(['placeholder' => '••••••••']) ?>

        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"flex items-center\">{input} {label}</div>",
                        'class' => 'h-4 w-4 text-rose-600 focus:ring-rose-500 border-gray-300 rounded',
                        'labelOptions' => ['class' => 'ml-2 block text-sm text-gray-900']
                ]) ?>
            </div>

            <div class="text-sm">
                <a href="<?= Url::to(['site/request-password-reset']) ?>" class="font-medium text-rose-600 hover:text-rose-500">
                    Esqueceu a password?
                </a>
            </div>
        </div>

        <div>
            <?= Html::submitButton(
                    '<span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-arrow-right text-rose-200 group-hover:text-white"></i>
                    </span>
                    Entrar',
                    ['class' => 'group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 shadow-md hover:shadow-lg transition-all', 'name' => 'login-button']
            ) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Ainda não tem conta?
                <a href="<?= Url::to(['site/signup']) ?>" class="font-medium text-rose-600 hover:text-rose-500 transition-colors">
                    Registe-se aqui
                </a>
            </p>
        </div>

    </div>
</div>