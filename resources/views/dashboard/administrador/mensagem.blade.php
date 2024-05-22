@extends('dashboard.layoutdash.index')

@section('title', 'Mensagens')
<style>
    /* Estilização paginação */
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination {
        display: flex;
    }

    .pagination-link {
        padding: 5px 10px;
        font-size: 1.5rem;
        margin-right: 10px;
        color: var(--white);
        background-color: var(--blue);
        border-radius: 9999px;
        text-decoration: none;
    }

    .pagination-link:hover {
        background-color: var(--blue);
        color: var(--white);
        text-decoration: none;
    }

    .pagination-link.disabled {
        color: var(--gray);
        background: none;
        cursor: not-allowed;
    }

    .pagination-icon {
        margin-right: 5px;
    }

    .message-counter p {
        margin: 0;
        font-size: 14px;
        color: var(--gray);
    }


    /* Estilização Modal */

    .m-container{
        padding: 10px;
    }
    .m-info{
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .m-info img{
        background-color: #5c5858;
        border-radius: 9999px;
        width: 50px;
        height: 50px;
    }
    .m-info div{
        display: flex;
        flex-direction: column;
        margin-left: 20px;
    }
    .m-info div span{
        font-size: 1.2rem;
        color: var(--fundo);
    }
    .m-info div p{
    font-size: 1rem;
    color: var(--gray);
    font-weight: 500;
    margin-bottom: 0;
    }
    .m-data{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .m-data p{
        color: var(--fundo);
    }

</style>
@section('conteudo')
    <div class="row mb-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Mensagens</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{-- R$ {{ number_format($totalSalario, 2, ',', '.') }} --}}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Favoritos</p>
                    <h5 class="font-weight-bolder mb-0">
                    {{-- {{ $totalFuncionarios }} --}}

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

                {{-- Paginação --}}
                <div role="navigation" aria-label="Pagination Navigation" class="pagination-container">
                    <div class="pagination">
                        @if ($contatos->previousPageUrl())
                            <a href="{{ $contatos->previousPageUrl() }}" class="pagination-link">
                                <i class="ri-arrow-drop-left-line"></i>
                            </a>
                        @else
                            <span class="pagination-link disabled">
                                <i class="ri-arrow-drop-left-line"></i>
                            </span>
                        @endif

                        @if ($contatos->nextPageUrl())
                            <a href="{{ $contatos->nextPageUrl() }}" class="pagination-link">
                                <i class="ri-arrow-drop-right-line"></i>
                            </a>
                        @else
                            <span class="pagination-link disabled">
                                <i class="ri-arrow-drop-right-line"></i>
                            </span>
                        @endif
                    </div>

                    <div class="message-counter">
                        <p>
                            <span>{{ $contatos->firstItem() }}</span> - <span>{{ $contatos->lastItem() }}</span>
                            de
                            <span>{{ $contatos->total() }}</span>
                            mensagens
                        </p>
                    </div>
                </div>

                <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Mensagens</h6>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mensagem</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($contatos as $contato)
                        <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{ asset('dashboard/img/usuario/perfil_usuario.png') }}" class="avatar avatar-sm me-3" alt="Foto do Funcionário">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $contato->nomeContato }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $contato->emailContato }}</p>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-1">{{ $contato->assuntoContato }}: </p>
                            <p class="text-xs text-secondary mb-0">{{ Str::limit($contato->mensagemContato, 25, '...') }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($contato->created_at)->diffForHumans() }} atrás</span>
                        </td>
                        <td class="align-middle text-center">
                            {{-- <a href="{{ route('funcionario.show', ['id' => $funcionario->id]) }}" class="text-secondary font-weight-bold text-xs d-flex align-items-center gap-1" data-toggle="tooltip" data-original-title="Editar">
                            <i class="fas fa-pencil-alt text-dark cursor-pointer p-0 m-0" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Editar" data-bs-original-title="Editar"></i>
                            <p class="p-0 m-0 text-sm">Editar</p>
                            </a> --}}
                        </td>
                        </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
