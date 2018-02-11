<?php

    session_start();
    include "Include/conexao.php";
    
    if(isset($_POST["cadastrar"]))
    {
        $login = $_POST["login"];
        $senha = $_POST["senha"];        
        
        if((strlen(trim($login)) == 0) || (strlen(trim($senha)) == 0))
        {
            $erro .= "Campos login/senha não preenchidos";   
        }       
        
        if(strlen(trim($erro)) == 0)
        {
            $senha = $senha;
            $sql = "INSERT INTO usuario (login, senha) VALUES ('$login', '$senha')";  
            $res = mysqli_query($con, $sql); 
            
             if(strlen(trim(mysqli_error($con))) == 0)
            {
                $sql = "SELECT id, login, senha FROM usuario WHERE login = '$login' and senha = '$senha' ";
                $res = mysqli_query($con, $sql);
                    
                if(strlen(trim(mysqli_error($con))) == 0)
                {
                    $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
                    $id                 = $dados[0]["id"];
                    $login              = $dados[0]["login"];
                    $_SESSION["id"]     = $id;
                    $_SESSION["login"]  = $login;
                    
                    header("Location: pg_inicial.php");
                }
            }
        }    
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastre-se em um banco qualquer</title>
        <link rel="stylesheet" type="text/css" href="Styles/default.css">
        <link rel="stylesheet" type="text/css" href="Styles/cadastro_usuario.css">
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
            <form method="POST" action="cadastro_usuario.php">
                <nav id="form">
                    <li><h2>Cadastro</h2></li>
                    <li>Longuin :</li>
                    <li><input type="text" name="login"/></li>
                    <li>Senha :</li>
                    <li><input type="password" name="senha"/></li>
                    <li><button type="submit" name="cadastrar">Cadastrar</button></li>
                </nav>
            </form>
        </div>  
    </body>
</html>