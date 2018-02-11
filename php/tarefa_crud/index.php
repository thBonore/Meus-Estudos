<?php

    session_start();
    include "Include/conexao.php";
    
    if(isset($_POST["logar"]))
    {
        
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT id, login, senha FROM usuario WHERE login = '$login' and senha = '$senha' ";
        $res = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($res) > 0)
        {
            $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $id                 = $dados[0]["id"];
            $login              = $dados[0]["login"];
            $_SESSION["id"]     = $id;
            $_SESSION["login"]  = $login;
            
            header("Location: pg_inicial.php");
        }else{
            $erro .= "Login e/ou senha inválidos";
        }
        
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title>Bem vindo a um sistema de cadastro qualquer</title>
        <link rel="stylesheet" type="text/css" href="Styles/default.css">
        <link rel="stylesheet" type="text/css" href="Styles/index.css">
    </head>
    <body>
        <?php
            if(isset($erro))
            {
                ?>                        
                    <div id="erro">                            
                        <?php
                            echo "<p>$erro</p>";   
                        ?>                            
                    </div>                         
                <?php
            }
        ?>
        <div id="corpo">
            <form method="POST" action="index.php">
                <nav id="form">
                    <li><h2>"Longuin"</h2></li>
                    <li>Longuin :</li>
                    <li><input type="text" maxlength="15" name="login"/></li>
                    <li>Senha :</li>
                    <li><input type="password" maxlength="60" name="senha"/></li>
                    <li><button type="submit" name="logar">Longar</button></li>
                    <li><a id="link" href="cadastro_usuario.php">Não possui conta?</a></li>
                </nav>
            </form>    
        </div>
        <marquee id="marquee">"Quando você estiver testando meu sistema, eu vou estar lá!!"</marquee>
    </body>
</html>