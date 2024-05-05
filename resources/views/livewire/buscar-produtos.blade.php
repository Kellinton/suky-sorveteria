<div class="card mb-4">
    <div class="card-header pb-0 p-3">
        <h6 class="mb-1">Produtos</h6>
        <p class="text-sm">Lista de produtos</p>
    </div>
    <div class="card-body p-3">
        <div class="row">
            <div>
                <input type="text" wire:model="search" placeholder="Buscar produto...">
                <select wire:model="selectedCategoria">
                    <option value="">Todas</option>
                    <option value="acai">Açaí</option>
                    <option value="sorvetePote">Sorvete de Pote</option>
                    <option value="picole">Picolé</option>
                </select>
            </div>
        </div>
    <div class="row">
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
        @if ($produtos->count())

                @foreach ($produtos as $produto)
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
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

        @else
            <p>Nenhum produto encontrado.</p>
        @endif
    </div>
    </div>
</div>
