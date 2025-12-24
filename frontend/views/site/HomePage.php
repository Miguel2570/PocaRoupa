<?php
use yii\bootstrap5\Html;

/** @var yii\web\View $this */

$this->title = 'PocaRoupa | Home';

// Registo do CSS específico desta página
$this->registerCssFile('@web/css/site/HomePage.css', [
        'depends' => [\yii\bootstrap5\BootstrapAsset::class]
]);
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<div class="top-bar py-2 bg-light border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6 text-center text-sm-start">
                <i class="fa fa-envelope me-2"></i>apoio@pocaroupa.com
            </div>
            <div class="col-sm-6 text-center text-sm-end">
                <i class="fa fa-phone-alt me-2"></i>+351 123 456 789
            </div>
        </div>
    </div>
</div>
<div class="nav-section bg-dark">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="#" class="nav-item nav-link active">Início</a>
                    <a href="#" class="nav-item nav-link">Produtos</a>
                    <a href="#" class="nav-item nav-link">Carrinho</a>
                    <a href="#" class="nav-item nav-link">Checkout</a>
                    <a href="#" class="nav-item nav-link">Contactos</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Minha Conta</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Login</a>
                            <a href="#" class="dropdown-item">Registar</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="bottom-bar py-3 bg-white shadow-sm mb-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="#" class="text-decoration-none text-dark h2">
                        Poca<span class="text-danger">Roupa</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar...">
                    <button class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3 text-end">
                <a href="#" class="btn btn-outline-dark position-relative">
                    <i class="fa fa-heart"></i>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">0</span>
                </a>
                <a href="#" class="btn btn-outline-dark position-relative ms-2">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">0</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="header mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
                <nav class="navbar bg-white shadow-sm h-100 align-items-start">
                    <ul class="navbar-nav w-100 p-3">
                        <li class="nav-item"><a class="nav-link text-dark border-bottom" href="#"><i class="fa fa-home me-2"></i>Início</a></li>
                        <li class="nav-item"><a class="nav-link text-dark border-bottom" href="#"><i class="fa fa-shopping-bag me-2"></i>Mais Vendidos</a></li>
                        <li class="nav-item"><a class="nav-link text-dark border-bottom" href="#"><i class="fa fa-plus-square me-2"></i>Novidades</a></li>
                        <li class="nav-item"><a class="nav-link text-dark border-bottom" href="#"><i class="fa fa-tshirt me-2"></i>Roupa</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#"><i class="fa fa-mobile-alt me-2"></i>Acessórios</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div id="header-slider" class="carousel slide shadow-sm" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://placehold.co/800x450/222/fff?text=Colecao+Verao" class="d-block w-100" alt="Slider Image">
                            <div class="carousel-caption d-none d-md-block bg-danger bg-opacity-75 p-3 rounded">
                                <h5 class="text-white">Nova Coleção 2025</h5>
                                <a class="btn btn-light btn-sm" href="">Comprar Agora</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://placehold.co/800x450/333/fff?text=Saldos+Inverno" class="d-block w-100" alt="Slider Image">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-slider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-slider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="position-relative shadow-sm overflow-hidden">
                            <img src="https://placehold.co/400x215/555/fff?text=Oferta+Homem" class="img-fluid w-100" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="position-relative shadow-sm overflow-hidden">
                            <img src="https://placehold.co/400x215/777/fff?text=Oferta+Mulher" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="feature mb-5">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center py-4 h-100">
                    <div class="card-body">
                        <i class="fab fa-cc-mastercard fa-3x text-danger mb-3"></i>
                        <h5>Pagamento Seguro</h5>
                        <p class="text-muted small">Transações 100% protegidas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center py-4 h-100">
                    <div class="card-body">
                        <i class="fa fa-truck fa-3x text-danger mb-3"></i>
                        <h5>Entregas Globais</h5>
                        <p class="text-muted small">Para todo o mundo</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center py-4 h-100">
                    <div class="card-body">
                        <i class="fa fa-sync-alt fa-3x text-danger mb-3"></i>
                        <h5>90 Dias Devolução</h5>
                        <p class="text-muted small">Sem perguntas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center py-4 h-100">
                    <div class="card-body">
                        <i class="fa fa-comments fa-3x text-danger mb-3"></i>
                        <h5>Suporte 24/7</h5>
                        <p class="text-muted small">Sempre online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="featured-product product mb-5">
    <div class="container-fluid">
        <div class="section-header border-bottom mb-4 pb-2">
            <h2 class="text-danger fw-bold">Produtos em Destaque</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 product-item">
                    <div class="position-relative overflow-hidden">
                        <img src="https://placehold.co/300x350?text=Produto+1" class="card-img-top" alt="Product Image">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">T-Shirt Básica</a></h5>
                        <div class="text-warning mb-2">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <h4 class="fw-bold">$99.00</h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center pb-3">
                        <a class="btn btn-outline-danger btn-sm" href=""><i class="fa fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 product-item">
                    <div class="position-relative overflow-hidden">
                        <img src="https://placehold.co/300x350?text=Produto+2" class="card-img-top" alt="Product Image">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">Calças Jeans</a></h5>
                        <div class="text-warning mb-2">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="far fa-star"></i>
                        </div>
                        <h4 class="fw-bold">$99.00</h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center pb-3">
                        <a class="btn btn-outline-danger btn-sm" href=""><i class="fa fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 product-item">
                    <div class="position-relative overflow-hidden">
                        <img src="https://placehold.co/300x350?text=Produto+3" class="card-img-top" alt="Product Image">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">Casaco Inverno</a></h5>
                        <div class="text-warning mb-2">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <h4 class="fw-bold">$99.00</h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center pb-3">
                        <a class="btn btn-outline-danger btn-sm" href=""><i class="fa fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 product-item">
                    <div class="position-relative overflow-hidden">
                        <img src="https://placehold.co/300x350?text=Produto+4" class="card-img-top" alt="Product Image">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">Ténis Sport</a></h5>
                        <div class="text-warning mb-2">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="far fa-star"></i>
                        </div>
                        <h4 class="fw-bold">$99.00</h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center pb-3">
                        <a class="btn btn-outline-danger btn-sm" href=""><i class="fa fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="newsletter bg-danger py-5 mb-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h2 class="text-white">Subscreva a nossa Newsletter</h2>
                <p class="text-white mb-0">Receba novidades e promoções exclusivas.</p>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="O seu email aqui">
                    <button class="btn btn-dark">Subscrever</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer bg-dark text-white pt-5">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-danger">Contactos</h5>
                <p><i class="fa fa-map-marker-alt me-2"></i>123 Rua Principal, Lisboa</p>
                <p><i class="fa fa-envelope me-2"></i>email@exemplo.com</p>
                <p><i class="fa fa-phone me-2"></i>+351 123 456 789</p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-danger">Redes Sociais</h5>
                <div class="d-flex">
                    <a class="btn btn-outline-light btn-sm rounded-0 me-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-sm rounded-0 me-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-sm rounded-0 me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-sm rounded-0 me-2" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-danger">Informação</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Sobre Nós</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Política de Privacidade</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Termos & Condições</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-danger">Pagamentos</h5>
                <img src="https://placehold.co/250x30/444/fff?text=Metodos+Pagamento" alt="Payment" class="img-fluid" />
            </div>
        </div>

        <div class="row border-top border-secondary mt-4 pt-4 pb-4">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">Copyright &copy; <a href="#" class="text-danger text-decoration-none">PocaRoupa</a>. All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">Designed By HTML Codex</p>
            </div>
        </div>
    </div>
</div>
