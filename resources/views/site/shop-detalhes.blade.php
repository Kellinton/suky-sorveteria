@extends('layout.layout')
@section('title', 'Shop Detalhes')
@section('conteudo')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header shop-details py-5">
        <h1 class="text-center text-white display-6">Detalhes da loja</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active text-white">Detalhes da loja</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{ asset('img/produtos/single-item1.png') }}" class="img-fluid rounded"
                                        alt="Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">Picolé 1</h4>
                            <p class="mb-3">Categoria: Sorvetes</p>
                            <h5 class="fw-bold mb-3">R$ 3,35</h5>
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="mb-4">Experimente o picolé de morango da Suki Sorvetes! Sabor natural e refrescante,
                                perfeito para um dia quente.</p>
                            <p class="mb-4">Esses picolés são uma opção deliciosa e refrescante, especialmente em dias
                                quentes, e a simplicidade dos ingredientes ressalta o sabor natural e fresco do morango.</p>
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="#"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Descrição</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <p>Nosso picolé de chocolate é feito com ingredientes simples e de alta qualidade:
                                        chocolate de primeira, leite fresco e um toque de açúcar.</p>
                                    <p>A mistura é derretida, colocada em moldes com palitos, e depois congelada até atingir
                                        a textura perfeita. Desenformamos cuidadosamente para garantir que cada picolé tenha
                                        o formato ideal. Queremos que você desfrute de nossos picolés sabendo exatamente o
                                        que está consumindo: um produto delicioso e feito com honestidade. Venha provar!</p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div
                                                    class="row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Peso</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">175g</p>
                                                    </div>
                                                </div>
                                                {{--  <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Origem</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Agro Farm</p>
                                                    </div>
                                                </div>  --}}
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Avaliação</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Excelente</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Checagem</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Saudável</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Peso Mínimo</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">75g</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Jason Smith</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                                humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Sam Peters</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                                repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
                                        sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                        labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div>
                            </div>
                        </div>
                        {{--  <form action="#">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4"
                                            placeholder="Yur Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                            placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post
                                            Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>  --}}
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            {{--  <div class="input-group w-100 mx-auto d-flex mb-4">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="mb-4">
                                <h4>Categorias</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Açai</a>
                                            <span>(3)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Sorvete de pote</a>
                                            <span>(5)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Picolés</a>
                                            <span>(2)</span>
                                        </div>
                                    </li>
                                      <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                            <span>(8)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                            <span>(5)</span>
                                        </div>
                                    </li>  
                                </ul>
                            </div>  --}}
                        </div>
                        <div class="col-lg-12">
                            <h4 class="mb-4">Outros sabores</h4>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('img/produtos/feature-items/picole_2.png') }}" class="img-fluid rounded" alt="Image">
                                </div>
                                <div>
                                    <h6 class="mb-2">Picolé 2</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">R$ 2,50</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('img/produtos/feature-items/picole_3.png') }}" class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Picolé 3</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">R$ 2,50</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('img/produtos/feature-items/picole_4.png') }}" class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Picolé 4</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">R$ 2,50</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('img/produtos/feature-items/picole_5.png') }}" class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Picolé 5</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">R$ 2,50</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('img/produtos/feature-items/picole_6.png') }}" class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Picolé 6</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">R$ 2,50</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('img/produtos/feature-items/picole_7.png') }}" class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Picolé 7</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">R$ 2,50</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <a href="#"
                                    class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Ver mais</a>
                            </div>
                        </div>
                        {{--  <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute"
                                    style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            </div>
            <h1 class="fw-bold mb-0">Produtos Relacionados</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/sorvete_1.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Sorvete 1</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 4,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/acai_1.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Açai</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Açai 1</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 4,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/acai_2.png') }}" class="img-fluid w-100 rounded-top bg-light"
                                alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Açai</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Açai 2</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 7,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/sorvete_2.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Sorvete</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Sorvete 2</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 7,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/sorvete_3.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Sorvete</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Sorvete 3</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 7,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/acai_3.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Açai</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Açai 3</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 7,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/acai_4.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Açai</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Açai 4</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 7,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('img/produtos/produtos_relacionados/sorvete_4.png') }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Sorvete</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Sorvete 4</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">R$ 7,99 / UN</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->

@endsection
