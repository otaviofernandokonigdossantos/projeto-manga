
<?php
include_once('config.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Validação básica (adicione mais validações conforme necessário)
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Prepare a consulta SQL para evitar injeção
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
        $stmt->bind_param("ss", $email, $senha); // Assumindo que email e senha são strings

        // Executa a consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verifica o tipo de usuário
                if ($row['tipo'] == 1) {
                    // Login válido para administrador, redireciona para adm.php
                    header("Location: adm.php");
                } else {
                    // Login válido para outro tipo de usuário, redireciona para home
                    header("Location: mangas.php");
                }
            } else {
                echo "Email ou senha inválidos.";
            }
        } else {
            // Trata erros na execução da consulta
            echo "Erro ao realizar a consulta: " . $stmt->error;
        }

        $stmt->close();
        $conexao->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela de login</title>
 
    <style>
        
        body{
            background-image: url(backgrondimage.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
       .max-width {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;

       }

       .io{
        padding: 15px;
        border: voltar;
        font-size: 15px;
        width: 100px;
       }
     
      
        #div1{
            background-color: rgba(0,0,0,0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;

        }
        input{
            padding: 15px;
            border: E-mail;
            border: Senha;
            font-size: 15px;
        }
        button{
            background-color: rgb(255, 94, 30);
            border: E-mail;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
        }
        #rodapé{
            bottom:0%;
            position: fixed;
        }
    </style>
</head>
<body>
<a href="cadastro.php"><button>voltar</button></a><br><br> 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div id="div1">
        <h1>Login</h1>
        <input type="text" name="email" placeholder="E-mail">
        <br><br>
        <input type="password" name="senha" placeholder="Senha">
        <br><br>
        <a href="esqueceu_sua_senha.php" title="Recuperar senha">Esqueceu sua senha?</a>
        <br><br>
        <button type="submit">Entrar</button>
    </div>
</form>
    


</body>
</html>