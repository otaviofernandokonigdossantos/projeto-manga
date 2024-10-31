<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $editora = mysqli_real_escape_string($conexao, $_POST['editora']);
    $codigo = mysqli_real_escape_string($conexao, $_POST['codigo']);
    $ano_publicacao = mysqli_real_escape_string($conexao, $_POST['ano_publicacao']);
    $genero = mysqli_real_escape_string($conexao, $_POST['genero']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);

    // Prepara a consulta SQL utilizando prepared statements
   
    //
    $sqlUpdate = "UPDATE mangas SET nome=?, editora=?, codigo=?, ano_publicacao=?, genero=? WHERE codigo=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssssssss", $nome, $editora, $codigo, $ano_publicacao, $genero, $codigo);



    // Executa a consulta
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    // Fecha o statement
    $stmt->close();
}

// Redireciona para a lista de clientes
header('Location: lista_de_mangas.php');
?>