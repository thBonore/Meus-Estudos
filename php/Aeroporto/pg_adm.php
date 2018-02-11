<?php
    session_start();

    if(!$_SESSION["login"])
    {
        header("location: index.php");
    }

    include("Include/connect.php");

    $erro = "";
    $ok = "";

    if(isset($_POST["add"]))
    {
        $partida = $_POST["partida"];
        $destino = $_POST["destino"];
        $milhas = $_POST["milhas"];

        if(strlen(trim($partida)) == 0){
            $erro .= "Campo partida não prenchido";
        }elseif(strlen(trim($destino)) == 0){
            $erro .= "Campo destino não prenchido";
        }elseif(strlen(trim($milhas)) == 0){
            $erro .= "Campo milhas não prenchido";
        }elseif(strlen(trim($_POST["id"])) > 0){
            $id = (int)$_POST["id"];

            $sql ="UPDATE voos SET partida='$partida', destino='$destino',milhas=$milhas WHERE id = $id";
            $res = mysqli_query($con,$sql);

            $ok .= "Vôo alterado com sucesso!!";
        }else{
            $sql = "INSERT INTO voos(partida,destino,milhas) VALUES('$partida','$destino',$milhas)";
            $res = mysqli_query($con,$sql);

            $ok .= "Vôo incluído com sucesso!!";
        }

        $partida = "";
        $destino = "";
        $milhas = "";
    }

    if(isset($_GET["voo"]))
    {
        $voo = (int)$_GET["voo"];
        $sql = "SELECT partida, destino, milhas FROM voos WHERE id = $voo";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0)
        { 
            $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
            
            $partida = $dados[0]["partida"];
            $destino = $dados[0]["destino"];
            $milhas  = $dados[0]["milhas"];   
        }       
    }
    
    if(isset($_POST["excluir"]))
    {
        $id = (int)$_POST["id"];
        
        $sql = "DELETE FROM voos WHERE id = $id";
        $res= mysqli_query($con, $sql);                

        $ok .= "Exclusão efetuada com sucesso!!";             
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Gerenciamento  de vôos</title>
    </head>
    <body>
        <div id="body">
            <div id="header">
            </div>
            <div id="corpo">
                <div id="add">
                <?php
                    if(isset($_GET["voo"]))
                    {
                        ?>
                            <span>Alterar vôo</span>
                        <?php
                    }else{
                        ?>
                            <span>Adicionar vôo</span>
                        <?php
                    }
                ?>
                    <form method="POST" action="pg_adm.php">
                        <input type="text" name="partida" value="<?php if(isset($partida)){echo $partida;} ?>" placeholder="Origem"/>
                        <input type="text" name="destino" value="<?php if(isset($destino)){echo $destino;} ?>" placeholder="Destino"/>
                        <input type="number" name="milhas" value="<?php if(isset($milhas)){echo $milhas;} ?>" placeholder="Milhas"/>
                        <input type="hidden" name="id" value="<?php if(isset($_GET["voo"])){echo $_GET["voo"];} ?>"/>
                        <?php
                            if(isset($_GET["voo"]))
                            {
                                ?>
                                    <input type="submit" name="excluir" value="Excluir"/>
                                    <input type="submit" name="add" value="Alterar"/>
                                <?php
                            }else{
                        ?>
                        <input type="submit" name="add" value="Adicionar"/>
                        <?php
                            }
                        ?>
                    </form>
                    <?php echo $ok; ?>    
                </div>
                <div id="lista">
                    <?php
                        $sql = "SELECT * FROM voos";
                        $res = mysqli_query($con,$sql);

                        if(mysqli_num_rows($res) > 0)
                        {
                            ?>
                                <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Partida</th>
                                        <th>Destino</th>
                                        <th>Milhas</th>
                                        <th>Alterar</th>
                                    </tr>
                            <?php
                                $voos = mysqli_fetch_all($res, MYSQLI_ASSOC);

                                foreach ($voos as $linha) 
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $linha["id"]?></td>
                                            <td><?php echo $linha["partida"]?></td>
                                            <td><?php echo $linha["destino"]?></td>
                                            <td><?php echo $linha["milhas"]?></td>
                                            <td><a href="pg_adm.php?voo=<?php echo $linha["id"]?>">Alterar</a></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                                </table>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>