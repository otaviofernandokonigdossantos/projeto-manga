<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mangas.css">
    <title>Document</title>
</head>
<body>
  
<?php

// ... (código existente de conexão com o banco de dados)

// Array com os gêneros
$generos = array("ação", "romance", "drama", "comedia", "terror");

// ... (código existente de verificação de login)

// Após o redirecionamento para mangas.php
?>
<?php
            foreach ($generos as $genero) {
                echo "<li><a href='mangas.php?genero=$genero'>$genero</a></li>";
            }
            ?>
        </ul>
    </nav>

    <?php
    // ... (código para exibir os mangás, considerando o gênero selecionado)
    ?>
</body>
</html>
    <a href="paginaprincipal.php"><button>voltar</button></a><br><br> 
    <style>
    body{
        background: url(../otavio0409/img/demon.jpg);
        min-height: 200vh; 
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    button{
        background-color: rgb(255, 115, 0);
    }</style>
   <style>
     /* cards.css */

.card {
  /* Estilos para todos os cards */
  border: 1px solid #ccc;
  padding: 20px;
  margin: 10px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
 
  
}

.card-header {
  /* Estilos para o cabeçalho do card */
  font-weight: bold;
  margin-bottom: 10px;
}

section {
  /* Estilos para a seção de conteúdo */
  display: flex;
  flex-wrap: wrap;
}

img {
  /* Estilos para a imagem */
  max-width: 100%;
  height: 200px;
  margin-right: 10px;
}
.certo{
  display: grid;
  grid-template-columns: auto auto auto auto;
  margin-inline: center;
  flex-wrap: wrap;
}
button{
  background-color: orangered;

}
    </style>
</head>
<body>
<div class="certo">
<?php
include_once('config.php');


// Preparando a query SQL para selecionar os dados
$sql = "SELECT nome, editora, codigo, genero, ano_publicacao, imagem FROM mangas";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
      
      echo "<div class='card'>";
      echo "<div class='card-header'>  " . $row["nome"] . "</div>";
      echo "<div class='p'> <img src='" . $row["imagem"] . "' alt='Imagem'><br>" . "</div>";
      echo "<div class='p'> EDITORA: " . $row["editora"]. "</div>";
      echo "<div class='p'> CODIGO:" . $row["codigo"]. "</div>"; 
      echo "<div class='p'> GENERO:" . $row["genero"]. "</div>";
      echo "<div class='p'> ANO:" . $row["ano_publicacao"]. "</div>"; 
      echo '<a href="colab.php"><button>LER</button></a>';
      echo "</div>";  
        
    }
} else {
    echo "0 resultados";
}

$conexao->close();
?>



            </tr>   
        </table>
    </div>
</body>
