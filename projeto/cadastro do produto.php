<?php
include_once('config.php');

// Checkar conexão
if ($conexao->connect_error) {
    die("Erro de conexao com o banco de dados: " . $conexao->connect_error);
}

// Receber dados do formulario
if (isset($_POST['autor'])  && isset($_POST['editora']) && isset($_POST['codigo']) && isset($_POST['ano_de_publicacao'])) {
    $nome = $_POST['autor'];
    $editora = $_POST['editora'];
    $codigo = $_POST['codigo'];
    $ano = $_POST['ano_de_publicacao'];
  
    
} else {
    echo "Erro: Dados do formulario nao enviados corretamente.";
}

// Verificar se o codigo ja existe




   {
    // Se o codigo nao existir, prosseguir com a insercao
    $sql = "INSERT INTO cadastro do produto (autor, editora, codigo, ano_de_publicacao) VALUES 
    ('$autor', '$editora' , '$codigo' , '$ano_de_publicacao')";

    if ($conexao->query($sql) === TRUE) {
        echo "produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o produto: " . $conexao->error;
    }
}

$conexao->close();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produto.css">
    
    <title>tela de produto</title>
 
    <a href="paginaprincipal.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>Projeto A</h1>
        <h2>produto</h2>

        <form action="cadastro do produto.php" method="post"> <div class="campo">
                <label for="autor">Nome Completo:</label>
                <input type="text" id="autor" name="autor" placeholder="Digite o nome do autor" required>
            </div>

            <div class="campo">
                <label for="editora">editora do manga:</label>
                <input type="text" id="editora" name="editora" placeholder="Digite a sua editora" required>
            </div>

            <div class="campo">
                <label for="codigo">numero do codigo do manga:</label>
                <input type="int" id="codigo" name="codigo" placeholder="Digite o numero do codigo" required>
            </div>

            <div class="campo">
                <label for="ano_de_publicacao">ano de publicacao:</label>
                <input type="date" id="ano_de_publicacao" name="ano_de_publicacao" placeholder="Digite o ano da publicacao" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

    </div>
</body>
</html>
