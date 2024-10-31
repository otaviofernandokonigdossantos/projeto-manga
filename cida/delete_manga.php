<?php
include_once('config.php');

if (!empty($_GET['codigo'])) {
    $codigo = mysqli_real_escape_string($conexao, $_GET['codigo']);

    // Prepare the SELECT query
    $sqlSelect = "SELECT * FROM mangas WHERE codigo=?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("s", $codigo);

    // Execute the SELECT query
    if ($stmtSelect->execute()) {
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            // Prepare the DELETE query
            $sqlDelete = "DELETE FROM mangas WHERE codigo=?";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bind_param("s", $codigo);

            // Execute the DELETE query
            if ($stmtDelete->execute()) {
                echo "manga deletado com sucesso!";
            } else {
                echo "Erro ao deletar manga: " . $stmtDelete->error;
            }
        } else {
            echo "manga não encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta SELECT: " . $stmtSelect->error;
    }

    // Close statements
    $stmtSelect->close();
    $stmtDelete->close();
}

header('Location: lista_de_mangas.php);