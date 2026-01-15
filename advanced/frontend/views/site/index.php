<?php
/** @var array $products */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'PocaRoupa - Home';
?>

<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <div class="lg:col-span-3 hidden lg:block">
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 shadow-lg rounded-lg h-full overflow-hidden border border-pink-200">
                <nav class="p-2">
                    <ul class="space-y-1">
                        <?php
                        $cats = [
                                ['l'=>'Início', 'i'=>'fa-home', 'u'=>'site/index'],
                                ['l'=>'Mais Vendidos', 'i'=>'fa-shopping-bag', 'u'=>'catalog/bestsellers'],
                                ['l'=>'Novidades', 'i'=>'fa-plus-square', 'u'=>'catalog/new'],
                                ['l'=>'Roupa', 'i'=>'fa-tshirt', 'u'=>'catalog/clothing'],
                                ['l'=>'Acessórios', 'i'=>'fa-clock', 'u'=>'catalog/accessories'],
                                ['l'=>'Contactos', 'i'=>'fa-envelope', 'u'=>'site/contact'],
                        ];
                        foreach($cats as $c):
                            $isActive = Yii::$app->controller->route == $c['u'];
                            ?>
                            <li>
                                <a href="<?= Url::to([$c['u']]) ?>" class="flex items-center gap-3 px-4 py-3 w-full text-left rounded-lg transition-all <?= $isActive ? 'bg-gradient-to-r from-rose-500 to-pink-500 text-white shadow-md' : 'text-gray-700 hover:bg-white/70' ?>">
                                    <i class="fas <?= $c['i'] ?> w-5"></i>
                                    <span><?= $c['l'] ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:col-span-9 space-y-6">
            <div class="flex flex-col lg:flex-row gap-6 h-auto lg:h-[450px]">
                <div class="relative shadow-lg overflow-hidden rounded-lg group flex-grow h-[300px] lg:h-full" id="hero-carousel">
                    <div class="carousel-item absolute inset-0 transition-opacity duration-500 opacity-100" data-index="0">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1080" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 via-pink-900/30 to-transparent"></div>
                        <div class="absolute bottom-12 left-12">
                            <div class="bg-gradient-to-r from-rose-500/95 to-pink-500/95 p-6 rounded-lg backdrop-blur-sm shadow-2xl animate-fade-in-up">
                                <h2 class="text-white text-3xl mb-4 font-bold">Nova Coleção 2025</h2>
                                <a href="<?= Url::to(['catalog/new']) ?>" class="inline-block bg-white text-rose-600 px-8 py-3 rounded-full font-semibold hover:bg-pink-50 transition-all shadow-lg hover:scale-105">Comprar Agora</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item absolute inset-0 transition-opacity duration-500 opacity-0" data-index="1">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=1080" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 via-pink-900/30 to-transparent"></div>
                        <div class="absolute bottom-12 left-12">
                            <div class="bg-gradient-to-r from-rose-500/95 to-pink-500/95 p-6 rounded-lg backdrop-blur-sm shadow-2xl">
                                <h2 class="text-white text-3xl mb-4 font-bold">Saldos de Inverno</h2>
                                <a href="<?= Url::to(['catalog/bestsellers']) ?>" class="inline-block bg-white text-rose-600 px-8 py-3 rounded-full font-semibold hover:bg-pink-50 transition-all shadow-lg hover:scale-105">Ver Ofertas</a>
                            </div>
                        </div>
                    </div>

                    <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 p-3 rounded-full hover:bg-white text-rose-600 shadow-lg z-10 transition-all group-hover:opacity-100 opacity-0">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 p-3 rounded-full hover:bg-white text-rose-600 shadow-lg z-10 transition-all group-hover:opacity-100 opacity-0">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>
                </div>

                <div class="flex flex-col gap-6 h-full lg:w-80 flex-shrink-0">
                    <a href="<?= Url::to(['catalog/bestsellers']) ?>" class="relative shadow-lg overflow-hidden rounded-lg group flex-1 cursor-pointer min-h-[200px] block">
                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600" class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-500" alt="Oferta Especial">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <p class="text-xl font-bold mb-1">Oferta Especial</p>
                            <p class="text-sm opacity-90">Até -50%</p>
                        </div>
                    </a>
                    <a href="<?= Url::to(['catalog/clothing']) ?>" class="relative shadow-lg overflow-hidden rounded-lg group flex-1 cursor-pointer min-h-[200px] block">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600" class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-500" alt="Coleção Feminina">
                        <div class="absolute inset-0 bg-gradient-to-t from-pink-900/80 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <p class="text-xl font-bold mb-1">Coleção Feminina</p>
                            <p class="text-sm opacity-90">Novidades</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
        $feats = [
                ['t'=>'Pagamento Seguro', 'd'=>'Transações 100% protegidas', 'i'=>'fa-credit-card'],
                ['t'=>'Entregas Globais', 'd'=>'Para todo o mundo', 'i'=>'fa-truck'],
                ['t'=>'90 Dias Devolução', 'd'=>'Sem perguntas', 'i'=>'fa-undo'],
                ['t'=>'Suporte 24/7', 'd'=>'Sempre online', 'i'=>'fa-headset'],
        ];
        foreach($feats as $f): ?>
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 shadow-lg rounded-lg p-6 text-center hover:scale-105 transition-all border border-pink-200">
                <div class="bg-gradient-to-r from-rose-500 to-pink-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas <?= $f['i'] ?> text-white text-2xl"></i>
                </div>
                <h3 class="mb-2 text-purple-900 font-bold"><?= $f['t'] ?></h3>
                <p class="text-gray-600 text-sm"><?= $f['d'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="border-b-2 border-pink-200 mb-8 pb-4 flex justify-between items-end">
        <h2 class="text-3xl bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent font-bold">
            Produtos em Destaque
        </h2>
        <a href="<?= Url::to(['catalog/clothing']) ?>" class="text-rose-500 hover:text-rose-700 font-medium text-sm">Ver todos <i class="fas fa-arrow-right ml-1"></i></a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($products as $product): ?>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all hover:scale-105 border border-pink-100 group">
                <div class="relative overflow-hidden">
                    <a href="<?= Url::to(['catalog/product', 'id' => $product['id']]) ?>">
                        <img src="<?= Html::encode($product['image']) ?>" class="w-full h-[350px] object-cover transition-transform group-hover:scale-110 duration-500">
                    </a>

                    <a href="<?= Url::to(['profile/add-favorite', 'id' => $product['id']]) ?>" class="absolute top-4 right-4 p-3 rounded-full shadow-lg bg-white/90 text-gray-400 hover:bg-rose-500 hover:text-white transition-all z-10">
                        <i class="far fa-heart"></i>
                    </a>
                </div>

                <div class="p-4 text-center">
                    <a href="<?= Url::to(['catalog/product', 'id' => $product['id']]) ?>" class="hover:text-rose-600 transition-colors">
                        <h3 class="mb-2 font-medium text-gray-900"><?= Html::encode($product['name']) ?></h3>
                    </a>

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
                    <a href="<?= Url::to(['cart/add', 'id' => $product['id']]) ?>"
                       onclick="addToCart(event, '<?= Html::encode(addslashes($product['name'])) ?>', this.href)"
                       class="block w-full bg-gradient-to-r from-rose-500 to-pink-500 text-white px-4 py-3 rounded-full hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg flex items-center justify-center gap-2 font-semibold cursor-pointer">
                        <i class="fas fa-shopping-cart"></i> <span>Adicionar</span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div id="success-modal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[100] backdrop-blur-sm animate-fade-in">
    <div class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full text-center relative transform transition-all scale-100">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
            <i class="fas fa-times text-xl"></i>
        </button>

        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
            <i class="fas fa-shopping-cart text-3xl text-green-500"></i>
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mb-2">Adicionado ao Carrinho!</h3>
        <p class="text-gray-600 mb-8">
            Você adicionou <span id="modal-product-name" class="font-bold text-rose-500"></span> ao seu carrinho.
        </p>

        <div class="space-y-3">
            <a href="<?= Url::to(['cart/index']) ?>" class="block w-full bg-rose-500 text-white py-3.5 rounded-xl font-bold hover:bg-rose-600 transition-colors shadow-lg shadow-rose-200">
                <i class="fas fa-shopping-cart mr-2"></i> Ir para o Carrinho
            </a>
            <button onclick="closeModal()" class="block w-full bg-gray-100 text-gray-700 py-3.5 rounded-xl font-bold hover:bg-gray-200 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Continuar a Comprar
            </button>
        </div>
    </div>
</div>

<script>
    // Variável para contar itens (visual apenas, sincroniza com o PHP no refresh)
    // Se o contador já existir no layout main, ele começa com aquele valor.
    let cartCount = parseInt(document.getElementById('cart-count')?.innerText || 0);

    function addToCart(event, productName, url) {
        event.preventDefault(); // Impede a página de recarregar

        // 1. Atualizar o nome do produto no modal
        document.getElementById('modal-product-name').innerText = productName;

        // 2. Mostrar o Modal
        const modal = document.getElementById('success-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // 3. Enviar pedido ao servidor em background (AJAX)
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(response => {
            // Se o servidor responder OK, atualizamos o badge do carrinho visualmente
            if(response.ok || response.redirected) {
                cartCount++;
                updateCartBadges(cartCount);
            }
        }).catch(error => {
            console.error('Erro ao adicionar ao carrinho:', error);
        });
    }

    function closeModal() {
        const modal = document.getElementById('success-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function updateCartBadges(count) {
        const badges = document.querySelectorAll('#cart-count');
        badges.forEach(badge => {
            badge.innerText = count;
            badge.classList.remove('hidden');
        });
    }

    // Fechar modal se clicar fora
    document.getElementById('success-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Lógica do Carousel
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100');
            } else {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    setInterval(nextSlide, 5000);
</script>