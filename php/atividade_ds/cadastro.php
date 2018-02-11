<?php
    session_start();

    if(!isset($_SESSION["login"]))
    {
        header("location: index.php");
    }

    if(isset($_POST["enviar"]))
    {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $cep = $_POST["cep"];
        $nome_mae = $_POST["nome_mae"];

        if(strlen(trim($nome)) == 0 || strlen(trim($cpf)) == 0 || strlen(trim($nome_mae)) == 0 || strlen(trim($cep)) == 0)
        {
            echo "Campo(s) não preenchido(s)";
        }elseif(!isset($_POST["id"])){
            if(!isset($_SESSION["dados"]))
            {
                $_SESSION["cont"] = 1;
                $_SESSION["dados"] = array();
            }else{
                $_SESSION["cont"]++;
            }

            $_SESSION["dados"][$_SESSION["cont"]]["nome"] = $nome;
            $_SESSION["dados"][$_SESSION["cont"]]["cpf"] = $cpf;
            $_SESSION["dados"][$_SESSION["cont"]]["cep"] = $cep;
            $_SESSION["dados"][$_SESSION["cont"]]["nome_mae"] = $nome_mae;
        }else{
            $id = $_POST["id"];

            $_SESSION["dados"][$id]["nome"] = $nome;
            $_SESSION["dados"][$id]["cpf"] = $cpf;
            $_SESSION["dados"][$id]["cep"] = $cep;
            $_SESSION["dados"][$id]["nome_mae"] = $nome_mae;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Atividade DS - Cadastro</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION["login"]))
            {
                echo "Bem vindo, ".$_SESSION["login"]."!!";
                ?>
                <a href="sair.php">Sair</a>
                <?php
            }   
        ?>
        <form method="POST" action="cadastro.php">
            <span>Nome</span>
            <input type="text" value="<?=$_SESSION["dados"][$_GET["id"]]["nome"];?>" name="nome"/>
            <span>CPF</span>
            <input type="text" value="<?=$_SESSION["dados"][$_GET["id"]]["cpf"];?>" name="cpf"/>
            <span>CEP</span>
            <input type="text" value="<?=$_SESSION["dados"][$_GET["id"]]["cep"];?>" name="cep"/>
            <span>Nome da mãe</span>
            <input type="text" value="<?=$_SESSION["dados"][$_GET["id"]]["nome_mae"];?>" name="nome_mae"/>
            <input type="hidden" value="<?=$_GET["id"];?>" name="id"/>
            <?php
                if(!isset($_GET))
                {
                    ?>
                    <input type="submit" value="Cadastrar" name="enviar"/>
                    <?php
                }else{
                    ?>
                    <input type="submit" value="Alterar" name="enviar"/>
                    <?php
                }
            ?>
        </form>
        <?php
            if(isset($_SESSION["dados"]))
            {
                ?>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>CEP</th>
                        <th>Nome da mãe</th>
                        <th>Ação</th>
                    </tr>
                <?php
                $cont = 0;
                foreach($_SESSION["dados"] as $linha)
                {
                    $cont++;
                    ?>
                    <tr>
                        <td><?=$cont;?></td>
                        <td><?=$linha["nome"];?></td>
                        <td><?=$linha["cpf"];?></td>
                        <td><?=$linha["cep"];?></td>
                        <td><?=$linha["nome_mae"];?></td>
                        <td><a href="cadastro.php?id=<?=$cont;?>">Alterar</a></td>
                    </tr>
                    <?php
                }
            }
        ?>
    </body>
</html>