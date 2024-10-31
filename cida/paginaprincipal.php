<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projeto A</title>
    <link rel="stylesheet" href="paginaprincipal.css">
    <script>barra-p.js</script>
    <div>
      <br>
    <h1>PROJETO A</h1>
    <a href="index.php"><button>voltar</button></a><br><br>  

        </div>
</head>
<body>
  <header>
    <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="mangas.php">Mangás</a></li>
          <li><a href="chat.php">chat</a></li>
          <li><a href="em_altas.php">Em Altas</a></li>
          <li><a href="ANO.php">Ano</a></li>
        </ul>
    </nav>
    <div>
    <form action="#" method="post">
                <input type="text" name="search" id="search" placeholder="BUSCAR" required>
                <button type="submit"><i class="fas fa search"></i></button>
    </form>
    </div>
</header>

<section>
<?php

// ... (código existente de conexão com o banco de dados)

// Array com os gêneros
$generos = array("ação", "romance", "drama", "comédia", "terror");

// ... (código existente de verificação de login)

// Após o redirecionamento para mangas.php
?>

  <table id="tab2">
          
    <div id="opcoes">
        <div id="itens">
      <select class="cor">
        <option>
          Genero
        </option>
        <option>
            drama
        </option>
        <option>
            terror
        </option>
        <option>
            ação
        </option>
        <option>
            comédia
        </option>
        <option>
        romance
          </option>
      </select>
    </div><br>
    </div>
    </td>
      
  </table>
  
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


</body>

</body>
</html>