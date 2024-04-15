@extends('dashboard.layoutdash.index')

@section('title', 'Produtos')

@section('conteudo')

<div class="col-12 mt-4">
    <div class="card mb-4">
      {{-- <div class="card-header pb-0 p-3">
        <h6 class="mb-1">Produtos</h6>
        <p class="text-sm">Lista de produtos</p>
      </div> --}}
      <div class="card-body p-3">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-xl-0 pb-4">
                <div class="card h-100 card-plain border h-100">
                  <div class="card-body d-flex flex-column justify-content-center text-center">
                    <a href="javascript:;">
                      <i class="fa fa-plus text-secondary mb-3 text-4xl"></i>
                      <h5 class=" text-secondary">Adicionar</h5>
                    </a>
                  </div>
                </div>
              </div>
            @foreach ($produtos as $produto)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                    <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                        <img class="w-100 border-radius-xl" src="{{ asset('img/produtos/' . $produto->categoriaProduto . '/' . $produto->fotoProduto) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body px-1 pb-0 mb-5">
                        @if ($produto->categoriaProduto == '1')
                            <p class="text-gradient text-dark mb-2 text-sm">Sorvete de pote</p>
                        @elseif ($produto->categoriaProduto == '2')
                            <p class="text-gradient text-dark mb-2 text-sm">Picolé</p>
                        @elseif ($produto->categoriaProduto == '3')
                            <p class="text-gradient text-dark mb-2 text-sm">Açaí</p>
                        @endif
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
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
      </div>
    </div>
  </div>

@endsection
