@extends('dashboard.layoutdash.index')

@section('title', 'Funcionários')

@section('conteudo')

<div class="card col-12 mt-4 p-4">
    <div class="p-4">
        <div class="pb-4 text-center">
            <h5 class="modal-title" id="cadastroFuncionarioModalLabel">Cadastro de Funcionário</h5>
        </div>

        <!-- Formulário de cadastro -->
        <form action="{{ route('funcionario.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <!-- Div para exibir a miniatura da imagem -->
                <div class="form-group w-100 d-flex justify-content-center">
                    <img src="#" id="preview" class="img-fluid" alt="Preview da Imagem"
                         style="display: none; width: 100px; border-radius: 15px;">
                </div>
                <div class="form-group w-100 d-flex justify-content-center w-100">
                    <label class="bg-gradient-primary text-white p-3 rounded-3 cursor-pointer w-50 w-sm-20 w-lg-20 text-center text-sm" for="inputGroupFile01"><i class="ri-add-fill"></i> Adicionar Imagem</label>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                           name="fotoFuncionario" style="opacity: 0;" required onchange="previewFile()">
                </div>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="nomeFuncionario" class="form-label d-flex">Nome</label>
                    <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" required>
                </div>
                <div class="mb-3 w-50">
                    <label for="sobrenomeFuncionario" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenomeFuncionario" name="sobrenomeFuncionario" required>
                </div>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="email" class="form-label d-flex">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3 w-50">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="text" class="form-control" id="senha" name="senha" required>
                </div>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="foneFuncionario" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="foneFuncionario" name="foneFuncionario">
                </div>
                <div class="mb-3 w-50">
                    <label for="dataNascimentoFuncionario" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dataNascimentoFuncionario" name="dataNascimentoFuncionario">
                </div>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-100">
                    <label for="cepFuncionario" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cepFuncionario" name="cepFuncionario" onblur="buscarCep()">
                </div>
            </div>

            <div id="cep-error" class="alert bg-primary text-white d-none" role="alert">
                <span id="cep-error-msg"></span>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="enderecoFuncionario" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="enderecoFuncionario" name="enderecoFuncionario">
                </div>
                <div class="mb-3 w-50">
                    <label for="cidadeFuncionario" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidadeFuncionario" name="cidadeFuncionario">
                </div>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="estadoFuncionario" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="estadoFuncionario" name="estadoFuncionario">
                </div>
                <div class="mb-3 w-50">
                    <label for="dataContratacaoFuncionario" class="form-label">Data de Contratação</label>
                    <input type="date" class="form-control" id="dataContratacaoFuncionario" name="dataContratacaoFuncionario">
                </div>
            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="cargoFuncionario" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="cargoFuncionario" name="cargoFuncionario">
                </div>
                <div class="mb-3 w-50">
                    <label for="salarioFuncionario" class="form-label">Salário</label>
                    <input type="text" class="form-control" id="salarioFuncionario" name="salarioFuncionario">
                </div>

            </div>

            <div class="mb-3 d-flex w-100 gap-4">
                <div class="mb-3 w-50">
                    <label for="tipo_funcionario" class="form-label">Tipo de Funcionário</label>
                    <select class="form-select" id="tipo_funcionario" name="tipo_funcionario">
                        <option value="administrador">Administrador</option>
                        <option value="assistente">Assistente</option>
                    </select>
                </div>
                <div class="mb-3 w-50">
                    <label for="statusFuncionario" class="form-label">Status do Funcionário</label>
                    <select class="form-select" id="statusFuncionario" name="statusFuncionario">
                        <option value="ativo">Disponível</option>
                        <option value="inativo">Indisponível</option>
                    </select>
                </div>
            </div>

            <div class="w-100">
                <a href="{{ route('funcionario.index') }}" class="btn btn-secondary float-start w-30">Cancelar</a>
                <button class="btn btn-primary float-end w-30" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

@include('sweetalert::alert')

@endsection

<script>
    // Função para exibir a miniatura da imagem selecionada
    function previewFile() {
        var preview = document.getElementById('preview');
        var file = document.querySelector('input[type=file]').files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    // Função para buscar o CEP e preencher os campos de endereço
    function buscarCep(){
        var cep = document.getElementById('cepFuncionario').value.replace(/\D/g, ''); // Remove any non-digit characters

        if (cep != "") {
            var validacep = /^[0-9]{8}$/; // Regex to validate the cep

            if(validacep.test(cep)) {
                fetch('https://viacep.com.br/ws/'+ cep + '/json/')
                    .then(response => response.json())
                    .then(data => {
                        if (!("erro" in data)) {
                            document.getElementById('enderecoFuncionario').value = data.logradouro;
                            document.getElementById('cidadeFuncionario').value = data.localidade;
                            document.getElementById('estadoFuncionario').value = data.uf;
                            hideError();
                        } else {
                            showError("CEP não encontrado.");
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar o CEP:', error);
                        showError("Erro ao buscar o CEP.");
                    });
            } else {
                showError("Formato de CEP inválido.");
            }
        } else {
            showError("Por favor, insira um CEP.");
        }
    }

    // Função para mostrar a mensagem de erro
    function showError(message) {
        var errorDiv = document.getElementById('cep-error');
        var errorMsg = document.getElementById('cep-error-msg');
        errorMsg.textContent = message;
        errorDiv.classList.remove('d-none');
    }

    // Função para esconder a mensagem de erro
    function hideError() {
        var errorDiv = document.getElementById('cep-error');
        errorDiv.classList.add('d-none');
    }

    // Função para fechar a mensagem de erro
    function closeError() {
        hideError();
    }
</script>
