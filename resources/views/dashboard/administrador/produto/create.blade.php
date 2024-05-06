<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="inserir-container">
                        <form class="form-container" action="{{ route('produto.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 w-100 d-flex justify-content-center">
                                        <div class="form-group w-100">
                                            <label class="bg-gradient-primary text-white p-3 rounded-3 cursor-pointer w-100 text-center text-lg" for="inputGroupFile01"><i class="ri-add-fill"></i> Adicionar Imagem</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                    name="fotoProduto" style="display:none;" required onchange="previewFile()">
                                            </div>
                                        </div>

                                        </div>

                                        <div class="form-group d-flex flex-column justify-content-center">
                                            <img src="#" id="preview" class="img-fluid " alt="Preview da Imagem"
                                                style="display: none;">
                                            <p id="filename" style="display: none;"></p>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="nomeProduto"
                                                name="nomeProduto" maxlength="20" placeholder="Título do produto"
                                                required>
                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" id="descricaoProduto" name="descricaoProduto" rows="4" maxlength="100"
                                                placeholder="Descrição do produto" required></textarea>
                                        </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="sorvetePote"
                                                        name="categoriaProduto" value="sorvetePote" required>
                                                    <label class="form-check-label categoria-btn"
                                                        for="sorvetePote">Sorvete de pote</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="picole"
                                                        name="categoriaProduto" value="picole" required>
                                                    <label class="form-check-label categoria-btn"
                                                        for="picole">Picolé</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="acai"
                                                        name="categoriaProduto" value="acai" required>
                                                    <label class="form-check-label categoria-btn"
                                                        for="acai">Açaí</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" id="valorProduto"
                                                    name="valorProduto" pattern="^[0-9]+(\.[0-9]{1,2})?$" maxlength="7"
                                                    placeholder="Preço do produto" required>
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

     function previewFile() {
        var preview = document.getElementById('preview');
        var file = document.querySelector('input[type=file]').files[0];
        var filename = document.getElementById('filename');

        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
            preview.style.borderRadius = '20px'; // Adicionando bordas arredondadas
            filename.textContent = file.name;
            filename.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            filename.textContent = '';
            preview.style.display = 'none';
            filename.style.display = 'none';
        }
    }

</script>
