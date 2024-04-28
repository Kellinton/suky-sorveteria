@extends('dashboard.layoutdash.index')

@section('title', 'Produtos')
<style>
    .filtro-ativo{
        background-color: #fff!important;
        color: #cb0c9f!important;
    }
</style>
@section('conteudo')

<div class="col-12 mt-4">
    <div class="card mb-4">
      {{-- <div class="card-header pb-0 p-3">
        <h6 class="mb-1">Produtos</h6>
        <p class="text-sm">Lista de produtos</p>
      </div> --}}
      <div class="card-body p-3">
        <div class="row">

            {{-- <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="busca" placeholder="Buscar por nome...">
                </div>
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn-primary" id="btn-filtrar">Filtrar</button>
                </div>
            </div> --}}

            <!-- Botões de filtro -->
            <div class="filtro-btn-menu pb-4" id="botoes-filtro">
                <button id="filtro-btn-acai" class="filtro-ativo btn btn-primary" data-categoria="todos" title="Todos">
                    <span>Todos</span>
                </button>
                <button id="filtro-btn-acai" class="btn btn-primary" data-categoria="acai" title="Açaís">
                    <span>Acaí</span>
                </button>
                <button id="filtro-btn-sorvetePote" class="btn btn-primary" data-categoria="sorvetePote" title="Sorvetes de pote">
                    <span>Sorvete de Pote</span>
                </button>
                <button id="filtro-btn-picole" class="btn btn-primary" data-categoria="picole" title="Picolés">
                    <span>Picolé</span>
                </button>
            </div>

        </div>
        <div class="row" id="produtos-container">
            <div class="col-xl-3 col-md-6 mb-xl-0 pb-4">
                <div class="card h-100 card-plain border h-100">
                  <div class="card-body d-flex flex-column justify-content-center text-center">
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus text-secondary mb-3 text-4xl"></i>
                        <h5 class="text-secondary">Adicionar</h5>
                    </button>
                  </div>
                </div>
            </div>

            {{-- @php novidade!!!
            $maxId = App\Models\Cardapio::max('idProduto');
            @endphp --}}

            @foreach ($produtos as $produto)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 produto-filtrar" data-categoria="{{ $produto->categoriaProduto }}">
                <div class="card card-blog card-plain">
                    <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl position-relative">
                            <span class="badge badge-sm bg-gradient-success position-absolute m-3">ativo</span>
                            <img class="w-100 border-radius-xl" src="{{ asset('img/produtos/' . $produto->categoriaProduto . '/' . $produto->fotoProduto) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body px-1 pb-0 mb-5">
                        {{-- @if ($produto->categoriaProduto == 'sorvetePote')
                            <p class="text-gradient text-dark mb-2 text-sm">Sorvete de pote</p>
                        @elseif ($produto->categoriaProduto == 'picole')
                            <p class="text-gradient text-dark mb-2 text-sm">Picolé</p>
                        @elseif ($produto->categoriaProduto == 'acai')
                            <p class="text-gradient text-dark mb-2 text-sm">Açaí</p>
                        @endif --}}
                        <a href="javascript:;">
                        <h5>
                            {{ $produto->nomeProduto }}
                        </h5>
                        </a>
                        <p class="mb-4 text-sm">
                            {{ $produto->descricaoProduto }}
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 text-bolder text-2xl">R$ {{ $produto->valorProduto }}</p>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0 bg-gradient-primary">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
      </div>
    </div>
  </div>

@include('dashboard.administrador.produto.create')
@endsection
