@extends('dashboard.layoutdash.index')

@section('title', 'Perfil')

<style>
    .borrar {
        filter: blur(3px);
        cursor: pointer;
    }

    .desborrar {
        filter: none;
        cursor: pointer;
    }
    .copy-icon {
        cursor: pointer;
        margin-left: 10px;
    }

    .copied-text {
        display: none;
        margin-left: 10px;
        background-color: #fff;
        color: rgb(38, 134, 38);
        padding: 5px;
        border: 5px solid transparent;
        border-radius: 5px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
</style>

@section('conteudo')

    <div class="col-12 col-xl-4 p-4 w-100">
        <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Informações de Perfil</h6>
            </div>
            <div class="col-md-4 text-end">
                <a href="javascript:;">
                <i class="fas fa-user-edit text-secondary text-lg" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i><span class="sr-only">Editar Perfil</span>
                </a>
            </div>
            </div>
        </div>
        <div class="card-body p-4">
            <hr class="horizontal gray-light my-2">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nome:</strong> &nbsp; {{ $funcionarioPerfil->nomeFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Sobrenome:</strong> &nbsp;  {{ $funcionarioPerfil->sobrenomeFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $funcionarioPerfil->email }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Senha:</strong> &nbsp; ******</li>
                <li class="list-group-item border-0 ps-0 text-sm">
                    <strong class="text-dark">Token:</strong> &nbsp;
                    <span id="token" class="borrar">{{ $funcionarioPerfil->token_lembrete }}</span>
                        <i id="copy-icon" class="ri-file-copy-2-line cursor-pointer"></i>
                    <span id="copied-text" class="copied-text"><i class="ri-checkbox-circle-fill"></i> Copiado </i></span>

                </li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Telefone:</strong> &nbsp; {{ $funcionarioPerfil->foneFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Endereço:</strong> &nbsp; {{ $funcionarioPerfil->enderecoFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Estado:</strong> &nbsp; {{ $funcionarioPerfil->estadoFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">CEP:</strong> &nbsp; {{ $funcionarioPerfil->cepFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Data Nascimento:</strong> &nbsp; {{ $funcionarioPerfil->dataNascFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Data de Contratação:</strong> &nbsp; {{ $funcionarioPerfil->dataContratacaoFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Cargo:</strong> &nbsp; {{ $funcionarioPerfil->cargoFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Salário:</strong> &nbsp; {{ $funcionarioPerfil->salarioFuncionario }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Função:</strong> &nbsp; {{ $funcionarioPerfil->tipo_funcionario == 'administrador' ? 'Administrador' : 'Assistente' }}</li>
            </ul>
        </div>
        </div>
    </div>



    <script>
        console.log('teste')
    // Ocultar / Aparecer Token
    document.getElementById('token').addEventListener('click', function () {

        this.classList.toggle('borrar');
        this.classList.toggle('desborrar');
    });

    // Copiar o Token
    document.getElementById('copy-icon').addEventListener('click', function () {
        const token = document.getElementById('token').innerText;
        navigator.clipboard.writeText(token).then(() => {
            const copiedText = document.getElementById('copied-text');
            copiedText.style.display = 'inline';
            setTimeout(() => {
                copiedText.style.display = 'none';
            }, 2000);
        });
    });
</script>
@endsection


