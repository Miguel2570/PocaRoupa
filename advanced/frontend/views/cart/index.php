<?php
/** @var array $products */
/** @var float $subtotal */
/** @var float $shipping */
/** @var float $total */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'PocaRoupa - O meu Carrinho';
$count = count($products);
?>

<div class="container mx-auto px-4 py-12 min-h-[60vh]">

    <div class="mb-10">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-shopping-bag text-rose-500"></i> O meu Carrinho
        </h1>
        <p class="text-gray-500 mt-2"><?= $count > 0 ? "Tem $count itens no seu carrinho." : "O seu carrinho está vazio." ?></p>
    </div>

    <?php if ($count === 0): ?>

        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-50 max-w-2xl mx-auto animate-fade-in-down">
            <div class="mb-6 inline-block p-6 bg-pink-50 rounded-full">
                <i class="fas fa-shopping-cart text-6xl text-rose-300"></i>
            </div>
            <h3 class="text-2xl text-gray-800 mb-3 font-bold">O seu carrinho está vazio</h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">Parece que ainda não adicionou nada. Explore a nossa coleção e encontre o seu próximo look favorito!</p>
            <a href="<?= Url::to(['site/index']) ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-500 text-white px-8 py-3 rounded-full font-medium hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left text-sm"></i> Voltar à Loja
            </a>
        </div>

    <?php else: ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start animate-fade-in-down">

            <div class="lg:col-span-2 space-y-4">
                <?php foreach ($products as $product): ?>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6 flex flex-col sm:flex-row gap-6 transition-all hover:shadow-md">

                        <a href="<?= Url::to(['site/product', 'id' => $product['id']]) ?>" class="shrink-0">
                            <img src="<?= Html::encode($product['image']) ?>" alt="<?= Html::encode($product['name']) ?>" class="w-24 h-32 sm:w-32 sm:h-40 object-cover rounded-lg border border-gray-50">
                        </a>

                        <div class="flex-1 flex flex-col">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="text-xs text-rose-500 font-medium uppercase tracking-wider mb-1"><?= ucfirst($product['category'] ?? 'Roupa') ?></p>
                                    <a href="<?= Url::to(['site/product', 'id' => $product['id']]) ?>" class="text-lg font-bold text-gray-800 hover:text-rose-600 transition-colors line-clamp-2">
                                        <?= Html::encode($product['name']) ?>
                                    </a>
                                </div>
                                <a href="<?= Url::to(['cart/remove', 'id' => $product['id']]) ?>" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Remover item">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>

                            <div class="sm:hidden mb-4">
                                <span class="text-gray-500 text-sm">Preço: </span>
                                <span class="font-medium">€<?= number_format($product['price'], 2, ',', '.') ?></span>
                            </div>

                            <div class="flex justify-between items-end mt-auto">
                                <div class="flex items-center border border-gray-200 rounded-full px-2 bg-gray-50">
                                    <a href="<?= Url::to(['cart/update', 'id' => $product['id'], 'change' => 'decrease']) ?>" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-rose-600 transition-colors">
                                        <i class="fas fa-minus text-xs"></i>
                                    </a>
                                    <span class="w-10 text-center font-medium text-gray-800"><?= $product['quantity'] ?></span>
                                    <a href="<?= Url::to(['cart/update', 'id' => $product['id'], 'change' => 'increase']) ?>" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-rose-600 transition-colors">
                                        <i class="fas fa-plus text-xs"></i>
                                    </a>
                                </div>

                                <div class="text-right">
                                    <p class="text-sm text-gray-500 sm:hidden">Subtotal:</p>
                                    <p class="text-xl font-bold text-gray-900">
                                        €<?= number_format($product['price'] * $product['quantity'], 2, ',', '.') ?>
                                    </p>
                                    <?php if ($product['quantity'] > 1): ?>
                                        <p class="text-xs text-gray-500 hidden sm:block">€<?= number_format($product['price'], 2, ',', '.') ?> cada</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="mt-6">
                    <a href="<?= Url::to(['site/index']) ?>" class="text-rose-500 hover:text-rose-600 font-medium flex items-center gap-2 transition-colors inline-block py-2">
                        <i class="fas fa-arrow-left"></i> Continuar a comprar
                    </a>
                </div>
            </div>

            <div class="lg:sticky lg:top-24">
                <div class="bg-white rounded-2xl shadow-lg border border-pink-100 overflow-hidden">
                    <div class="p-6 bg-gray-50 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Resumo do Pedido</h2>
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>€<?= number_format($subtotal, 2, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Envio estimativo</span>
                            <?php if ($shipping == 0): ?>
                                <span class="text-green-500 font-medium">Grátis</span>
                            <?php else: ?>
                                <span>€<?= number_format($shipping, 2, ',', '.') ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($shipping > 0): ?>
                            <p class="text-xs text-gray-400 bg-gray-50 p-2 rounded">
                                <i class="fas fa-info-circle mr-1"></i> Portes grátis para encomendas acima de €50.
                            </p>
                        <?php endif; ?>

                        <div class="border-t border-dashed border-gray-200 pt-4 mt-4">
                            <div class="flex justify-between items-end">
                                <span class="font-bold text-lg text-gray-800">Total</span>
                                <div class="text-right">
                                    <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-rose-600 to-pink-600">
                                        €<?= number_format($total, 2, ',', '.') ?>
                                    </span>
                                    <p class="text-xs text-gray-500 mt-1">IVA incluído</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-gray-50 border-t border-gray-100">
                        <a href="<?= Url::to(['cart/checkout']) ?>" class="block w-full bg-gradient-to-r from-rose-500 to-pink-500 text-white text-center py-4 rounded-xl text-lg font-bold hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                            Finalizar Compra <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <div class="flex justify-center gap-3 mt-4 text-gray-400 text-xl opacity-70">
                            <i class="fab fa-cc-visa" title="Visa"></i>
                            <i class="fab fa-cc-mastercard" title="Mastercard"></i>
                            <i class="fab fa-cc-paypal" title="PayPal"></i>
                            <i class="fas fa-shield-alt" title="Pagamento Seguro"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>