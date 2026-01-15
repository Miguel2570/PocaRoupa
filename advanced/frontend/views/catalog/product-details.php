<?php
/** @var array $product */
use yii\helpers\Url;

$this->title = 'PocaRoupa - ' . $product['name'];
?>

<div class="container mx-auto px-4 py-8 animate-in fade-in slide-in-from-bottom-4 duration-500">

    <a href="javascript:history.back()" class="flex items-center gap-2 text-gray-600 hover:text-rose-600 mb-8 transition-colors group no-underline">
        <i class="fas fa-arrow-left w-5 h-5 group-hover:-translate-x-1 transition-transform flex items-center justify-center"></i>
        <span>Voltar para a loja</span>
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">

        <div class="relative rounded-2xl overflow-hidden shadow-lg border border-pink-100 bg-white">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-full h-[500px] lg:h-[600px] object-cover hover:scale-105 transition-transform duration-700">

            <button class="absolute top-4 right-4 p-4 rounded-full shadow-lg transition-all hover:scale-110 bg-white/90 text-rose-500 hover:bg-rose-500 hover:text-white">
                <i class="far fa-heart text-xl"></i>
            </button>
        </div>

        <div class="flex flex-col">
            <div class="mb-2">
                <span class="inline-block px-3 py-1 bg-rose-100 text-rose-600 rounded-full text-sm font-semibold tracking-wide uppercase">
                    <?= $product['category'] === 'clothing' ? 'Roupa' : 'Acessórios' ?>
                </span>
                <?php if ($product['isNew']): ?>
                    <span class="ml-2 inline-block px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm font-semibold tracking-wide uppercase">
                        Novo
                    </span>
                <?php endif; ?>
            </div>

            <h1 class="text-4xl font-bold text-gray-900 mb-4"><?= $product['name'] ?></h1>

            <div class="flex items-center gap-4 mb-6">
                <div class="flex text-yellow-400 text-sm">
                    <?php for($i=0; $i<5; $i++): ?>
                        <i class="fas fa-star <?= $i < $product['rating'] ? '' : 'text-gray-300' ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="text-gray-500 text-sm">(124 avaliações)</span>
            </div>

            <div class="text-4xl font-bold bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent mb-8">
                €<?= number_format($product['price'], 2, ',', '.') ?>
            </div>

            <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                Esta peça exclusiva combina elegância e conforto. Feita com materiais de alta qualidade,
                é perfeita para qualquer ocasião. O design moderno e o acabamento impecável garantem
                que você se destaque onde quer que vá.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <button onclick="addToCart('<?= addslashes($product['name']) ?>')" class="flex-1 bg-gradient-to-r from-rose-500 to-pink-500 text-white px-8 py-4 rounded-xl hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg hover:shadow-xl hover:scale-105 flex items-center justify-center gap-3 font-bold text-lg">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-8 border-t border-gray-100">

                <div class="flex flex-col items-center text-center p-4 bg-pink-50 rounded-xl">
                    <i class="fas fa-truck text-3xl text-rose-500 mb-2"></i>
                    <span class="font-semibold text-gray-800">Envio Grátis</span>
                    <span class="text-xs text-gray-500">Em encomendas +50€</span>
                </div>

                <div class="flex flex-col items-center text-center p-4 bg-purple-50 rounded-xl">
                    <i class="fas fa-sync-alt text-3xl text-purple-500 mb-2"></i>
                    <span class="font-semibold text-gray-800">Trocas Fáceis</span>
                    <span class="text-xs text-gray-500">30 dias para troca</span>
                </div>

                <div class="flex flex-col items-center text-center p-4 bg-rose-50 rounded-xl">
                    <i class="fas fa-shield-alt text-3xl text-rose-500 mb-2"></i>
                    <span class="font-semibold text-gray-800">Pagamento Seguro</span>
                    <span class="text-xs text-gray-500">100% Protegido</span>
                </div>

            </div>
        </div>
    </div>
</div>