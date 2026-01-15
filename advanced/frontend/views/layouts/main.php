<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: { sans: ['Poppins', 'sans-serif'] },
                        colors: {
                            rose: { 50: '#fff1f2', 500: '#f43f5e', 600: '#e11d48' },
                            pink: { 50: '#fdf2f8', 100: '#fce7f3', 200: '#fbcfe8', 500: '#ec4899', 600: '#db2777' },
                            purple: { 50: '#faf5ff', 200: '#e9d5ff', 500: '#a855f7', 600: '#9333ea', 900: '#581c87' }
                        }
                    }
                }
            }
        </script>
        <style>
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
            /* Animação suave para o dropdown */
            .dropdown-menu { transition: all 0.2s ease-in-out; }

            @keyframes fadeInDown {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in-down { animation: fadeInDown 0.3s ease-out forwards; }
        </style>
        <?php $this->head() ?>
    </head>
    <body class="bg-gradient-to-br from-pink-50 via-purple-50 to-pink-50 min-h-screen flex flex-col font-sans">
    <?php $this->beginBody() ?>

    <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-3">

                <button onclick="toggleMobileMenu()" class="md:hidden flex items-center gap-2 px-3 py-2 rounded hover:bg-white/10 transition-colors">
                    <i class="fas fa-bars"></i> <span>MENU</span>
                </button>

                <?php
                // Obtém a rota atual para definir o item ativo
                $route = Yii::$app->controller->route; // ex: catalog/clothing

                $menuItems = [
                        ['label' => 'Início', 'url' => ['site/index'], 'active' => $route === 'site/index'],
                        ['label' => 'Mais Vendidos', 'url' => ['catalog/bestsellers'], 'active' => $route === 'catalog/bestsellers'],
                        ['label' => 'Novidades', 'url' => ['catalog/new'], 'active' => $route === 'catalog/new'],
                        ['label' => 'Roupa', 'url' => ['catalog/clothing'], 'active' => $route === 'catalog/clothing'],
                        ['label' => 'Acessórios', 'url' => ['catalog/accessories'], 'active' => $route === 'catalog/accessories'],
                        ['label' => 'Contactos', 'url' => ['site/contact'], 'active' => $route === 'site/contact'],
                ];
                ?>

                <div class="hidden md:flex items-center gap-1">
                    <span class="mr-4 font-semibold tracking-wide">PocaRoupa</span>
                    <?php foreach($menuItems as $item): ?>
                        <a href="<?= Url::to($item['url']) ?>" class="px-3 py-1.5 rounded transition-all text-sm font-medium <?= $item['active'] ? 'bg-white/20 shadow-sm' : 'hover:bg-white/10' ?>">
                            <?= $item['label'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-2 px-4 py-2 hover:bg-white/10 rounded transition-colors text-sm font-medium">
                        <i class="fas fa-user-circle text-lg"></i>
                        <span class="hidden sm:inline">Minha Conta</span>
                        <i class="fas fa-chevron-down text-xs ml-1 transition-transform group-hover:rotate-180"></i>
                    </button>

                    <div class="hidden group-hover:block absolute right-0 mt-0 w-48 bg-white text-gray-800 rounded-lg shadow-xl overflow-hidden z-50 border border-pink-100 dropdown-menu animate-fade-in-down">
                        <?php if (Yii::$app->user->isGuest): ?>
                            <a href="<?= Url::to(['site/login']) ?>" class="block px-4 py-3 hover:bg-pink-50 transition-colors flex items-center gap-2">
                                <i class="fas fa-sign-in-alt text-rose-500 w-5"></i> Login
                            </a>
                            <a href="<?= Url::to(['site/signup']) ?>" class="block px-4 py-3 hover:bg-pink-50 transition-colors flex items-center gap-2">
                                <i class="fas fa-user-plus text-purple-500 w-5"></i> Registar
                            </a>
                        <?php else: ?>
                            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                                <p class="text-xs text-gray-500">Logado como</p>
                                <p class="font-semibold text-rose-600 truncate"><?= Yii::$app->user->identity->username ?></p>
                            </div>
                            <a href="<?= Url::to(['profile/index']) ?>" class="block px-4 py-3 hover:bg-pink-50 transition-colors flex items-center gap-2">
                                <i class="fas fa-user-cog text-purple-500 w-5"></i> Perfil
                            </a>
                            <a href="<?= Url::to(['profile/favorites']) ?>" class="block px-4 py-3 hover:bg-pink-50 transition-colors flex items-center gap-2">
                                <i class="fas fa-heart text-rose-500 w-5"></i> Favoritos
                            </a>
                            <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'block w-full']) ?>
                            <button type="submit" class="w-full text-left px-4 py-3 hover:bg-red-50 text-red-600 transition-colors flex items-center gap-2">
                                <i class="fas fa-sign-out-alt w-5"></i> Sair
                            </button>
                            <?= Html::endForm() ?>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>

            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-white/10 pt-2">
                <?php foreach($menuItems as $item): ?>
                    <a href="<?= Url::to($item['url']) ?>" class="block px-4 py-2 hover:bg-white/10 rounded transition-colors text-sm">
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-sm py-4 z-40 relative">
        <div class="container mx-auto px-4">

            <div class="flex flex-col md:flex-row items-center gap-6">

                <div class="w-full md:w-auto text-center md:text-left">
                    <a href="<?= Url::to(['site/index']) ?>" class="text-3xl font-bold block bg-gradient-to-r from-rose-500 to-pink-500 bg-clip-text text-transparent hover:scale-105 transition-transform">
                        PocaRoupa
                    </a>
                </div>

                <div class="flex-1 w-full">
                    <form class="flex w-full relative group">
                        <input type="text" class="w-full px-5 py-2.5 border-2 border-purple-100 rounded-full focus:outline-none focus:border-rose-400 focus:ring-4 focus:ring-rose-50 transition-all pl-5 pr-12" placeholder="O que procura hoje?">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 bg-rose-500 text-white rounded-full flex items-center justify-center hover:bg-rose-600 transition-all shadow-md">
                            <i class="fas fa-search text-sm"></i>
                        </button>
                    </form>
                </div>

                <div class="flex gap-6 items-center justify-center md:justify-end w-full md:w-auto">

                    <a href="<?= Url::to(['profile/favorites']) ?>" class="relative group text-gray-500 hover:text-rose-500 transition-colors flex flex-col items-center">
                        <div class="relative">
                            <i class="far fa-heart text-2xl group-hover:scale-110 transition-transform"></i>
                        </div>
                        <span class="text-xs font-medium mt-1">Favoritos</span>
                    </a>

                    <a href="<?= Url::to(['cart/index']) ?>" class="relative group text-gray-500 hover:text-purple-500 transition-colors flex flex-col items-center">
                        <div class="relative">
                            <i class="fas fa-shopping-cart text-2xl group-hover:scale-110 transition-transform"></i>
                            <span id="cart-count" class="absolute -top-1 -right-2 bg-purple-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm hidden">0</span>
                        </div>
                        <span class="text-xs font-medium mt-1">Carrinho</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main class="flex-grow">
        <?= $content ?>
    </main>

    <div class="bg-gradient-to-r from-rose-500 to-pink-500 py-12 shadow-inner mt-12 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-8 justify-between">
                <div class="text-center md:text-left text-white">
                    <h2 class="text-3xl font-bold mb-2"><i class="fas fa-envelope-open-text mr-2"></i> Newsletter</h2>
                    <p class="text-lg opacity-90">Receba novidades e promoções exclusivas em primeira mão.</p>
                </div>
                <div class="w-full max-w-md">
                    <form class="flex shadow-2xl rounded-full" onsubmit="event.preventDefault(); alert('Obrigado por subscrever!');">
                        <input type="email" placeholder="O seu email" class="flex-1 px-6 py-4 rounded-l-full border-none focus:ring-0 text-gray-800">
                        <button type="submit" class="bg-purple-900 text-white px-8 py-4 rounded-r-full hover:bg-purple-800 transition-all font-semibold uppercase tracking-wider text-sm">
                            Subscrever
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-gray-300 pt-16 border-t border-purple-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

                <div>
                <span class="text-2xl font-bold bg-gradient-to-r from-rose-500 to-pink-500 bg-clip-text text-transparent mb-6 block">
                    PocaRoupa
                </span>
                    <p class="text-sm leading-relaxed opacity-80 mb-6">
                        A sua loja favorita para as últimas tendências. Moda, estilo e qualidade num só lugar.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-purple-500 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-400 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white mb-6 text-lg font-semibold border-b border-gray-700 pb-2 inline-block">Explorar</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="<?= Url::to(['catalog/new']) ?>" class="hover:text-rose-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Novidades</a></li>
                        <li><a href="<?= Url::to(['catalog/bestsellers']) ?>" class="hover:text-rose-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Mais Vendidos</a></li>
                        <li><a href="<?= Url::to(['catalog/clothing']) ?>" class="hover:text-rose-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Roupa</a></li>
                        <li><a href="<?= Url::to(['catalog/accessories']) ?>" class="hover:text-rose-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Acessórios</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white mb-6 text-lg font-semibold border-b border-gray-700 pb-2 inline-block">Apoio ao Cliente</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="<?= Url::to(['profile/index']) ?>" class="hover:text-rose-400 transition-colors">A Minha Conta</a></li>
                        <li><a href="#" class="hover:text-rose-400 transition-colors">Envios e Devoluções</a></li>
                        <li><a href="#" class="hover:text-rose-400 transition-colors">Perguntas Frequentes</a></li>
                        <li><a href="<?= Url::to(['site/contact']) ?>" class="hover:text-rose-400 transition-colors">Contacte-nos</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white mb-6 text-lg font-semibold border-b border-gray-700 pb-2 inline-block">Contactos</h3>
                    <ul class="space-y-4 text-sm opacity-90">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-rose-500 mt-1"></i>
                            <span>Rua da Moda, 123<br>1000-001 Lisboa, Portugal</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-rose-500"></i>
                            <span>apoio@pocaroupa.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone text-rose-500"></i>
                            <span>+351 123 456 789</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 py-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs opacity-70">
                <p>&copy; <?= date('Y') ?> PocaRoupa. Todos os direitos reservados.</p>
                <div class="flex gap-4">
                    <i class="fab fa-cc-visa text-2xl"></i>
                    <i class="fab fa-cc-mastercard text-2xl"></i>
                    <i class="fab fa-cc-paypal text-2xl"></i>
                    <i class="fas fa-money-bill-wave text-2xl"></i>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Toggle Mobile Menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Fechar dropdowns ao clicar fora
        document.addEventListener('click', function(e) {
            // Lógica genérica se necessário
        });

        // Simulação de Carrinho (Visual)
        // Nota: A funcionalidade real de adicionar está agora no CartController (PHP)
        let cartCount = 0;

        function addToCart(name, price = 0) {
            cartCount++;

            // Atualiza apenas o Badge
            const badges = document.querySelectorAll('#cart-count');
            badges.forEach(badge => {
                badge.innerText = cartCount;
                badge.classList.remove('hidden');
            });

            // Feedback Visual Simples
            alert(name + " foi adicionado ao carrinho!");
        }
    </script>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage(); ?>