<?php

namespace common\models;

class ProductData
{
    /**
     * Retorna todos os produtos (Simulação de Base de Dados).
     */
    public static function getAll()
    {
        return [
            // Roupa - Mais Vendidos
            ['id' => 1, 'name' => 'Vestido Floral Verão', 'price' => 79.90, 'image' => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=500', 'old_price' => 99.90, 'rating' => 5, 'category' => 'clothing', 'isBestseller' => true, 'isNew' => false],
            ['id' => 2, 'name' => 'Blusa Romântica Rosa', 'price' => 45.90, 'image' => 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=500', 'rating' => 5, 'category' => 'clothing', 'isBestseller' => true, 'isNew' => false],
            ['id' => 3, 'name' => 'Saia Plissada Midi', 'price' => 55.90, 'image' => 'https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=500', 'rating' => 4, 'category' => 'clothing', 'isBestseller' => true, 'isNew' => false],
            ['id' => 4, 'name' => 'Casaco Tricot Suave', 'price' => 89.90, 'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500', 'rating' => 5, 'category' => 'clothing', 'isBestseller' => true, 'isNew' => false],

            // Roupa - Novidades
            ['id' => 5, 'name' => 'Vestido Longo Elegante', 'price' => 129.90, 'image' => 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=500', 'rating' => 5, 'category' => 'clothing', 'isBestseller' => false, 'isNew' => true],
            ['id' => 6, 'name' => 'Top Cropped Estampado', 'price' => 35.90, 'image' => 'https://images.unsplash.com/photo-1624206112918-ad968e3322b5?w=500', 'rating' => 4, 'category' => 'clothing', 'isBestseller' => false, 'isNew' => true],

            // Acessórios
            ['id' => 13, 'name' => 'Bolsa Tote Rosa', 'price' => 89.90, 'image' => 'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=500', 'rating' => 5, 'category' => 'accessories', 'isBestseller' => true, 'isNew' => false],
            ['id' => 14, 'name' => 'Óculos Sol Vintage', 'price' => 65.90, 'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=500', 'rating' => 4, 'category' => 'accessories', 'isBestseller' => true, 'isNew' => false],
            ['id' => 15, 'name' => 'Ténis Brancos Classic', 'price' => 95.90, 'image' => 'https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?w=500', 'rating' => 5, 'category' => 'accessories', 'isBestseller' => true, 'isNew' => false],
        ];
    }

    /**
     * Encontra um produto pelo ID.
     */
    public static function find($id)
    {
        foreach (self::getAll() as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }
}