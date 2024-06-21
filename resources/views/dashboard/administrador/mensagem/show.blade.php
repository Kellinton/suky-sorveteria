<style>
    /* Estilização Modal */
    .m-container {
        padding: 10px;
    }

    .m-info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .m-info img {
        width: 80px;
        height: 80px;
    }

    .m-info div {
        display: flex;
        flex-direction: column;
        margin-left: 20px;
    }

    .m-info div span {
        font-size: 1.2rem;
        color: #344767;
        font-weight: 600;
    }

    .m-info div p {
        font-size: 1rem;
        color: var(--gray);
        font-weight: 500;
        margin-bottom: 0;
    }

    .m-data {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .m-data p {
        color: var(--fundo);
    }
</style>

@foreach($contatos as $contato)
    <div class="modal fade" id="show{{ $contato->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Conteúdo do modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $contato->assuntoContato }}</h5>
                    @if ($contato->favoritoContato === 1)
                    <a href="">
                        <i class="ri-star-fill text-2xl p-1 me-2" style="cursor: pointer; color: #F0BB40"></i>
                    </a>
                    @else
                    <a href="">
                        <i class="ri-star-line text-2xl p-1 me-2" style="cursor: pointer; color: #67748e"></i>
                    </a>
                    @endif
                </div>
                <div class="modal-body">
                    <div class="m-container py-0">
                        <!-- Informações do contato -->
                        <div class="m-info" id="contact-info{{ $contato->id }}">
                            <img src="{{ asset('dashboard/img/usuario/perfil_usuario.png') }}" alt="">
                            <div>
                                <span>{{ $contato->nomeContato }}</span>
                                <p class="text-sm">Assunto: {{ $contato->assuntoContato }}</p>
                                <p class="text-sm">Email: {{ $contato->emailContato }}</p>
                            </div>
                        </div>
                        <div class="mt-4" id="contact-message{{ $contato->id }}">
                            <span class="text-bold" style="color: #344767;">Mensagem: </span>
                            <p>{{ $contato->mensagemContato }}</p>
                        </div>

                        <!-- Formulário de resposta -->
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="contact_id" value="{{ $contato->id }}">
                            <input type="hidden" name="nome_administrador" value="{{ $funcionarioAutenticado->nomeFuncionario }} {{ $funcionarioAutenticado->sobrenomeFuncionario }}">
                            <input type="hidden" name="tipo_administrador" value="{{ $funcionarioAutenticado->tipo_funcionario }}">
                            <div class="m-container p-0 m-0" id="reply-form{{ $contato->id }}" style="display:none;">
                                <div class="m-info">
                                    <img src="{{ asset('img/funcionarios/' . $funcionarioAutenticado->fotoFuncionario) }}" alt="Imagem de Perfil" title="Imagem de Perfil" class="border-radius-lg">
                                    <div>
                                        <span>{{ $funcionarioAutenticado->nomeFuncionario }} {{ $funcionarioAutenticado->sobrenomeFuncionario }}</span>
                                        <p class="text-sm">{{ Str::ucfirst($funcionarioAutenticado->tipo_funcionario) }}</p>
                                        <p class="text-sm">Responder para: <span class="text-sm">{{ $contato->nomeContato }}</span></p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <span class="text-bold" style="color: #344767;"></span>
                                    <textarea class="form-control" name="mensagem_administrador" rows="4">Deixe sua mensagem...</textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <p class="p-0 m-0">{{ \Carbon\Carbon::parse($contato->created_at)->isoFormat('DD [de] MMMM') }}</p>
                            </div>
                            <div class="modal-footer m-data px-0">
                                <div id="buttons-view{{ $contato->id }}" class="w-100">
                                    <div class="w-100 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary m-0" data-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary m-0" onclick="showReplyForm({{ $contato->id }})">Responder</button>
                                    </div>
                                </div>
                                <div id="buttons-reply{{ $contato->id }}" class="w-100" style="display:none;">
                                    <div class="w-100 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary m-0" onclick="showContactInfo({{ $contato->id }})">Voltar</button>
                                        <button type="submit" class="btn btn-success m-0">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function showReplyForm(contactId) {
        // Esconde as informações do contato e botões de visualização
        document.getElementById('contact-info' + contactId).style.display = 'none';
        document.getElementById('contact-message' + contactId).style.display = 'none';
        document.getElementById('buttons-view' + contactId).style.display = 'none';

        // Mostra o formulário de resposta e botões de resposta
        document.getElementById('reply-form' + contactId).style.display = 'block';
        document.getElementById('buttons-reply' + contactId).style.display = 'flex';
    }

    function showContactInfo(contactId) {
        // Mostra as informações do contato e botões de visualização
        document.getElementById('contact-info' + contactId).style.display = 'flex';
        document.getElementById('contact-message' + contactId).style.display = 'block';
        document.getElementById('buttons-view' + contactId).style.display = 'flex';

        // Esconde o formulário de resposta e botões de resposta
        document.getElementById('reply-form' + contactId).style.display = 'none';
        document.getElementById('buttons-reply' + contactId).style.display = 'none';
    }
</script>
