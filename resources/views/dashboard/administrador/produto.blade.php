@extends('dashboard.layoutdash.index')

@section('title', 'Produtos')
<style>
    select{
        border-radius: 2px;
        width: 250px!important;
        padding: 10!important;
    }

    optgroup {
        font-weight: bold; /* Define a fonte em negrito */
    }

</style>
@section('conteudo')

<div class="col-12 mt-4">
    <div class="card mb-4">
        <div class="card-header pb-0 p-3">
            <div class="row mb-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Valor em Produtos</p>
                            <h5 class="font-weight-bolder mb-0">
                                R$ {{ number_format($totalValorProdutos, 2, ',', '.') }}
                            </h5>
                        </div>
                        </div>
                        <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-money-coins text-2xl opacity-10" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Quantidade de itens</p>
                            <h5 class="font-weight-bolder mb-0">
                             {{ $totalProdutos }}
                            <span class="text-success text-sm font-weight-bolder">+3%</span>
                            </h5>
                        </div>
                        </div>
                        <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-bag-17 text-2xl opacity-10" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>
        </div>

        <!-- Biblioteca Livewire para filtrar -->
        @livewire('buscar-produtos')
    </div>

</div>

@include('sweetalert::alert')

@include('dashboard.administrador.produto.create')
@endsection
