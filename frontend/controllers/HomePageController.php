<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Controlador para a Página Inicial da PocaRoupa
 */
class HomePageController extends Controller
{
    /**
     * Ação principal (index)
     * Acede-se via: HomePage.php?r=home-page/index
     */
    public function actionIndex()
    {
        // Isto vai renderizar a vista que criaremos no Passo 2
        return $this->render('HomePage');
    }
}