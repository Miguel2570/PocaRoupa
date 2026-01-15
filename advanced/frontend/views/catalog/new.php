<?php
/** @var array $products */
use yii\helpers\Url;
$this->title = 'PocaRoupa - Novidades';
?>

<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <div class="lg:col-span-3 hidden lg:block">
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 shadow-lg rounded-lg h-full overflow-hidden border border-pink-200">
                <nav class="p-2">
                    <ul class="space-y-1">
                        <?php
                        $cats = [
                            ['l'=>'Início', 'i'=>'fa-home', 'u'=>'site/index', 'a'=>false],
                            ['l'=>'Mais Vendidos', 'i'=>'fa-shopping-bag', 'u'=>'site/bestsellers', 'a'=>false],
                            ['l'=>'Novidades', 'i'=>'fa-plus-square', 'u'=>'site/new', 'a'=>true], // Ativo
                            ['l'=>'Roupa', 'i'=>'fa-tshirt', 'u'=>'site/clothing', 'a'=>false],
                            ['l'=>'Acessórios', 'i'=>'fa-clock', 'u'=>'site/accessories', 'a'=>false],
                            ['l'=>'Contactos', 'i'=>'fa-envelope', 'u'=>'site/contact', 'a'=>false],
                        ];
                        foreach($cats as $c): ?>
                            <li>
                                <a href="<?= Url::to([$c['u']]) ?>" class="flex items-center gap-3 px-4 py-3 w-full text-left rounded-lg transition-all <?= $c['a'] ? 'bg-gradient-to-r from-rose-500 to-pink-500 text-white shadow-md' : 'text-gray-700 hover:bg-white/70' ?>">
                                    <i class="fas <?= $c['i'] ?> w-5"></i>
                                    <span><?= $c['l'] ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:col-span-9">

            <div class="mb-12 text-center py-6">
                <div class="inline-flex items-center gap-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-4 rounded-full mb-4 shadow-lg">
                    <i class="fas fa-magic text-2xl"></i>
                    <span class="text-xl font-bold">Novidades</span>
                </div>
                <p class="text-gray-600 text-lg">As últimas tendências acabadas de chegar</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all hover:scale-105 border border-pink-100 group">
                            <div class="relative overflow-hidden">
                                <img src="<?= $product['image'] ?>" class="w-full h-[300px] object-cover transition-transform group-hover:scale-110 duration-500">
                                <div class="absolute top-4 left-4 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">NOVO</div>
                                <button class="absolute top-4 right-4 p-3 rounded-full shadow-lg bg-white/90 text-rose-500 hover:bg-rose-500 hover:text-white transition-all">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="p-4 text-center">
                                <h3 class="mb-2 font-medium text-gray-900"><?= $product['name'] ?></h3>
                                <div class="flex justify-center gap-1 mb-2 text-yellow-400 text-xs">
                                    <?php for($i=0;$i<5;$i++): ?>
                                        <i class="fas fa-star <?= $i < $product['rating'] ? '' : 'text-gray-300' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <p class="text-2xl bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent font-bold mb-4">
                                    €<?= number_format($product['price'], 2, ',', '.') ?>
                                </p>
                            </div>
                            <div class="px-4 pb-4">
                                <button onclick="addToCart('<?= addslashes($product['name']) ?>')" class="w-full bg-gradient-to-r from-rose-500 to-pink-500 text-white px-4 py-3 rounded-full hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg flex items-center justify-center gap-2 font-semibold">
                                    <i class="fas fa-shopping-cart"></i> <span>Adicionar</span>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-10 text-gray-500">Nenhuma novidade encontrada.</div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>