<?php
    /*
        Cliente :
            -Login : Israel;
            -Sennha: 123;
        
        Usuário :
            -Login : Carlos;
            -Sennha: huehue;
    */
    session_start();

    if(isset($_SESSION["login"]))
    {
        header("location: cadastro.php");
    }

    if(isset($_POST["enviar"]))
    {
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $nivel = $_POST["nivel"];

        if(strlen(trim($login)) == 0 || strlen(trim($senha)) == 0)
        {
            echo "Login ou senha não digitados";
        }else{
            switch($nivel)
            {
                case "Usuario":
                    if($login != "Carlos" || $senha != "huehue")
                    {
                        echo "Login ou senha incorretos";
                    }else{
                        $_SESSION["login"] = $login;
                        $_SESSION["nivel"] = $nivel;

                        header("location: cadastro.php");
                    }
                    break;
                case "Cliente":
                    if($login != "Israel" || $senha != "123")
                    {
                        echo "Login ou senha incorretos";
                    }else{
                        $_SESSION["login"] = $login;
                        $_SESSION["nivel"] = $nivel;

                        header("location: cadastro.php");
                    }
                    break;
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Atividade DS</title>
        <link rel="stylesheet" type="text/css" href="Styles/index.css">
    </head>
    <body>
        <div class="body">
            <nav id="form">
                <form method="POST" action="index.php">
                    <li>
                        <select name="nivel">
                            <option>Usuario</option>
                            <option>Cliente</option>
                        </select>
                    </li>
                    <li><p>Login</p></li>
                    <li><input type="text" name="login"/></li>
                    <li><p>Senha</p></li>
                    <li><input type="password" name="senha"/></li>
                    <li><button type="submit" name="enviar">Logar</button></li>
                </form>
            </nav>
        </div>
    </body>
</html>