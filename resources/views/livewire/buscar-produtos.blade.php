<div class="card-body p-3">
        <div class="row mb-4">
            <div class="d-flex col-xl-3 col-sm-6 mb-xl-0 mb-4 w-100 w-lg-50">
                <div class="input-group rounded me-4">
                    <span class="input-group-text border-2 bg-transparent">
                      <i class="text-muted fas fa-search"></i>
                    </span>

                    <input type="text" class="form-control" wire:model="search" placeholder="Buscar produto...">
                </div>
                <div class="position-relative">
                    <button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#filtroModal">
                        <i class="ri-equalizer-2-line mr-2 text-2xl"></i>
                    </button>


                    <!-- Modal de filtro -->
                    <div class="modal fade" id="filtroModal" tabindex="-1" role="dialog" aria-labelledby="filtroModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filtroModalLabel">Filtro de Produtos</h5>
                                    <button class="btn btn-link bg-primary text-white p-3 text-dark p-0" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ri-close-line ri-xl"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Selects de Filtro -->
                                    <div class="form-group">
                                        <label for="categoriaSelect">Categoria:</label>
                                        <select id="categoriaSelect" wire:model="selectedCategoria" class="form-select w-100">
                                            <option value="">Todas</option>
                                            <option value="acai">Açaí</option>
                                            <option value="sorvetePote">Sorvete de Pote</option>
                                            <option value="picole">Picolé</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="disponibilidadeSelect">Disponibilidade:</label>
                                        <select id="disponibilidadeSelect" wire:model="selectedDisponibilidade" class="form-select w-100">
                                            <option value="">Todos</option>
                                            <option value="ativo">Disponível</option>
                                            <option value="inativo">Indisponível</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <div class="row" style="min-height: 500px">
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
                                    <h5 style="min-height: 60px;">
                                        {{ $produto->nomeProduto }}
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm" style="min-height: 70px;">
                                    {{ $produto->descricaoProduto }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 text-bolder text-2xl">R$ {{ $produto->valorProduto }}</p>
                                        <a href="" class="btn btn-outline-primary btn-sm mb-0 bg-gradient-primary" data-toggle="modal" data-target="#edit{{ $produto->id }}">Editar</a>
                                </div>
                            </div>

                        </div>
                    </div>




                @endforeach

                @foreach ($produtos->sortByDesc('id') as $produto)

                    @include('dashboard.administrador.produto.edit', ['id' => $produto->id])

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

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.hook('beforeDomUpdate', (component, html) => {
            // Fechar modal após aplicar filtro
            Livewire.on('fecharModalFiltro', () => {
                // Chamar data-dismiss="modal" após a lógica do Livewire
                $('#filtroModal').modal('hide');
            });
        });
    });
</script>
@endpush
