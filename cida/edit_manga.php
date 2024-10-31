<?php
include_once('config.php');

// Verifica se o parâmetro 'codigo' foi enviado via GET
if (isset($_GET['codigo'])) {
    // Sanitiza o codigo para evitar injeção de SQL
    $email = mysqli_real_escape_string($conexao, $_GET['codigo']);

    // Prepara a consulta SQL utilizando prepared statements
    $sql = "SELECT * FROM mangas WHERE codigo=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $codigo);

    // Executa a consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtém os dados do usuário
            $user_data = $result->fetch_assoc();

            // Atribui os valores aos campos do formulário
            $nome = $user_data['nome'];
            $codigo = $user_data['codigo'];
            // ... outros campos ...
        } else {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
        exit;
    }

    // Fecha o statement
    $stmt->close();
} else {
    header('Location: lista_de_mangas.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro do produto</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: url(imagem.jpg);
            background-size: 600px;
             background-repeat: no-repeat;
             background-position-x: center;
        }
        h1{
            text-align: center;
        }
        header{
            background-color: orange;
             padding: 10px 0;
            text-align: center;
            }
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: orange;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: orange;
        }
        header{
    background-color: palevioletred;
    padding: 10px 0;
    text-align: center;
    }

    nav ul{
    list-style: none;

    }

        nav ul li{
    display: inline;
    margin-right: 20px;
    }
    nav ul li a{
    text-decoration: none;
    color: #151414;
    font-weight: bold;
    }

    </style>
</head>
<body>
    <header>
        <h1>projeto A</h1>
        <nav>
            <ul>
                <li><a href="adm.php">HOME</a></li>
                <li><a href="lista_de_clientes.php">lista de clientes</a></li>
                
              </ul>
        </nav>
       
    </header>
    <h1>Cadastro de mangas</h1>
    <body>
    <a href="lista_de_mangas.php">Voltar</a>
    <div class="box">
        <form action="seive-Edit_manga.php" method="POST">
            <fieldset>
                <legend><b>Editar mangas</b></legend>
                <br>
                

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
        <label for="genero">genero:</label>
        <select>
        <option value="drama">drama</option>
            <option value="açao">ação</option>
            <option value="comedia">comédia</option>
            <option value="terror">terror</option>
            <option value="romance">romance</option>
    </select>


        <br><br>
				<input type="hidden" name="codigo" value=<?php echo $codigo;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>

</html>