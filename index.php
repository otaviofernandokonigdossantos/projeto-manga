<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela de login</title>
    
    <a href="CADASTRO.php"><button>voltar</button></a id="io"><br><br> 


    <style>
        
        body{
            background-image: url(../projeto/img/jujutsu_kaisen___toji_fushiguro_wallpaper_by_knotshoxtm_deklx77-fullview.jpg);
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
    <div id="div1">
        <h1>Login</h1>
        <input type="text" placeholder="E-mail">
        <br><br>
        <input type="password" placeholder="Senha">
        <br><br>
        <a href="esqueceu sua senha.php">
            <div class="div2"> esqueceu sua senha</div></a> <br>
        
        
        <a href="paginaprincipal.php"><button>Enviar</button></a><br><br>
    </div>
    


</body>
</html>