<?php include("header.php") ?>

    <div class="container-fluid text-center">

        <h2>Cadastro de Noticia:</h2>

        <div class="d-flex justify-content-center mb-3">

            <div class="row">

                <div class="col-sm-12">

                    <form action="actionNoticia.php" class="was-validated" method="POST" enctype="multipart/form-data">

                        <div class="form-floating mb-3 mt-3">
                            <input type="file" class="form-control" id="fotoNoticia" name="fotoNoticia" required>
                            <label for="fotoNoticia" class="form-label">Foto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="tituloNoticia" placeholder="Informe o titulo da Noticia" name="tituloNoticia" required>
                            <label for="tituloNoticia" class="form-label">Título:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <textarea class="form-control" id="descricaoNoticia" placeholder="Informe uma descrição do Noticia" name="descricaoNoticia" required></textarea>
                            <label for="descricaoNoticia" class="form-label">Descrição da Notícia:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <textarea class="form-control" id="nomeAutor" placeholder="Informe o nome do autor da Notícia" name="nomeAutor" required></textarea>
                            <label for="nomeAutor" class="form-label">Nome do autor da Notícia:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="date" class="form-control" placeholder="Informe a data inicio" name="dtNoticia">
                            <label for="dtNoticia" class="form-label">Data da Publicação:</label>
                        </div>


                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="condicaoNoticia" name="condicaoNoticia" value="novo" checked>
                            <label class="form-check-label" for="condicaoNoticia">Noticia novo</label>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
       
    </div>

<?php include("footer.php") ?>