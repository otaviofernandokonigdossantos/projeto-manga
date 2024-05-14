








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

        <form action="processar_cadastro.php" method="post"> <div class="campo">
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
                <label for="numero">Número de Telefone:</label>
                <input type="tel" id="numero" name="numero" placeholder="Digite seu número de telefone" required>
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
