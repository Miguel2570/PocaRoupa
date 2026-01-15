<?php
/** @var array $cart */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'PocaRoupa - Finalizar Compra';

// Cálculos PHP
$subtotal = 0;
foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$shipping = $subtotal > 50 ? 0 : 5.90; // Exemplo: Portes grátis > 50
$total = $subtotal + $shipping;
?>

<style>
    /* Pequena animação para o spinner */
    .loader {
        border: 3px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top: 3px solid white;
        width: 20px;
        height: 20px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    /* Transição suave nas bordas de pagamento */
    .payment-option {
        transition: all 0.2s ease-in-out;
    }
    .payment-option.selected {
        border-color: #e11d48; /* Rose-600 */
        background-color: #fff1f2; /* Rose-50 */
    }
</style>

<?php if (empty($cart)): ?>
    <div class="container mx-auto px-4 py-12 min-h-[60vh] flex items-center justify-center">
        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 max-w-2xl w-full">
            <div class="mb-6 inline-block p-6 bg-pink-50 rounded-full">
                <i class="fas fa-shopping-bag text-6xl text-rose-300"></i>
            </div>
            <h2 class="text-2xl text-gray-800 mb-2 font-bold">O seu carrinho está vazio</h2>
            <p class="text-gray-500 mb-8">Adicione produtos ao carrinho para continuar.</p>
            <a href="<?= Url::to(['site/index']) ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-500 text-white px-8 py-3 rounded-full font-semibold hover:from-rose-600 hover:to-pink-600 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-arrow-left"></i> Voltar à Loja
            </a>
        </div>
    </div>
<?php else: ?>

    <div class="container mx-auto px-4 py-12">

        <div class="mb-12 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                Finalizar <span class="bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent">Compra</span>
            </h1>
        </div>

        <div class="mb-12 max-w-4xl mx-auto">
            <div class="flex items-center justify-between relative">
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10 rounded-full"></div>
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-gradient-to-r from-rose-500 to-pink-500 -z-10 rounded-full transition-all duration-500" id="progress-bar" style="width: 0%"></div>

                <div class="flex flex-col items-center gap-2 bg-white px-2">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-gradient-to-r from-rose-500 to-pink-500 text-white font-bold shadow-lg transition-all transform scale-110" id="circle-1">
                        1
                    </div>
                    <span class="text-sm font-bold text-rose-600" id="label-1">Dados</span>
                </div>

                <div class="flex flex-col items-center gap-2 bg-white px-2">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-gray-200 text-gray-500 font-bold transition-all" id="circle-2">
                        2
                    </div>
                    <span class="text-sm font-medium text-gray-400" id="label-2">Pagamento</span>
                </div>

                <div class="flex flex-col items-center gap-2 bg-white px-2">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-gray-200 text-gray-500 font-bold transition-all" id="circle-3">
                        3
                    </div>
                    <span class="text-sm font-medium text-gray-400" id="label-3">Conclusão</span>
                </div>
            </div>
        </div>

        <form id="checkout-form" onsubmit="return false;">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div id="step-1" class="checkout-step">
                        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
                            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-gray-100">
                                <div class="w-10 h-10 rounded-full bg-pink-50 flex items-center justify-center text-rose-600">
                                    <i class="fas fa-map-marker-alt text-lg"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Endereço de Entrega</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative md:col-span-2">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" id="input-nome" required placeholder="Nome Completo" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                                </div>

                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" id="input-email" required placeholder="Email" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                                </div>

                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input type="tel" id="input-tel" required placeholder="Telefone" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                                </div>

                                <div class="relative md:col-span-2">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <input type="text" id="input-morada" required placeholder="Morada Completa" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                                </div>

                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-city"></i>
                                    </div>
                                    <input type="text" id="input-cidade" required placeholder="Cidade" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-mail-bulk"></i>
                                    </div>
                                    <input type="text" id="input-cp" required placeholder="Código Postal" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                                </div>
                            </div>

                            <div id="error-msg-1" class="text-red-500 text-sm mt-4 hidden"><i class="fas fa-exclamation-circle"></i> Por favor preencha todos os campos obrigatórios.</div>
                        </div>

                        <button type="button" onclick="nextStep(1)" class="w-full mt-6 bg-gradient-to-r from-gray-800 to-black text-white py-4 rounded-xl hover:shadow-lg transform hover:-translate-y-1 transition-all font-bold text-lg flex items-center justify-center gap-2">
                            Continuar para Pagamento <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <div id="step-2" class="checkout-step hidden">
                        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
                            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-gray-100">
                                <div class="w-10 h-10 rounded-full bg-pink-50 flex items-center justify-center text-rose-600">
                                    <i class="fas fa-credit-card text-lg"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Método de Pagamento</h2>
                            </div>

                            <div class="space-y-4">
                                <div class="payment-option border border-gray-200 rounded-xl p-4 cursor-pointer relative selected" onclick="selectPayment(this, 'card')">
                                    <div class="flex items-center gap-4">
                                        <div class="w-6 h-6 rounded-full border-2 border-rose-500 flex items-center justify-center">
                                            <div class="w-3 h-3 bg-rose-500 rounded-full"></div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="font-bold text-gray-800">Cartão de Crédito</span>
                                            <div class="flex gap-2 mt-1 text-2xl text-gray-400">
                                                <i class="fab fa-cc-visa"></i>
                                                <i class="fab fa-cc-mastercard"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="card-details" class="mt-4 pt-4 border-t border-gray-100 pl-10 grid grid-cols-2 gap-4">
                                        <input type="text" placeholder="Número do Cartão" class="col-span-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                        <input type="text" placeholder="MM/AA" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                        <input type="text" placeholder="CVV" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                    </div>
                                </div>

                                <div class="payment-option border border-gray-200 rounded-xl p-4 cursor-pointer relative" onclick="selectPayment(this, 'mbway')">
                                    <div class="flex items-center gap-4">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center radio-circle">
                                            <div class="w-3 h-3 bg-transparent rounded-full transition-colors"></div>
                                        </div>
                                        <div class="flex-1 flex justify-between items-center">
                                            <span class="font-bold text-gray-800">MB Way</span>
                                            <i class="fas fa-mobile-alt text-gray-400 text-xl"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-option border border-gray-200 rounded-xl p-4 cursor-pointer relative" onclick="selectPayment(this, 'paypal')">
                                    <div class="flex items-center gap-4">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center radio-circle">
                                            <div class="w-3 h-3 bg-transparent rounded-full transition-colors"></div>
                                        </div>
                                        <div class="flex-1 flex justify-between items-center">
                                            <span class="font-bold text-gray-800">PayPal</span>
                                            <i class="fab fa-paypal text-blue-500 text-xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <button type="button" onclick="setStep(1)" class="w-1/3 bg-gray-100 text-gray-700 py-4 rounded-xl hover:bg-gray-200 transition-all font-bold">
                                Voltar
                            </button>
                            <button type="button" onclick="handleCheckout()" id="btn-finish" class="flex-1 bg-gradient-to-r from-rose-500 to-pink-500 text-white py-4 rounded-xl hover:shadow-lg hover:from-rose-600 hover:to-pink-600 transition-all font-bold text-lg flex items-center justify-center gap-2">
                                <span>Pagar €<?= number_format($total, 2, ',', '.') ?></span> <i class="fas fa-lock text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <div id="step-3" class="checkout-step hidden">
                        <div class="bg-white rounded-2xl shadow-xl p-12 text-center border border-pink-100 animate-fade-in-up">
                            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                                <i class="fas fa-check text-green-500 text-4xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">
                                Encomenda Confirmada!
                            </h2>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">Obrigado pela sua compra. Enviámos um email de confirmação com os detalhes do envio.</p>

                            <div class="bg-gray-50 p-4 rounded-xl mb-8 max-w-sm mx-auto border border-gray-100">
                                <p class="text-sm text-gray-500 uppercase tracking-wide">ID da Encomenda</p>
                                <p class="text-xl font-mono font-bold text-gray-800">#PR-<?= rand(10000, 99999) ?></p>
                            </div>

                            <a href="<?= Url::to(['site/index']) ?>" class="inline-block bg-gray-900 text-white px-10 py-3 rounded-full hover:bg-black transition-all shadow-lg font-semibold">
                                Continuar a comprar
                            </a>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-1" id="order-summary-panel">
                    <div class="bg-gray-50 rounded-2xl p-6 sticky top-24 border border-gray-200">
                        <h3 class="text-lg font-bold mb-6 text-gray-800 flex items-center justify-between">
                            Resumo <span class="text-sm font-normal text-gray-500"><?= count($cart) ?> itens</span>
                        </h3>

                        <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                            <?php foreach ($cart as $item): ?>
                                <div class="flex gap-3 items-start">
                                    <div class="w-16 h-16 rounded-lg bg-white border border-gray-200 overflow-hidden flex-shrink-0">
                                        <img src="<?= Html::encode($item['image']) ?>" alt="<?= Html::encode($item['name']) ?>" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-gray-800 truncate"><?= Html::encode($item['name']) ?></p>
                                        <p class="text-xs text-gray-500">Qtd: <?= $item['quantity'] ?></p>
                                    </div>
                                    <p class="font-bold text-sm text-rose-600">€<?= number_format($item['price'] * $item['quantity'], 2, ',', '.') ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="border-t border-dashed border-gray-300 pt-4 space-y-2">
                            <div class="flex justify-between text-gray-600 text-sm">
                                <span>Subtotal</span>
                                <span>€<?= number_format($subtotal, 2, ',', '.') ?></span>
                            </div>
                            <div class="flex justify-between text-gray-600 text-sm">
                                <span>Envio</span>
                                <?php if($shipping == 0): ?>
                                    <span class="text-green-600 font-bold">Grátis</span>
                                <?php else: ?>
                                    <span>€<?= number_format($shipping, 2, ',', '.') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="flex justify-between items-end pt-4 mt-2 border-t border-gray-200">
                                <span class="font-bold text-gray-800">Total</span>
                                <span class="text-2xl font-bold text-rose-600">€<?= number_format($total, 2, ',', '.') ?></span>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-center gap-2 text-gray-400 text-sm">
                            <i class="fas fa-shield-alt"></i> Pagamento 100% Seguro
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
<?php endif; ?>

<script>
    // Função para validar se os campos do passo 1 estão preenchidos
    function nextStep(currentStep) {
        if(currentStep === 1) {
            // Validação simples
            const inputs = document.querySelectorAll('#step-1 input[required]');
            let isValid = true;
            inputs.forEach(input => {
                if(!input.value) {
                    isValid = false;
                    input.classList.add('border-red-500', 'bg-red-50');
                } else {
                    input.classList.remove('border-red-500', 'bg-red-50');
                }
            });

            if(!isValid) {
                document.getElementById('error-msg-1').classList.remove('hidden');
                return;
            }
            document.getElementById('error-msg-1').classList.add('hidden');
        }
        setStep(currentStep + 1);
    }

    function setStep(step) {
        // Scroll top
        window.scrollTo({ top: 0, behavior: 'smooth' });

        // Logic UI change
        document.querySelectorAll('.checkout-step').forEach(el => el.classList.add('hidden'));
        document.getElementById('step-' + step).classList.remove('hidden');

        // Progress Bar
        const progress = (step - 1) * 50;
        document.getElementById('progress-bar').style.width = progress + '%';

        // Stepper Visuals
        updateStepper(step);

        if(step === 3) {
            document.getElementById('order-summary-panel').classList.add('hidden');
        } else {
            document.getElementById('order-summary-panel').classList.remove('hidden');
        }
    }

    function updateStepper(activeStep) {
        for (let i = 1; i <= 3; i++) {
            const circle = document.getElementById('circle-' + i);
            const label = document.getElementById('label-' + i);

            // Reset styles
            circle.className = "w-12 h-12 rounded-full flex items-center justify-center font-bold transition-all duration-300";
            label.className = "text-sm font-medium transition-colors";

            if (i < activeStep) {
                // Completed
                circle.classList.add('bg-rose-500', 'text-white');
                circle.innerHTML = '<i class="fas fa-check"></i>';
                label.classList.add('text-rose-600');
            } else if (i === activeStep) {
                // Active
                circle.classList.add('bg-gradient-to-r', 'from-rose-500', 'to-pink-500', 'text-white', 'shadow-lg', 'scale-110');
                circle.innerHTML = i;
                label.classList.add('text-rose-600', 'font-bold');
            } else {
                // Inactive
                circle.classList.add('bg-gray-200', 'text-gray-500');
                circle.innerHTML = i;
                label.classList.add('text-gray-400');
            }
        }
    }

    function selectPayment(element, type) {
        // Remove selection from all
        document.querySelectorAll('.payment-option').forEach(el => {
            el.classList.remove('selected', 'border-rose-500', 'bg-pink-50');
            el.classList.add('border-gray-200');

            // Reset radio circles
            const radio = el.querySelector('.radio-circle div, .rounded-full div');
            if(radio) radio.classList.remove('bg-rose-500');
            if(radio) radio.classList.add('bg-transparent');

            // Reset border of radio wrapper
            const radioWrapper = el.querySelector('.radio-circle, .rounded-full.border-2');
            if(radioWrapper) radioWrapper.classList.remove('border-rose-500');
            if(radioWrapper) radioWrapper.classList.add('border-gray-300');
        });

        // Add selection to clicked
        element.classList.add('selected', 'border-rose-500', 'bg-pink-50');
        element.classList.remove('border-gray-200');

        // Activate radio circle
        const activeRadio = element.querySelector('.radio-circle div, .rounded-full div');
        if(activeRadio) {
            activeRadio.classList.remove('bg-transparent');
            activeRadio.classList.add('bg-rose-500');
        }
        const activeWrapper = element.querySelector('.radio-circle, .rounded-full.border-2');
        if(activeWrapper) {
            activeWrapper.classList.remove('border-gray-300');
            activeWrapper.classList.add('border-rose-500');
        }

        // Show/Hide Card Details
        const details = document.getElementById('card-details');
        if(type === 'card') {
            details.classList.remove('hidden');
            details.classList.add('grid');
        } else {
            details.classList.add('hidden');
            details.classList.remove('grid');
        }
    }

    function handleCheckout() {
        const btn = document.getElementById('btn-finish');
        const originalText = btn.innerHTML;

        // Loading state
        btn.disabled = true;
        btn.innerHTML = '<div class="loader"></div> A Processar...';
        btn.classList.remove('from-rose-500', 'to-pink-500');
        btn.classList.add('bg-gray-400', 'cursor-not-allowed');

        // Simulate API call
        setTimeout(() => {
            setStep(3);
        }, 2000);
    }
</script>