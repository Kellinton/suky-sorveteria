<div class="card-header pb-0">

        <div class="flex-col d-lg-flex  align-items-center justify-content-between">
            <div class="d-flex col-xl-3 col-sm-6 mb-xl-0 mb-4 w-100 w-lg-50">
                <div class="input-group rounded me-4">
                    <span class="input-group-text border-2 bg-transparent">
                      <i class="text-muted fas fa-search"></i>
                    </span>

                    <input type="text" class="form-control" wire:model="search" placeholder="Buscar funcionário...">
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
                                    <h5 class="modal-title" id="filtroModalLabel">Filtro de Funcionários</h5>
                                    <button class="btn btn-link bg-primary text-white p-3 text-dark p-0" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ri-close-line ri-xl"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Selects de Filtro -->
                                    <div class="form-group">
                                        <label for="funcaoSelect">Função:</label>
                                        <select id="funcaoSelect" wire:model="selectedFuncao" class="form-select w-100">
                                            <option value="">Todos</option>
                                            <option value="administrador">Administrador</option>
                                            <option value="assistente">Assistente</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="disponibilidadeSelect">Disponibilidade:</label>
                                        <select id="disponibilidadeSelect" wire:model="selectedDisponibilidade" class="form-select w-100">
                                            <option value="">Todos</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="">
                <a href="{{ route('funcionario.create') }}" class="btn bg-gradient-primary mb-0"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Cadastrar Funcionário</a>
            </div>
        </div>

    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Funcionário</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ocupação</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Salário</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data / Contrato</th>
                <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>

                @foreach($funcionarios->sortByDesc('updated_at') as $key => $funcionario)
                    <tr >
                        <td>
                            <div class="d-flex px-2 py-1">
                            <div>
                                @if ($funcionario->fotoFuncionario == ' ' || $funcionario->fotoFuncionario == null)
                                    <img src="{{ asset('img/usuario/perfil_usuario.png') }}" class="avatar avatar-sm me-3" alt="Foto do Funcionário">
                                @else
                                    <img src="{{ asset('storage/img/funcionarios/' . $funcionario->fotoFuncionario) }}" class="avatar avatar-sm me-3" alt="Foto do Funcionário">
                                @endif

                            </div>

                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $funcionario->nomeFuncionario }} {{ $funcionario->sobrenomeFuncionario }}</h6>
                                <p class="text-xs text-secondary mb-0 d-flex align-items-center">
                                    <i class="ri-time-line me-1"></i>
                                    Atualizado em {{ \Carbon\Carbon::parse($funcionario->updated_at)->format('d/m/Y H:i') }}
                                </p>
                            </div>

                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-1">{{ $funcionario->cargoFuncionario }}</p>
                            <p class="text-xs text-secondary mb-0">{{ ucfirst($funcionario->tipo_funcionario) }}</p>
                        </td>
                        <td>
                            <span class="text-secondary text-xs font-weight-bold">{{ $funcionario->salarioFuncionario }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-{{ $funcionario->statusFuncionario === 'inativo' ? 'danger' : 'success' }}">{{ $funcionario->statusFuncionario }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($funcionario->dataContratacaoFuncionario)->format('d/m/Y') }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <a href="{{ route('funcionario.show', ['id' => $funcionario->id]) }}" class="text-secondary font-weight-bold text-xs d-flex align-items-center gap-1" data-toggle="tooltip" data-original-title="Editar">
                            <i class="fas fa-pencil-alt text-dark cursor-pointer p-0 m-0" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Editar" data-bs-original-title="Editar"></i>
                            <p class="p-0 m-0 text-sm">Editar</p>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            </table>
        </div>
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
