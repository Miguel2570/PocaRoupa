<?php
/** @var array $products */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'PocaRoupa - Meus Favoritos';
$count = count($products);
?>

<div class="container mx-auto px-4 py-12 min-h-[60vh]">

    <div class="mb-12 text-center animate-fade-in-down">
        <div class="inline-flex items-center gap-3 bg-gradient-to-r from-rose-500 to-pink-500 text-white px-8 py-3 rounded-full mb-6 shadow-lg shadow-pink-200/50">
            <i class="fas fa-heart text-xl animate-pulse"></i>
            <span class="text-lg font-bold tracking-wide">Meus Favoritos</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Sua Lista de Desejos</h1>
        <p class="text-gray-500">
            <?php if ($count > 0): ?>
                Você guardou <strong><?= $count ?></strong> <?= $count === 1 ? 'item especial' : 'itens especiais' ?>.
            <?php else: ?>
                Sua lista está à espera de novos looks.
            <?php endif; ?>
        </p>
    </div>

    <?php if ($count === 0): ?>

        <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-pink-50 max-w-2xl mx-auto">
            <div class="mb-6 relative inline-block">
                <div class="absolute inset-0 bg-pink-100 rounded-full blur-xl opacity-50"></div>
                <i class="far fa-heart text-8xl text-rose-300 relative z-10"></i>
            </div>
            <h3 class="text-2xl text-gray-800 mb-3 font-bold">Lista vazia?</h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">Explore a nossa coleção e clique no coração para guardar os seus favoritos para mais tarde.</p>
            <a href="<?= Url::to(['site/index']) ?>" class="inline-flex items-center gap-2 bg-gray-900 text-white px-8 py-3 rounded-full font-medium hover:bg-gray-800 transition-all hover:-translate-y-1 shadow-lg">
                Começar a Explorar <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>

    <?php else: ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-2xl overflow-hidden hover:shadow-2xl hover:shadow-pink-100/50 transition-all duration-300 border border-gray-100 group flex flex-col relative">

                    <div class="relative overflow-hidden aspect-[3/4]">
                        <?php if (isset($product['old_price']) && $product['price'] < $product['old_price']): ?>
                            <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded shadow-md z-10">
                                -<?= round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) ?>%
                            </span>
                        <?php endif; ?>

                        <a href="<?= Url::to(['site/product', 'id' => $product['id']]) ?>">
                            <img src="<?= Html::encode($product['image']) ?>" alt="<?= Html::encode($product['name']) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </a>

                        <a href="<?= Url::to(['site/remove-favorite', 'id' => $product['id']]) ?>"
                           class="absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full shadow-md text-rose-500 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all transform hover:rotate-90"
                           title="Remover dos favoritos"
                           data-method="post"> <i class="fas fa-times"></i>
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex-1">
                            <p class="text-xs text-gray-400 mb-1 uppercase tracking-wider">Categoria</p> <a href="<?= Url::to(['site/product', 'id' => $product['id']]) ?>" class="block group-hover:text-rose-600 transition-colors">
                                <h3 class="font-bold text-gray-800 line-clamp-1 mb-1" title="<?= Html::encode($product['name']) ?>">
                                    <?= Html::encode($product['name']) ?>
                                </h3>
                            </a>

                            <div class="flex items-center gap-1 mb-3 text-xs">
                                <?php for($i=1; $i<=5; $i++): ?>
                                    <i class="<?= $i <= $product['rating'] ? 'fas' : 'far' ?> fa-star text-yellow-400"></i>
                                <?php endfor; ?>
                                <span class="text-gray-400 ml-1">(<?= $product['rating'] ?>)</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                            <div class="flex flex-col">
                                <?php if (isset($product['old_price'])): ?>
                                    <span class="text-xs text-gray-400 line-through">€<?= number_format($product['old_price'], 2, ',', '.') ?></span>
                                <?php endif; ?>
                                <span class="text-xl font-bold text-rose-600">
                                    €<?= number_format($product['price'], 2, ',', '.') ?>
                                </span>
                            </div>

                            <button onclick="addToCart('<?= Html::encode($product['name']) ?>')" class="w-10 h-10 rounded-full bg-gray-100 text-gray-800 hover:bg-rose-500 hover:text-white transition-all flex items-center justify-center shadow-sm hover:shadow-lg">
                                <i class="fas fa-shopping-bag"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

</div>