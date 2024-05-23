<style>
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
        width: 80px;
        height: 80px;
    }
    .m-info div{
        display: flex;
        flex-direction: column;
        margin-left: 20px;
    }
    .m-info div span{
        font-size: 1.2rem;
        color: #344767;
        font-weight: 600;
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
                    <div class="m-container">
                        <div class="m-info">
                            <img src="{{ asset('dashboard/img/usuario/perfil_usuario.png') }}" alt="">
                            <div>
                                <span>{{ $contato->nomeContato }}</span>
                                <p class="text-sm">Assunto: {{ $contato->assuntoContato }}</p>
                                <p class="text-sm">{{ $contato->emailContato }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-bold" style="color: #344767;">Mensagem: </span>
                            <p>{{ $contato->mensagemContato }}</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer m-data">
                    <p>{{ \Carbon\Carbon::parse($contato->created_at)->isoFormat('DD [de] MMMM') }}</p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
