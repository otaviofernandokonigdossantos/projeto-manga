<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, endereco)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $nome, $email, $senha, $telefone, $endereco);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    
    <title>tela de login</title>
 
    <a href="home.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>Projeto A</h1>
        <h2>Cadastro</h2>

        <form action="cadastro.php" method="post"> <div class="campo">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>

            <div class="campo">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="campo">
                <label for="telefone">Número de Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="Digite seu número de telefone" required>
            </div>

            <div class="campo">
                <label for="endereco">Endereço Completo:</label>
                <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço completo" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

        <p>Já possui uma conta? <a href="index.php">Acesse sua conta</a></p>
    </div>
</body>
</html>
