<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Registar';
?>

<div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="mb-8">
        <a href="<?= Url::to(['site/index']) ?>" class="text-3xl font-bold block text-center text-gray-900 no-underline hover:no-underline">
            Poca<span class="bg-gradient-to-r from-rose-500 to-pink-500 bg-clip-text text-transparent">Roupa</span>
        </a>
    </div>

    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-pink-100">

        <div class="text-center">
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Crie a sua conta</h2>
            <p class="mt-2 text-sm text-gray-600">
                Junte-se à comunidade PocaRoupa e receba ofertas exclusivas.
            </p>
        </div>

        <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
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
                            <i class=\"fas fa-user text-gray-400\"></i>
                        </div>
                        {input}
                    </div>\n{error}"
            ])->textInput(['placeholder' => 'Maria Silva', 'autofocus' => true])->label('Nome de Utilizador') ?>

            <?= $form->field($model, 'email', [
                    'template' => "{label}\n<div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none\">
                            <i class=\"fas fa-envelope text-gray-400\"></i>
                        </div>
                        {input}
                    </div>\n{error}"
            ])->textInput(['placeholder' => 'seu.email@exemplo.com']) ?>

            <?= $form->field($model, 'password', [
                    'template' => "{label}\n<div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none\">
                            <i class=\"fas fa-lock text-gray-400\"></i>
                        </div>
                        {input}
                    </div>\n{error}"
            ])->passwordInput(['placeholder' => '••••••••']) ?>

            <?php if (property_exists($model, 'confirmPassword')): ?>
                <?= $form->field($model, 'confirmPassword', [
                        'template' => "{label}\n<div class=\"relative\">
                            <div class=\"absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none\">
                                <i class=\"fas fa-lock text-gray-400\"></i>
                            </div>
                            {input}
                        </div>\n{error}"
                ])->passwordInput(['placeholder' => '••••••••'])->label('Confirmar Password') ?>
            <?php endif; ?>

        </div>

        <div>
            <?= Html::submitButton(
                    '<span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-arrow-right text-rose-200 group-hover:text-white"></i>
                    </span>
                    Criar Conta',
                    ['class' => 'group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 shadow-md hover:shadow-lg transition-all', 'name' => 'signup-button']
            ) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Já tem conta?
                <a href="<?= Url::to(['site/login']) ?>" class="font-medium text-rose-600 hover:text-rose-500 transition-colors">
                    Fazer Login
                </a>
            </p>
        </div>

    </div>
</div>