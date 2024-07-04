@extends('dashboard.layoutdash.index')

@section('title', 'Dashboard')

@section('conteudo')

    <div class="row">
        <div class="col-lg-8">

        <div class="row">
            <div class="col-xl-4 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-landmark opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Valor em produtos</h6>
                    <span class="text-xs">A soma total do produtos no menu.</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">R$ {{ $totalValorProdutos }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-warehouse opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Produtos em Estoque</h6>
                    <span class="text-xs">Quantidade de ítens no estoque.</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">10</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-users opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Funcionários</h6>
                    <span class="text-xs">Quantidade e funcionários registrados.</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">{{ $totalFuncionarios }}</h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-12 mb-xl-0 mb-4 mt-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner overflow-hidden position-relative border-radius-xl" style="height: 250px;">

                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('dashboard/img/curved-images/curved14.jpg') }}" alt="First slide">

                    <div class="mask bg-gradient-primary">
                        <div class="card-body position-relative z-index-1 px-5 py-4">
                            <div class="d-flex">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Gerenciar Estoque</h5>
                                    <p class="text-white">Controle facilmente os ingredientes e insumos da sua sorveteria em um só lugar.</p>
                                    <a class="text-white text-lg font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                      Acessar
                                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                  </div>

                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('dashboard/img/curved-images/curved14.jpg') }}" alt="First slide">

                    <div class="mask bg-gradient-primary">
                        <div class="card-body position-relative z-index-1 px-5 py-4">
                            <div class="d-flex">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Gerenciar Menu</h5>
                                    <p class="text-white">Edite e atualize facilmente os sorvetes que aparecem no site da sua sorveteria.</p>
                                    <a class="text-white text-lg font-weight-bold mb-0 icon-move-right mt-auto" href="{{ route('produto.index') }}">
                                      Acessar
                                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('dashboard/img/curved-images/curved14.jpg') }}" alt="Third slide">
                    <div class="mask bg-gradient-primary">
                        <div class="card-body position-relative z-index-1 px-5 py-4">
                            <div class="d-flex">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Visualizar Mensagens</h5>
                                    <p class="text-white">Visualize às mensagens dos clientes da sua sorveteria rapidamente.
                                    </p>
                                    <a class="text-white text-lg font-weight-bold mb-0 icon-move-right mt-auto" href="{{ route('contato.index') }}">
                                      Acessar
                                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                </div>
                <a class="carousel-control-prev w-6" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next w-6" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only"></span>
                </a>
              </div>
        </div>

        </div>

        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Mensagens recentes</h6>
                </div>
                <div class="card-body p-3">
                <ul class="list-group">
                    @foreach ($contatos as $contato)
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="avatar me-3">
                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg" style="height: 50px; height: 50px;">
                                <i class="fas fa-user opacity-10" aria-hidden="true"></i>
                            </div>
                            {{-- <img src="{{ asset('dashboard/img/usuario/perfil_usuario.png') }}" alt="imagem de usuário" class="border-radius-lg shadow"> --}}
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $contato->nomeContato }}</h6>
                            <p class="mb-0 text-xs">{{ Str::limit($contato->mensagemContato, 25, '...') }}</p>
                        </div>
                        <p class="pe-3 ps-0 mb-0 ms-auto text-xs">{{ \Carbon\Carbon::parse($contato->created_at)->diffForHumans() }}</p>
                        </li>
                    @endforeach

                </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-1">Gestão de Menu</h6>
            <p class="text-sm">Adicione e/ou Atualize produtos do seu site!</p>
          </div>
          <div class="card-body p-3">
            <div class="row">
            @if($produtos->count())
                @foreach ($produtos->sortByDesc('id') as $produto)

                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <div class="d-block shadow-xl border-radius-xl position-relative">
                                    <span
                                       class="badge badge-lg bg-gradient-{{ $produto->statusProduto === 'inativo' ? 'danger' : 'success' }} position-absolute m-3" style="font-size: 1rem;">
                                       {{ $produto->statusProduto === 'inativo' ? 'Indisponível' : 'Disponível' }}
                                    </span>

                                    <img class="w-100 border-radius-xl" src="{{ asset('storage/img/produtos/' . $produto->categoriaProduto . '/' . $produto->fotoProduto) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="width: 306px; height: 214px;">
                                </div>
                            </div>
                            <div class="card-body px-1 pb-0 mb-5">
                                <a href="javascript:;">
                                    <h5 style="min-height: 25px;">
                                        {{ $produto->nomeProduto }}
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm" style="min-height: 50px;">
                                    {{ $produto->descricaoProduto }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 text-bolder text-2xl">R$ {{ $produto->valorProduto }}</p>
                                        <a href="{{ route('produto.index') }}" class="btn btn-outline-primary btn-sm mb-0 bg-gradient-primary">Editar</a>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
            @else
                <div class="col-xl-9 col-md-6 mb-xl-0 mb-4">
                    <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                            <img class="w-20" src="{{ asset('dashboard/img/sem_produtos.png') }}" alt="caixa vazia">

                            <p>Nenhum produto encontrado ;(</p>

                    </div>
                </div>
            @endif

            </div>
          </div>
        </div>
      </div>


@endsection

