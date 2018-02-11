<?php

    include "Include/conexao.php";
    include "Include/menu.php";
    
    session_start();
    
    if(strlen(trim($_SESSION["id"]))==0)
    {
        header("Location: index.php");  
    }

    if(isset($_POST["pesquisar"]))
    {
        $pesquisa = $_POST["pesquisa"];
        
        $sql = "SELECT * FROM cliente WHERE nome LIKE '%$pesquisa%' ";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0)
        {
            $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $pesq = true;  
        }else{
            $pesq = false;
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Pesquise uma coisa qualquer</title>
        <link rel="stylesheet" type="text/css" href="Styles/default.css">
        <link rel="stylesheet" type="text/css" href="Styles/pesquisa.css">
    </head>
    <body>
        <div id="corpo">
            <h2>Pesquisa</h2> 
            <form method="POST" action="pesquisa.php">
                <input type="text" name="pesquisa"/>
                <button type="submit" name="pesquisar">Pesquisar</button>
            </form>
        </div>
        <?php
            if(isset($_POST["pesquisar"]) && isset($pesq))
            {               
                if($pesq == true && $pesquisa != " " && $pesquisa != "")
                {
                    ?>
                        <table id="tabela" cellspacing="20">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Endereço</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Alterar</th>
                            </tr>
                    <?php
                        foreach ($dados as $linha) {
                            ?>
                            <tr>
                                <td><?php echo $linha["id"] ?></td>
                                <td><?php echo $linha["nome"] ?></td>
                                <td><?php echo $linha["cpf"] ?></td>
                                <td><?php echo $linha["endereco"] ?></td>
                                <td><?php echo $linha["cep"] ?></td>
                                <td><?php echo $linha["cidade"] ?></td>
                                <td><a id="link"href="cadastro_cliente.php?cliente=<?php echo $linha["id"] ?>">Alterar</a></td>
                            </tr>
                    <?php  
                        }
                    ?>
                        </table>
                    <?php
                }else{
                    $erro = "Nenhum registro encontrado";
                }
            }
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
    </body>
</html>