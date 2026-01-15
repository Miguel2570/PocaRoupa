<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\ProductData; // Importa do common
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionClothing()
    {
        $clothing = array_filter(ProductData::getAll(), function($p) {
            return $p['category'] === 'clothing';
        });
        // Nota: Deves mover o ficheiro clothing.php para views/catalog/
        return $this->render('clothing', ['products' => $clothing]);
    }

    public function actionAccessories()
    {
        $accessories = array_filter(ProductData::getAll(), function($p) {
            return $p['category'] === 'accessories';
        });
        return $this->render('accessories', ['products' => $accessories]);
    }

    public function actionBestsellers()
    {
        $bestsellers = array_filter(ProductData::getAll(), function($p) {
            return $p['isBestseller'] === true;
        });
        return $this->render('bestsellers', ['products' => $bestsellers]);
    }

    public function actionNew()
    {
        $newArrivals = array_filter(ProductData::getAll(), function($p) {
            return $p['isNew'] === true;
        });
        return $this->render('new', ['products' => $newArrivals]);
    }

    public function actionProduct($id)
    {
        $product = ProductData::find($id);

        if (!$product) {
            throw new NotFoundHttpException("Produto não encontrado.");
        }

        return $this->render('product-details', ['product' => $product]);
    }
}