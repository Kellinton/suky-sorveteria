@extends('dashboard.layoutdash.index')

@section('title', 'Funcionários')

@section('conteudo')



        <div class="card col-12 mt-4 p-4">

            <div class="p-4">
                <div class="pb-4 text-center">

                    <h5 class="modal-title" id="cadastroFuncionarioModalLabel">Editar Funcionário</h5>

                </div>

                <!-- Formulário de cadastro -->
                <form action="{{ route('funcionario.update', ['id' => $funcionario->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group w-100">
                            <label class="bg-gradient-primary text-white p-3 rounded-3 cursor-pointer w-100 text-center text-lg" for="fotoFuncionario{{ $funcionario->id }}"><i class="ri-add-fill"></i> Trocar Imagem</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fotoFuncionario{{ $funcionario->id }}"
                                    name="fotoFuncionario" onchange="exibirImagem(this, {{ $funcionario->id }})" style="display: none;">
                            </div>
                        </div>

                    </div>
                    <!-- Div para exibir a miniatura da imagem -->
                    <div class="form-group w-100 d-flex justify-content-center">
                        <img src="#" id="preview" class="img-fluid" alt="Preview da Imagem"
                            style="display: none; width: 250px; border-radius: 15px;">
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="nomeFuncionario" class="form-label d-flex">Nome</label>
                            <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" required value="{{ $funcionario->nomeFuncionario }}">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="sobrenomeFuncionario" class="form-label">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenomeFuncionario" name="sobrenomeFuncionario" required value="{{ $funcionario->sobrenomeFuncionario }}">
                        </div>
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="email" class="form-label d-flex">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required value="{{ $usuario->email }}">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="text" class="form-control" id="senha" name="senha" required value="{{ $usuario->senha }}">
                        </div>
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="foneFuncionario" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="foneFuncionario" name="foneFuncionario" value="{{ $funcionario->foneFuncionario }}">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="dataNascimentoFuncionario" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="dataNascimentoFuncionario" name="dataNascimentoFuncionario" value="{{ $funcionario->dataNascFuncionario }}">
                        </div>
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="enderecoFuncionario" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="enderecoFuncionario" name="enderecoFuncionario" value="{{ $funcionario->enderecoFuncionario }}">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="cidadeFuncionario" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidadeFuncionario" name="cidadeFuncionario" value="{{ $funcionario->cidadeFuncionario }}">
                        </div>
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="estadoFuncionario" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estadoFuncionario" name="estadoFuncionario" value="{{ $funcionario->estadoFuncionario }}">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="cepFuncionario" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cepFuncionario" name="cepFuncionario" value="{{ $funcionario->cepFuncionario }}">
                        </div>
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="cargoFuncionario" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="cargoFuncionario" name="cargoFuncionario" value="{{ $funcionario->cargoFuncionario }}">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="dataContratacaoFuncionario" class="form-label">Data de Contratação</label>
                            <input type="date" class="form-control" id="dataContratacaoFuncionario" name="dataContratacaoFuncionario" value="{{ $funcionario->dataContratacaoFuncionario }}">
                        </div>
                    </div>


                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-100">
                            <label for="salarioFuncionario" class="form-label">Salário</label>
                            <input type="text" class="form-control" id="salarioFuncionario" name="salarioFuncionario" value="{{ $funcionario->salarioFuncionario }}">
                        </div>
                    </div>

                    <div class="mb-3 d-flex w-100 gap-4">
                        <div class="mb-3 w-50">
                            <label for="tipo_funcionario" class="form-label">Tipo de Funcionário</label>
                            <select class="form-select" id="tipo_funcionario" name="tipo_funcionario">
                                <option value="administrador" {{ $funcionario->tipo_funcionario === 'administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="assistente" {{ $funcionario->tipo_funcionario === 'assistente' ? 'selected' : '' }}>Assistente</option>
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label for="statusFuncionario" class="form-label">Status do Funcionário</label>
                            <select class="form-select" id="statusFuncionario" name="statusFuncionario">
                                <option value="ativo" {{ $funcionario->statusFuncionario === 'ativo' ? 'selected' : '' }}>Disponível</option>
                                <option value="inativo" {{ $funcionario->statusFuncionario === 'inativo' ? 'selected' : '' }}>Indisponível</option>
                            </select>
                        </div>
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
        </script>

