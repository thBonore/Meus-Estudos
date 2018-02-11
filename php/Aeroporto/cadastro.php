<?php
    include "Include/connect.php";

    $erro = 0;

    if(isset($_POST["cadastrar"]))
    {
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        if(strlen(trim($login)) == 0 || strlen(trim($senha)) == 0)
        {
            $erro .= "Login ou senha não digitados";
        }else{
            $senha = md5($senha);

            $sql = "SELECT login FROM admim WHERE login = '$login'";
            $res = mysqli_query($con,$sql);

            if(mysqli_num_rows($res) > 0)
            {
                $erro .= "Login já existente";     
            }else{
                $sql = "INSERT INTO admim(login, senha) VALUES('$login','$senha')";
                $res = mysqli_query($con,$sql);
                
                session_start();
                $_SESSION["login"] = $login;
                header("location: pg_adm.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastre-se</title>
    </head>
    <body>
        <div id="body">
            <div id="header">
            </div>
            <div id="corpo">
                <span>Cadastro</span>
                <form method="POST" action="cadastro.php">
                    <input type="text" name="login" placeholder="Login"/>
                    <input type="password" name="senha" placeholder="Senha"/>
                    <input type="submit" name="cadastrar" value="Cadastrar"/>
                </form>
                <?php echo $erro;?>
            </div>
        </div>
    </body>
</html>