<?php
$this->title = 'PocaRoupa - Contactos';
?>

<div class="container mx-auto px-4 py-12">
    <div class="mb-12 text-center">
        <h1 class="text-4xl bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent font-bold mb-4">
            Entre em Contacto
        </h1>
        <p class="text-gray-600 text-lg">Estamos aqui para ajudar! Envie-nos uma mensagem.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        <div class="bg-white rounded-lg shadow-lg p-8 border border-pink-100">
            <h2 class="text-2xl mb-6 text-purple-900 font-semibold">Envie-nos uma Mensagem</h2>
            <form onsubmit="event.preventDefault(); alert('Mensagem enviada com sucesso!');" class="space-y-4">
                <div>
                    <label class="block text-sm mb-2 text-gray-700 font-medium">Nome Completo</label>
                    <input type="text" required class="w-full px-4 py-3 border-2 border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                </div>
                <div>
                    <label class="block text-sm mb-2 text-gray-700 font-medium">Email</label>
                    <input type="email" required class="w-full px-4 py-3 border-2 border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                </div>
                <div>
                    <label class="block text-sm mb-2 text-gray-700 font-medium">Assunto</label>
                    <input type="text" required class="w-full px-4 py-3 border-2 border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                </div>
                <div>
                    <label class="block text-sm mb-2 text-gray-700 font-medium">Mensagem</label>
                    <textarea rows="6" required class="w-full px-4 py-3 border-2 border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-rose-500 to-pink-500 text-white py-3 rounded-lg hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg font-semibold flex items-center justify-center gap-2">
                    <i class="fas fa-paper-plane"></i>
                    <span>Enviar Mensagem</span>
                </button>
            </form>
        </div>

        <div class="space-y-6">
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg shadow-lg p-8 border border-pink-200">
                <h2 class="text-2xl mb-6 text-purple-900 font-semibold">Informações de Contacto</h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-gradient-to-r from-rose-500 to-pink-500 p-3 rounded-lg">
                            <i class="fas fa-map-marker-alt text-white text-xl w-6 text-center"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1 text-purple-900">Endereço</h3>
                            <p class="text-gray-600">Rua da Moda, 123<br>1000-001 Lisboa, Portugal</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-gradient-to-r from-rose-500 to-pink-500 p-3 rounded-lg">
                            <i class="fas fa-envelope text-white text-xl w-6 text-center"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1 text-purple-900">Email</h3>
                            <p class="text-gray-600">apoio@pocaroupa.com<br>vendas@pocaroupa.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-gradient-to-r from-rose-500 to-pink-500 p-3 rounded-lg">
                            <i class="fas fa-phone text-white text-xl w-6 text-center"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1 text-purple-900">Telefone</h3>
                            <p class="text-gray-600">+351 123 456 789<br>+351 987 654 321</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-gradient-to-r from-rose-500 to-pink-500 p-3 rounded-lg">
                            <i class="fas fa-clock text-white text-xl w-6 text-center"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1 text-purple-900">Horário</h3>
                            <p class="text-gray-600">
                                Segunda - Sexta: 9h - 19h<br>
                                Sábado: 10h - 18h<br>
                                Domingo: Fechado
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-rose-500 to-pink-500 rounded-lg shadow-lg p-8 text-white">
                <h3 class="text-xl font-bold mb-3">Precisa de Ajuda Rápida?</h3>
                <p class="mb-4 opacity-90">A nossa equipa está disponível para ajudar com qualquer questão!</p>
                <button class="bg-white text-rose-600 px-6 py-3 rounded-full font-semibold hover:bg-pink-50 transition-all shadow-lg">
                    Chat ao Vivo
                </button>
            </div>
        </div>

    </div>
</div>