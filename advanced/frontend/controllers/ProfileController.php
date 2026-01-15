<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\ProductData; // Importa do common

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Apenas logados podem ver perfil
                    ],
                    // Se quiseres que os favoritos sejam públicos/para convidados, adiciona esta regra:
                    [
                        'actions' => ['favorites', 'add-favorite', 'remove-favorite'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * Painel principal do utilizador.
     */
    public function actionIndex()
    {
        $user = [
            'name' => Yii::$app->user->isGuest ? 'Visitante' : Yii::$app->user->identity->username,
            'email' => Yii::$app->user->isGuest ? 'visitante@exemplo.com' : Yii::$app->user->identity->email,
            'phone' => '+351 912 345 678',
            'memberSince' => 'Janeiro 2024'
        ];

        $orders = [
            ['id' => '#ORD-7829', 'date' => '28 Dez 2024', 'status' => 'Entregue', 'total' => '€125.80', 'items' => ['Vestido Floral Verão', 'Colar Delicado']],
        ];

        return $this->render('index', [
            'user' => $user,
            'orders' => $orders
        ]);
    }

    // --- FAVORITOS ---

    public function actionFavorites()
    {
        $session = Yii::$app->session;
        if (!$session->has('wishlist')) {
            $session->set('wishlist', [1, 5]); // Lista inicial de exemplo
        }
        $wishlistIds = $session->get('wishlist');

        $favorites = array_filter(ProductData::getAll(), function($p) use ($wishlistIds) {
            return in_array($p['id'], $wishlistIds);
        });

        return $this->render('favorites', ['products' => $favorites]);
    }

    public function actionAddFavorite($id)
    {
        $session = Yii::$app->session;
        $wishlist = $session->get('wishlist', []);

        if (!in_array($id, $wishlist)) {
            $wishlist[] = (int)$id;
            $session->set('wishlist', $wishlist);
            Yii::$app->session->setFlash('success', 'Produto adicionado aos favoritos!');
        }

        return $this->redirect(Yii::$app->request->referrer ?: ['site/index']);
    }

    public function actionRemoveFavorite($id)
    {
        $session = Yii::$app->session;
        $wishlist = $session->get('wishlist', []);

        if (($key = array_search($id, $wishlist)) !== false) {
            unset($wishlist[$key]);
            $session->set('wishlist', array_values($wishlist));
            Yii::$app->session->setFlash('success', 'Produto removido dos favoritos.');
        }

        return $this->redirect(['favorites']);
    }
}