<?php include("header.php"); ?>

<?php
// Inclui o arquivo de conexão com o Banco de Dados
include("conexaoBD.php");

$listarNoticias = "SELECT * FROM Noticia ORDER BY data DESC"; // Seleciona todos os campos da tabela Noticias
$res = mysqli_query($conn, $listarNoticias); // Executa o comando de listagem
$totalNoticias = mysqli_num_rows($res); // Função para retornar a quantidade de registros da tabela

if ($totalNoticias > 0) {
    $nomePagina = $_SERVER['SCRIPT_NAME']; // ou $_SERVER['PHP_SELF']
    $info_arquivo = pathinfo($nomePagina);
    $pagina = $info_arquivo['filename'];

    echo "<div class='alert alert-success text-center'><h4>Há <strong>$totalNoticias</strong> Noticias!</h4></div>";
    echo "<hr>";

    // Monta a estrutura para exibir os registros encontrados
    while ($registro = mysqli_fetch_assoc($res)) {
        $fotoNoticia = $registro["foto"];
        $tituloNoticia = $registro["titulo"];
        $descricaoNoticia = $registro["conteudo"];
        $dataInicio = $registro["data"];
        
        // Cria um card para cada notícia
        echo "
        <div class='card mb-3'>
            <div class='text-center' style='background-color: #000000;'>
                <img src='$fotoNoticia' class='card-img-top img-fluid' style='max-width: 80%; height: auto;' alt='Foto de $tituloNoticia'>
            </div>
            <div class='card-body' style='background-color: #DAA520;'>
                <h4 class='card-title'>$tituloNoticia</h4>
                <h6 class='card-subtitle mb-2 text-muted'>Data: $dataInicio</h6>
                <p class='card-text'>$descricaoNoticia</p>
            </div> 
        </div>
        ";
    }
} else {
    echo "<div class='alert alert-warning text-center'>Não há notícias registradas! <i class='bi bi-emoji-frown'></i></div>";
}
?>

<?php include("footer.php"); ?>
