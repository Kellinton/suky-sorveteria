@extends('dashboard.layoutdash.index')

@section('title', 'Funcionários')

@section('conteudo')
    <div class="row mb-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Salário Total</p>
                    <h5 class="font-weight-bolder mb-0">
                        R$ {{ number_format($totalSalario, 2, ',', '.') }}
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Funcionários</p>
                    <h5 class="font-weight-bolder mb-0">
                     {{ $totalFuncionarios }}
                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Funcionários</h6>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('funcionario.create') }}" class="btn bg-gradient-primary mb-0"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Cadastrar Funcionário</a>
                </div>
            </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuário</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ocupação</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data / Contrato</th>
                    <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($funcionarios as $key => $funcionario)
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            @if ($funcionario->fotoFuncionario == ' ' || $funcionario->fotoFuncionario == null)
                                <img src="{{ asset('dashboard/img/usuario/perfil_usuario.png') }}" class="avatar avatar-sm me-3" alt="Foto do Funcionário">
                            @else
                                <img src="dashboard/img/team-2.jpg" class="avatar avatar-sm me-3" alt="Foto do Funcionário">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $funcionario->nomeFuncionario }} {{ $funcionario->sobrenomeFuncionario }}</h6>

                            <p class="text-xs text-secondary mb-0">{{ $funcionario->email }}</p>

                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-1">{{ $funcionario->cargoFuncionario }}</p>
                        <p class="text-xs text-secondary mb-0">{{ ucfirst($funcionario->tipo_funcionario) }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{ $funcionario->statusFuncionario }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $funcionario->dataContratacaoFuncionario }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs d-flex align-items-center gap-1" data-toggle="tooltip" data-original-title="Editar">
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
</div>
</div>


@endsection

