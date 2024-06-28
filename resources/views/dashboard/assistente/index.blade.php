
@extends('dashboard.layoutdash.index')

@section('title', 'Dashboard')
<style>
    /* Estilização paginação */
    .pagination-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .pagination {
        display: flex;
    }

    .pagination-link {
        padding: 2px 10px;
        font-size: 1.7rem;
        margin-right: 10px;
        color: #fff;
        background-color: #cb0c9f;
        border-radius: 9999px;
        text-decoration: none;
    }

    .pagination-link:hover {
        background-color: #cb0c9f;
        color: #fff;
        text-decoration: none;
    }

    .pagination-link.disabled {
        color: gray;
        background: none;
        cursor: not-allowed;
    }

    .pagination-icon {
        margin-right: 5px;
    }

    .message-counter p {
        margin: 0;
        font-size: 14px;
        color: #fff;
    }

    /* Estilização Filtro */
    .filtro-btn-mensagem button {
        background: none;
        color: #67748e;
        border: none;
        border-bottom: solid 3px transparent;
        padding: 5px;
        margin-right: 10px;

    }
    .filtro-ativo{
        border-bottom: solid 3px #cb0c9f!important;
        padding: 4px;
        background-color: red;
    }
    .mensagem-filtrar{
        cursor: pointer;
    }
    .mensagem-filtrar:hover{
        background-color: #a59f9f17;
    }
    .lido{
        background-color: #a59f9f25;
    }
    .favoritar-btn{
        background: none;
        border: none;
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
                        {{ $totalMensagens }}
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i>
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
                        {{ $totalMensagensComFavorito }}
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ri-bard-fill text-lg opacity-10" aria-hidden="true"></i>
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
            <div class="row d-flex align-items-center">
                <div class="col-6 d-flex align-items-center filtro-btn-mensagem">
                    <button id="filtro-btn-principal" data-categoria="principal"  class="filtro-ativo">
                        <i class="ri-home-6-line" aria-hidden="true"></i>&nbsp;&nbsp;<span class="text-bold">Principal</span>
                    </button>
                    <button id="filtro-btn-favorito" data-categoria="favorito" class="">
                        <i class="ri-star-line" aria-hidden="true"></i>&nbsp;&nbsp;<span class="text-bold">Favoritos</span>
                    </button>
                    <button id="filtro-btn-lixeira" data-categoria="lixeira" class="">
                        <i class="ri-delete-bin-line" aria-hidden="true"></i>&nbsp;&nbsp;<span class="text-bold">Lixeira</span>
                    </button>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($contatos as $contato)
                            <tr class="mensagem-filtrar {{ $contato->lidoContato == '1' ? 'lido' : '' }}" data-removido="{{ $contato->removidoContato }}" data-favorito="{{ $contato->favoritoContato }}" data-id="{{ $contato->id }}" data-toggle="modal" data-target="#show{{ $contato->id }}">
                                <td>
                                    <div class="d-flex px-2 py-1">
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('assistente.contato.favoritar', $contato->id) }}" method="POST" class="favoritar-form">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="favoritar-btn prevent-modal">
                                                @if ($contato->favoritoContato === 1)
                                                    <i class="ri-star-fill text-2xl p-1 me-2" style="cursor: pointer; color: #F0BB40"></i>
                                                @else
                                                    <i class="ri-star-line text-2xl p-1 me-2" style="cursor: pointer; color: #67748e"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
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
                                    <p class="text-xs font-weight-bolder mb-1">{{ $contato->assuntoContato }}: </p>
                                    <p class="text-xs text-secondary mb-0">{{ Str::limit($contato->mensagemContato, 25, '...') }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if ($contato->respondidoContato === 1)
                                        <span class="badge badge-sm bg-gradient-success">Respondido!</span>
                                    @else
                                        <span> </span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($contato->created_at)->isoFormat('DD [de] MMMM') }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('assistente.contato.remover', $contato->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-secondary font-weight-bold text-xs favoritar-btn prevent-modal">
                                            <i class="{{ $contato->removidoContato === 1 ? 'ri-arrow-go-back-line' : 'ri-delete-bin-line text-lg' }}"></i>
                                            <p class="p-0 m-0 text-sm">{{ $contato->removidoContato === 1 ? 'Recuperar' : 'Excluir' }}</p>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @include('dashboard.assistente.mensagem.show', ['id' => $contato->id])
                        @endforeach

                    </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {
    // Verificar cada contato na página ao carregar
    $('.mensagem-filtrar').each(function() {
        var id = $(this).data('id');
        var contatoElement = $(this);

        $.get('/dashboard/assistente/mensagem/verificar-lido/' + id, function(data) {
            if (data.lido) {
                contatoElement.addClass('lido');
            }
        });
    });

    // Captura o evento de fechamento do modal
    $('.modal').on('hidden.bs.modal', function () {
        var id = $(this).attr('id').replace('show', '');

        // Marca o contato como lido
        $('.mensagem-filtrar[data-id="' + id + '"]').addClass('lido');

        // Atualiza o status de lido no servidor
        $.ajax({
            url: '/dashboard/assistente/mensagem/atualizar-lido/' + id,
            type: 'PUT',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // Inclui o CSRF token
                lidoContato: true
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});


    // Filtro mensagens Principal/Favoritos/Lixeira

    document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.filtro-btn-mensagem button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {

            // Remove a classe 'filtro-ativo' de todos os botões
            buttons.forEach(btn => btn.classList.remove('filtro-ativo'));

            // Adiciona a classe 'filtro-ativo' ao botão clicado
            button.classList.add('filtro-ativo');

            const categoria = button.getAttribute('data-categoria');
            filtrar(categoria); // principal, favorito, lixeira
        });
    });

    function filtrar(categoria) {
        const contatos = document.querySelectorAll('.mensagem-filtrar');

        contatos.forEach(contato => {
            const removido = contato.getAttribute('data-removido') === '1';
            const favorito = contato.getAttribute('data-favorito') === '1';

            switch (categoria) {
                case 'principal':
                    contato.style.display = removido ? 'none' : 'table-row';
                    break;
                case 'favorito':
                    contato.style.display = favorito ? 'table-row' : 'none';
                    break;
                case 'lixeira':
                    contato.style.display = removido ? 'table-row' : 'none';
                    break;
            }
        });
    }
    // Chama a função filtrar para a categoria 'principal' ao carregar a página
    filtrar('principal');
});

// Função para desativar a ação de abrir o modal, o elemento que tiver a classe prevent-modal terá a ação do modal interrompida
document.addEventListener('DOMContentLoaded', function () {
        const preventModalButtons = document.querySelectorAll('.prevent-modal');

        preventModalButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.stopPropagation();
            });
        });
    });


</script>
