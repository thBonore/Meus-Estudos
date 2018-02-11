<?php

    include "Include/conexao.php";
    include "Include/menu.php";
    
    session_start();
    
    if(strlen(trim($_SESSION["id"]))==0)
    {
        header("Location: index.php");  
    }
    
    if(isset($_POST["cadastrar"]))
    {
        $nome              = $_POST["nome"];
        $cpf               = $_POST["cpf"];
        $endereco          = $_POST["endereco"];
        $cep               = $_POST["cep"];
        $cidade            = $_POST["cidade"];
        $id                = (int)$_POST["id"];
        
        
        if((strlen(trim($nome)) == 0) || (strlen(trim($cpf)) == 0) || (strlen(trim($endereco)) == 0) || (strlen(trim($cep)) == 0) || (strlen(trim($cidade)) == 0))
        {
            $erro .= "Campos não preenchidos!!";   
        }        
        
        if(strlen(trim($erro)) == 0)
        {
            if($id == 0)
            {
                $sql = "INSERT INTO cliente (nome, cpf, endereco, cep, cidade) VALUES ('$nome', '$cpf', '$endereco', '$cep', '$cidade')";   
            }else{
                $sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', endereco = '$endereco', cep = '$cep', cidade = '$cidade' WHERE id = $id";
            }
            
            $res = mysqli_query($con, $sql);
        
            if(strlen(trim(mysqli_error($con))) == 0)
            {
                $ok .= "Cadastro efetuado com sucesso!!";
            }else{
                echo mysqli_error($con);
            }
        }    
    }
    
    if(isset($_GET["cliente"]))
    {       
        $cliente = (int)$_GET["cliente"];
        $sql = "SELECT nome, endereco, cpf, cep, cidade 
                FROM cliente WHERE id = $cliente";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0)
        { 
            $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
            
            $nome              = $dados[0]["nome"];
            $cpf               = $dados[0]["cpf"];
            $endereco          = $dados[0]["endereco"];
            $cep               = $dados[0]["cep"];
            $cidade            = $dados[0]["cidade"];
              
        }       
    }
    
    if(isset($_POST["excluir"]))
    {
        $id = $_POST["id"];
        
        $sql = "DELETE FROM cliente WHERE id=$id ";
        $res = mysqli_query($con,$sql);
        
        if(strlen(trim(mysqli_error($con))) == 0)
        {
            $ok .= "Exclusão efetuada com sucesso!!";             
        }else{
            $ok .= mysqli_error($con);
        }   
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastre-se em um banco qualquer</title>
        <link rel="stylesheet" type="text/css" href="Styles/default.css">
        <link rel="stylesheet" type="text/css" href="Styles/cadastro_cliente.css">
    </head>
    <body>
        <div id="corpo">
            <form method="POST" action="cadastro_cliente.php">
                <nav id="form">
                    <li><h2>Cadastro</h2></li>
                    <li>Nome :</li>
                    <li><input type="text" name="nome" maxlength="50" value="<?php echo $dados[0]["nome"]?>"/></li>
                    <li>CPF :</li>
                    <li><input type="text" name="cpf" maxlength="11" value="<?php echo $dados[0]["cpf"]?>"/></li>
                    <li>Endereco :</li>
                    <li><input type="text" name="endereco" maxlength="50" value="<?php echo $dados[0]["endereco"]?>"/></li>                
                    <li>CEP :</li>
                    <li><input type="text" name="cep" maxlength="9" value="<?php echo $dados[0]["cep"]?>"/></li>
                    <li>Cidade :</li>
                    <li><input type="text" name="cidade" maxlength="9" value="<?php echo $dados[0]["cidade"]?>"/></li>
                    <li><input type="hidden" name="id" value="<?php echo $_GET["cliente"]; ?>" /></li>
                    <li>
                        <button type="submit" name="cadastrar">
                            <?php
                                if(isset($_GET["cliente"]))
                                {
                                    echo "Atualizar";
                                }else{
                                    echo "Cadastrar";
                                }
                            ?>
                        </button>
                        <?php
                            if(isset($_GET["cliente"]))
                            {
                                ?>
                                <button type="submit" name="excluir">Excluir</button>
                                <?php
                            }
                        ?>
                    </li>
                </nav>
            </form>
        </div>
        
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
                if(isset($ok))
                {
                    ?>                        
                        <div id="ok">                            
                            <?php
                                echo "<p>$ok</p>";   
                            ?>                            
                        </div>                         
                    <?php
                }
            ?>
    </body>
</html>