<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    // Prepara a consulta SQL utilizando prepared statements
   
    //
    $sqlUpdate = "UPDATE usuarios SET nome=?, email=?, senha=?, telefone=?, endereco=?, tipo=? WHERE email=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssssssss", $nome, $email, $senha, $telefone, $endereco, $tipo, $email);



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
header('Location: lista_de_clientes.php');
?>