<div class="modal fade" id="edit{{ $produto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Produto</h5>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="inserir-container">
                        <form class="form-container" action="{{ route('produto.update', ['id' => $produto->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 w-100 d-flex justify-content-center">
                                        <div class="form-group w-100">
                                            <label class="bg-gradient-primary text-white p-3 rounded-3 cursor-pointer w-100 text-center text-lg" for="fotoProduto{{ $produto->id }}"><i class="ri-add-fill"></i> Trocar Imagem</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fotoProduto{{ $produto->id }}"
                                                    name="fotoProduto" onchange="exibirImagem(this, {{ $produto->id }})" style="display: none;">
                                            </div>
                                        </div>

                                        </div>

                                        <div class="form-group d-flex flex-column justify-content-center">
                                            <img id="imagemAtual{{ $produto->id }}" src="{{ asset('storage/img/produtos/' . $produto->categoriaProduto . '/' . $produto->fotoProduto) }}" class="img-fluid" alt="Imagem do Produto" style="width: 100%; height: 250px; border-radius: 15px;">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" maxlength="40" placeholder="Título do produto" required value="{{ $produto->nomeProduto }}">
                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" id="descricaoProduto" name="descricaoProduto" rows="4" maxlength="100"
                                                placeholder="Descrição do produto" required>{{ $produto->descricaoProduto }}</textarea>
                                        </div>

                                            {{-- <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="sorvetePote"
                                                        name="categoriaProduto" value="sorvetePote" required {{ $produto->categoriaProduto == 'sorvetePote' ? 'checked' : '' }}>
                                                    <label class="form-check-label categoria-btn"
                                                        for="sorvetePote">Sorvete de pote</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="picole"
                                                        name="categoriaProduto" value="picole" required {{ $produto->categoriaProduto == 'picole' ? 'checked' : '' }}>
                                                    <label class="form-check-label categoria-btn"
                                                        for="picole">Picolé</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="acai"
                                                        name="categoriaProduto" value="acai" required {{ $produto->categoriaProduto == 'acai' ? 'checked' : '' }}>
                                                    <label class="form-check-label categoria-btn"
                                                        for="acai">Açaí</label>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>

                                                <input type="text" class="form-control" id="valorProduto"
                                                    name="valorProduto" pattern="^[0-9]+(\.[0-9]{1,2})?$" maxlength="7"
                                                    placeholder="Preço do produto" required value="{{ $produto->valorProduto }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3 w-100">
                                                <select class="form-select w-100" id="statusProduto" name="statusProduto">
                                                    <option value="ativo" {{ $produto->statusProduto == 'ativo' ? 'selected' : '' }}>Disponível</option>
                                                    <option value="inativo" {{ $produto->statusProduto == 'inativo' ? 'selected' : '' }}>Indisponível</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="col">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


    function exibirImagem(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Montar o ID da imagem atual usando o ID do produto
                var imagemAtualId = '#imagemAtual' + id;

                // Exibir a imagem atualizada no modal
                $(imagemAtualId)
                    .attr('src', e.target.result)
                    .removeClass('d-none'); // Remover a classe d-none para exibir a imagem
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
