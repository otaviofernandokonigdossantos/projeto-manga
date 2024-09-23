<?php
// Substitua 'imagens' pelo caminho da sua pasta de imagens
$diretorio_imagens = "imagens/";
$arquivos = scandir($diretorio_imagens);

foreach ($arquivos as $arquivo) {
    if (is_file($diretorio_imagens . $arquivo)) {
        echo '<div class="carousel-item">';
        echo '<img src="' . $diretorio_imagens . $arquivo . '" alt="' . $arquivo . '">';
        echo '</div>';
    }
}
?>