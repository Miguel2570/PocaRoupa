<?php
/** @var array $user */
/** @var array $orders */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'PocaRoupa - A Minha Conta';
?>

<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">A Minha Conta</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

        <div class="md:col-span-1">
            <div class="bg-white rounded-xl shadow-md border border-pink-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 text-center">
                    <div class="w-20 h-20 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4 text-rose-500">
                        <i class="fas fa-user text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900"><?= $user['name'] ?></h3>
                    <p class="text-sm text-gray-500"><?= $user['email'] ?></p>
                </div>

                <nav class="p-2 space-y-1">
                    <button onclick="switchTab('profile')" id="btn-profile" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition-colors bg-rose-50 text-rose-600">
                        <i class="fas fa-user w-5 text-center"></i>
                        Dados Pessoais
                    </button>

                    <button onclick="switchTab('orders')" id="btn-orders" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition-colors text-gray-600 hover:bg-gray-50">
                        <i class="fas fa-box w-5 text-center"></i>
                        Minhas Encomendas
                    </button>

                    <button onclick="switchTab('addresses')" id="btn-addresses" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition-colors text-gray-600 hover:bg-gray-50">
                        <i class="fas fa-map-marker-alt w-5 text-center"></i>
                        Moradas
                    </button>

                    <div class="my-2 border-t border-gray-100"></div>

                    <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'w-full']) ?>
                    <?= Html::submitButton(
                        '<i class="fas fa-sign-out-alt w-5 text-center"></i> Sair',
                        ['class' => 'w-full flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 transition-colors border-none bg-transparent cursor-pointer text-left']
                    ) ?>
                    <?= Html::endForm() ?>
                </nav>
            </div>
        </div>

        <div class="md:col-span-3">

            <div id="tab-profile" class="tab-content bg-white rounded-xl shadow-md border border-pink-100 p-8 animate-in fade-in duration-300">
                <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                    <i class="fas fa-cog text-rose-500"></i>
                    Dados Pessoais
                </h2>

                <form class="space-y-6 max-w-2xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                            <input type="text" value="<?= $user['name'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" value="<?= $user['email'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                            <input type="tel" value="<?= $user['phone'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 outline-none">
                        </div>
                    </div>

                    <button type="button" class="px-6 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition-colors font-medium shadow-md">
                        Guardar Alterações
                    </button>
                </form>
            </div>

            <div id="tab-orders" class="tab-content hidden bg-white rounded-xl shadow-md border border-pink-100 p-8 animate-in fade-in duration-300">
                <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                    <i class="fas fa-box text-rose-500"></i>
                    Histórico de Encomendas
                </h2>

                <div class="space-y-4">
                    <?php foreach ($orders as $order): ?>
                        <div class="border border-gray-200 rounded-xl p-6 hover:border-rose-200 transition-colors">
                            <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-4">
                                <div>
                                    <span class="font-bold text-lg text-gray-900"><?= $order['id'] ?></span>
                                    <p class="text-sm text-gray-500">Realizada em <?= $order['date'] ?></p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <?php
                                    $statusClass = match($order['status']) {
                                        'Entregue' => 'bg-green-100 text-green-700',
                                        'Devolvido' => 'bg-red-100 text-red-700',
                                        default => 'bg-yellow-100 text-yellow-700'
                                    };
                                    ?>
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $statusClass ?>">
                                    <?= $order['status'] ?>
                                </span>
                                    <span class="font-bold text-lg text-rose-600"><?= $order['total'] ?></span>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 pt-4">
                                <p class="text-sm text-gray-600">
                                    <span class="font-medium">Artigos:</span> <?= implode(', ', $order['items']) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="tab-addresses" class="tab-content hidden bg-white rounded-xl shadow-md border border-pink-100 p-8 animate-in fade-in duration-300">
                <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-rose-500"></i>
                    Minhas Moradas
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border-2 border-rose-500 bg-rose-50 rounded-xl p-6 relative">
                        <span class="absolute top-4 right-4 text-xs font-bold bg-rose-500 text-white px-2 py-1 rounded">Principal</span>
                        <h3 class="font-bold text-gray-900 mb-2">Casa</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Rua das Flores, nº 123, 4º Esq<br>
                            1234-567 Lisboa<br>
                            Portugal
                        </p>
                        <div class="flex gap-3 text-sm font-medium">
                            <button class="text-rose-600 hover:text-rose-700">Editar</button>
                            <button class="text-gray-500 hover:text-gray-700">Remover</button>
                        </div>
                    </div>

                    <button class="border-2 border-dashed border-gray-300 rounded-xl p-6 flex flex-col items-center justify-center text-gray-500 hover:border-rose-400 hover:text-rose-500 transition-colors h-full min-h-[180px] group">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-rose-50 transition-colors">
                            <i class="fas fa-plus text-xl"></i>
                        </div>
                        <span class="font-medium">Adicionar Nova Morada</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Esconder todos os conteúdos
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

        // Mostrar o conteúdo selecionado
        document.getElementById('tab-' + tabName).classList.remove('hidden');

        // Resetar estilos dos botões
        const buttons = ['profile', 'orders', 'addresses'];
        buttons.forEach(btn => {
            const el = document.getElementById('btn-' + btn);
            if (btn === tabName) {
                // Ativo
                el.className = 'w-full flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition-colors bg-rose-50 text-rose-600';
            } else {
                // Inativo
                el.className = 'w-full flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition-colors text-gray-600 hover:bg-gray-50';
            }
        });
    }
</script>