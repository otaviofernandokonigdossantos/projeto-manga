<?php
include_once('config.php');

// Checkar conexão
if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}

// Receber dados do formulário
if (isset($_POST['autor'])  && isset($_POST['editora']) && isset($_POST['codigo']) && isset($_POST['ano_de_publicacao'])) {
    $nome = $_POST['autor'];
    $editora = $_POST['editora'];
    $codigo = $_POST['codigo'];
    $ano = $_POST['ano_de_publicacao'];
  
    
} else {
    echo "Erro: Dados do formulário não enviados corretamente.";
}

// Verificar se o codigo já existe
$sql_verifica_codigo = "SELECT COUNT(*) FROM cadastro do produto WHERE numerro do codigo do manga = '$codigo'";
$resultado_verifica = $conexao->query($sql_verifica_codigo);

if ($resultado_verifica->fetch_row()[0] > 0) {
    echo "Erro: coidgo já cadastrado. Tente outro codigo.";
} else {
    // Se o codigo não existir, prosseguir com a inserção
    $sql = "INSERT INTO cadastro do produto (autor, editora,codigo, ano_de_publicacao,) VALUES ('$autor', '$editora' , '$codigo' , '$ano_de_publicacao')";

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

        <form action="produto.php" method="post"> <div class="campo">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do autor" required>
            </div>

            <div class="campo">
                <label for="editora">editora do manga:</label>
                <input type="text" id="editora" name="editora" placeholder="Digite a sua editora" required>
            </div>

            <div class="campo">
                <label for="codigo">numerro_do_codigo_do_manga:</label>
                <input type="int" id="codigo" name="codigo" placeholder="Digite o numerro do codigo" required>
            </div>

            <div class="campo">
                <label for="ano">ano_de_publicaçao:</label>
                <input type="date" id="ano" name="ano" placeholder="Digite o ano da publicaçao" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

        <p>Já possui uma conta? <a href="index.php">Acesse sua conta</a></p>
    </div>
</body>
</html>
