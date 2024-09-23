<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Função para upload de imagem (com tratamento de erros)
    function uploadImagem($imagem) {
        $target_dir = "imagem/";
        $target_file = $target_dir . basename($imagem["name"]);

        if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Erro ao fazer upload da imagem.";
            return null;
        }
    }

    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $editora = $_POST['editora'];
    $codigo = $_POST['codigo'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $imagem = $_FILES["imagem"];

    // Upload da imagem
    $imagem_path = null;
    if (isset($imagem) && $imagem["error"] === 0) {
        $imagem_path = uploadImagem($imagem);
        if (!$imagem_path) {
            $erros[] = "Erro ao enviar a imagem.";
        }
    }

    // Inserir os dados na tabela
    $stmt = $conexao->prepare("INSERT INTO mangas (nome, editora, codigo, ano_publicacao, imagem) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $editora, $codigo, $ano_publicacao, $imagem_path);

    if ($stmt->execute()) {
        echo "Novo mangá cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar o mangá: " . $stmt->error;
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
    
    <title>tela de produto</title>
 
    <a href="paginaprincipal.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>Projeto A</h1>
        <h2>produto</h2>

        <form action="cadastro_produto.php" method="post" enctype="multipart/form-data">
    <div class="campo">
        <label for="nome">Nome do Mangá:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do mangá" required>
    </div>

    <div class="campo">
        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora" placeholder="Digite a editora" required>
    </div>

    <div class="campo">
        <label for="codigo">Código do Mangá:</label>
        <input type="number" id="codigo" name="codigo" placeholder="Digite o código do mangá" required>
    </div>

    <div class="campo">
        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="year" id="ano_publicacao" name="ano_publicacao" required>
    </div>

    <div class="campo">
        <label for="imagem">Capa do Mangá (JPG, PNG):</label>
        <input type="file" id="imagem" name="imagem" accept="image/jpeg, image/png">
    </div>

    <button type="submit">Cadastrar</button>
</form>

    </div>
</body>
</html>
