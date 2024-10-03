<?php include("header.php"); ?>

<?php

    //Bloco para declaração das variáveis
    $fotoProduto = $tituloNoticia= $descricaoNoticia =  "";
    $dataNoticia = date('Y-m-d'); //Utiliza a função date para pegar a data no formato AAAA/MM/DD
    $horaNoticia = date('H:i:s'); //Utiliza a função date para pegar as horas no formato HH:MM:SS
    $erroPreenchimento = false; //Variável para controle de erros durante o preenchimento do formulário

    //Verifica o método de envio do FORM
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Utiliza a função empty para verificar se o campo tituloNoticia(form) está vazio
        if(empty($_POST["tituloNoticia"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
            $erroPreenchimento = true; //Em caso de erro, a variável passa a ser verdadeira
        } else{
            $tituloNoticia = filtrar_entrada($_POST["tituloNoticia"]); //Caso não hajam erros, a variável PHP recebe o valor que foi preenchido no formulário
        }

        //Validação do campo descricaoProduto
        if(empty($_POST["descricaoNoticia"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>DESCRIÇÃO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $descricaoNoticia = filtrar_entrada($_POST["descricaoNoticia"]);
        }

           //Verifica se o campo "dtNascPrincipal" do form está vazio
           if(empty($_POST["dtNoticia"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>DATA INICIO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $dataNoticia = filtrar_entrada($_POST["dtNoticia"]);
        }

  

   


        //Início da validação da Foto do Usuário
        $diretorio    = "img/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoNoticia  = $diretorio . basename($_FILES["fotoNoticia"]["name"]); // img/ana.jpg
        $erroUpload   = false; //Variável criada para verificar se houve sucesso no upload
        $tipoDaImagem = strtolower(pathinfo($fotoNoticia, PATHINFO_EXTENSION));  //Pega tipo do arquivo

        //Verifica se o tamanho da imagem é maior do que ZERO
        if ($_FILES["fotoNoticia"]["size"] != 0){ //Usa a propriedade "size" para verificar o tamanho 

            if($_FILES["fotoNoticia"]["size"] > 5000000){ //Verifica o tamanho em BYTES (5MB, nesse caso)
                echo "<div class='alert alert-warning text-center'>A foto não pode ser <strong>maior</strong> do que 5MB!</div>";
                $erroUpload = true;
            }

            //Cria o conjunto de imagens aceitos pelo campo foto do formulário 
            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                echo "<div class='alert alert-warning text-center'>A foto precisa estar nos formatos <strong>JPG, JPEG, PNG ou WEBP</strong>!</div>";
                $erroUpload = true;
            }   

            if($erroUpload){
                echo "<div class='alert alert-warning text-center'>Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
                $erroUpload = true;
            }
            else{
                //A função seguinte é responsável por mover o arquivo par ao diretório definido (img/)
                if(!move_uploaded_file($_FILES["fotoNoticia"]["tmp_name"], $fotoNoticia)){
                    echo "<div class='alert alert-warning text-center'>Erro ao tentar<strong>MOVER O ARQUIVO para o diretório $diretorio</strong>!</div>";
                    $erroUpload = true;
                }
            }
        }
        else{
            echo "<div class='alert alert-warning text-center'>Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
            $erroUpload = true;
        }
        
        //Se NÃO houver erro de preenchimento (caso a variável de controle esteja com o valor 'false')
        if(!$erroPreenchimento && !$erroUpload){

            //Cria a Query para realizar a inserção das informações na tabela Produtos
            $inserirProduto = "INSERT INTO Noticia (foto, titulo, conteudo, data)
                            VALUES ('$fotoNoticia', '$tituloNoticia', '$descricaoNoticia','$dataNoticia')"; 

            //Inclui o arquivo para conexão com o Banco de Dados
            include("conexaoBD.php");

            //Utiliza a função mysqli_query para executar a QUERY no Banco de Dados
            if(mysqli_query($conn, $inserirProduto)){

                echo "
                    <div class='alert alert-success text-center'>Noticia cadastrado com sucesso!</div>
                    <div class='container mt-3'>
                        <div class='container mt-3 text-center'>
                            <img src='$fotoNoticia' style='width: 150px;'>
                        </div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$tituloNoticia</td>
                                </tr>
                                <tr>
                                    <th>DESCRIÇÃO</th>
                                    <td>$descricaoNoticia</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ";
            }
            else{
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar produto!</div>" . mysqli_error($conn);
                echo "<p>$inserirProduto</p>";
            }
        }

    }

    //Função para filtrar as entradas de dados do formulário para evitar SQL Injection
    function filtrar_entrada($dado){
        $dado = trim($dado); //Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove as barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais em entidades HTML

        return($dado); //Retorna o dado já filtrado
    }

?>

<?php include("footer.php");?>