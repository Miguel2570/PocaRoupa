<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\ProductData; // Importa do common

class CartController extends Controller
{
    /**
     * Página do Carrinho.
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $cartItemsSession = $session->get('cart', []);
        $cartProducts = [];
        $subtotal = 0;

        foreach ($cartItemsSession as $id => $quantity) {
            $product = ProductData::find($id);
            if ($product) {
                $product['quantity'] = $quantity;
                $cartProducts[] = $product;
                $subtotal += $product['price'] * $quantity;
            }
        }

        $shipping = $subtotal > 50 || $subtotal == 0 ? 0 : 4.95;
        $total = $subtotal + $shipping;

        return $this->render('index', [
            'products' => $cartProducts,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }

    /**
     * Adicionar produto ao carrinho.
     */
    public function actionAdd($id)
    {
        $session = Yii::$app->session;
        $cart = $session->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $session->set('cart', $cart);
        Yii::$app->session->setFlash('success', 'Produto adicionado ao carrinho!');

        // Redireciona para onde o utilizador estava (geralmente uma página do catálogo)
        return $this->redirect(Yii::$app->request->referrer ?: ['site/index']);
    }

    /**
     * Atualizar quantidade (+/-).
     */
    public function actionUpdate($id, $change)
    {
        $session = Yii::$app->session;
        $cart = $session->get('cart', []);

        if (isset($cart[$id])) {
            if ($change === 'increase') {
                $cart[$id]++;
            } elseif ($change === 'decrease') {
                $cart[$id]--;
                if ($cart[$id] <= 0) {
                    unset($cart[$id]);
                }
            }
        }

        $session->set('cart', $cart);
        return $this->redirect(['index']);
    }

    /**
     * Remover produto do carrinho.
     */
    public function actionRemove($id)
    {
        $session = Yii::$app->session;
        $cart = $session->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
            Yii::$app->session->setFlash('success', 'Produto removido do carrinho.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Página de Checkout.
     */
    /**
     * Página de Checkout.
     */
    public function actionCheckout()
    {
        // 1. Recuperar o carrinho da sessão (mesma lógica do actionIndex)
        $session = Yii::$app->session;
        $cartItemsSession = $session->get('cart', []);
        $cartProducts = [];
        $subtotal = 0;

        foreach ($cartItemsSession as $id => $quantity) {
            $product = ProductData::find($id); // Busca o produto ao model simulado
            if ($product) {
                $product['quantity'] = $quantity;
                $cartProducts[] = $product;
                $subtotal += $product['price'] * $quantity;
            }
        }

        // 2. Calcular totais
        $shipping = $subtotal > 50 || $subtotal == 0 ? 0 : 4.95;
        $total = $subtotal + $shipping;

        // 3. Renderizar a view passando as variáveis necessárias
        return $this->render('checkout', [
            'cart' => $cartProducts,      // <--- AQUI está a correção para o erro "$cart undefined"
            'products' => $cartProducts,  // Envio também como 'products' caso uses esse nome
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }
}