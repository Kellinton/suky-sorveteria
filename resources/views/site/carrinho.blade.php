@extends('layout.layout')
@section('title','Carrinho')
@section('conteudo')


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5 cart-shop">
            <h1 class="text-center text-white display-6">Carrinho</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url ('/') }}">Início</a></li>
                <li class="breadcrumb-item active text-white">Carrinho</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produtos</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Total</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr id="itemCarrinho">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset ('img/produtos/acai/acai_3.png') }}" class="img-fluid me-5" style="width: 120px; height: 100px; border-radius: 10px" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">Açai 3</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">R$ 4,99</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">R$ 4,99</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" id="removerDoCarrinho">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>

                            <tr id="itemCarrinho">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset ('img/produtos/sorvetePote/sorvete-8.png') }}" class="img-fluid me-5" style="width: 120px; height: 100px; border-radius: 10px" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">Sorvete de Chocolate</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">R$ 24,99</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">R$ 24,99</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr id="itemCarrinho">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset ('img/produtos/picole/picole_7.png') }}" class="img-fluid me-5" style="width: 120px; height: 100px; border-radius: 10px" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">Picolé 7</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">R$ 2,99</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">R$ 2,99</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Código do Cupom">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Aplicar Cupom</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Carrinho <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">R$ 95,99</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Envio</h5>
                                    <div class="">
                                        <p class="mb-0">Taxa fixa: R$ 4,99</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Envio para SP</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">R$ 99,99</p>
                            </div>
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Prosseguir para o Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->

@endsection
