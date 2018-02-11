<?php
    /*
        ADM (Adiciona, edita e exclui vôos);
        Login varchar(15);
        Senha varchar(60);

        Usuário (Só usa o sistema);
                    --

        No programa o administrador poderá cadastrar vôos,
        colocando o ponto de origem, o destino e a distância;

        O programa precisa receber do usuário:

            O ponto de origem do voo;
            O destino;

        Como esses dados, o programa tenta achar um vôo que cumpra
        o que o cliente pediu, sendo que:

            O programa disponibilizará uma lista de vôos disponíveis,
            esta lista estará ordenada por ordem crescente de distância;
            Caso não haja um vôo que não cumpra exatamente o pedido pelo cliente,
            o programa traça uma rota entre os pontos que o usuário pediu
            conectando outros vôos; 
    */

    include "Include/connect.php";

    $erro = "";

    if(isset($_POST["logar"]))
    {
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        if(strlen(trim($login)) == 0 || strlen(trim($senha)) == 0)
        {
            $erro .= "Login ou senha não digitados";
        }else{
            $senha = md5($senha);

            $sql = "SELECT login FROM admim WHERE login = '$login' and senha = '$senha'";
            $res = mysqli_query($con,$sql);

            if(mysqli_num_rows($res) > 0)
            {
                session_start();

                $_SESSION["login"] = $login;

                header("location: pg_adm.php");     
            }else{
                $erro .= "Login ou senha incorretos";
            }
        }
    }

    if(isset($_POST["enviar"]))
    {
        ?>
        <table border="2">
        <?php
        $partida      = $_POST["partida"];
        $destino      = $_POST["destino"];
        $tot_milhas   = 0;
        $rotas        = [];
        $selecao      = [];
        $cont         = 1;
        $cont2        = 0;
        $cont3        = 0;

        $sql = "SELECT milhas FROM voos WHERE partida = '$partida' and destino = '$destino'";
        $res = mysqli_query($con,$sql);

        if(mysqli_num_rows($res) > 0)
        {
            $res = mysqli_fetch_all($res,MYSQLI_ASSOC);
            $rotas[0][0]["partida"]       = $partida;
            $rotas[0][0]["destino"]       = $destino;
            $rotas[0][0]["milhas"]        = $res[0]["milhas"];
        }else{
            $sql = "SELECT FROM voos WHERE partida = '$partida'";
            $res = mysqli_query($con,$sql);

            $voos = mysqli_fetch_all($res,MYSQLI_ASSOC);

            foreach ($voos as $voo) {
                $voltar = false;
                $cont2 = 0;

                $selecao[$cont][$cont2]["partida"] = $voo["partida"];
                $selecao[$cont][$cont2]["destino"] = $voo["destino"];
                $selecao[$cont][$cont2]["milhas"] = $voo["milhas"];
                $cont2++;

                while($voltar != true)
                {
                    $sql = "SELECT FROM voos WHERE partida = '".$voo["destino"]."'";
                    $res = mysqli_query($con,$sql);

                    $selec = mysqli_fetch_all($res,MYSQLI_ASSOC);

                    if(mysqli_num_rows($res) > 0)
                    {
                        $selecao[$cont][$cont2]["partida"] = $selec["partida"];
                        $selecao[$cont][$cont2]["destino"] = $selec["destino"];
                        $selecao[$cont][$cont2]["milhas"] = $selec["milhas"];
                        $cont2++;

                        if($selecao[$cont][$cont2]["destino"] == $destino)
                        {
                            $cont3 = $cont2;
                            for($cont2 = 0; $cont2 < $cont3; $cont2++)
                            {
                                $rotas[$cont][$cont2]["partida"]      = $selecao[$cont][$cont2]["partida"];
                                $rotas[$cont][$cont2]["destino"]      = $selecao[$cont][$cont2]["destino"];
                                $rotas[$cont][$cont2]["milhas"]       = $selecao[$cont][$cont2]["milhas"];
                                //$cont é o número da rota
                                //$cont2 é o número da viagem
                                //$cont3 é o número de viagens
                            }
                            $cont3 = 0;
                            $cont2 = 0;
                            $cont++;
                            $voltar = true;
                        }
                    }else{
                        $voltar = true;
                    }
                }
            }
        }
        $cont = 0;
        foreach ($rotas as $rota){
            $cont++;
            ?>
            <tr>
                <th colspan="4">Opção <?php echo $cont; ?></th>
            </tr>
            <tr>
                <th>#</th>
                <th>Partida</th>
                <th>Destino</th>
                <th>Distância</th>
            </tr>
            <?php
                $cont2 = 1;
                foreach ($rota as $viagem) {
            ?>
            <tr>
                <td><?php echo $cont2; ?></td>
                <td><?php echo $viagem["partida"]; ?></td>
                <td><?php echo $viagem["destino"]; ?></td>
                <td><?php echo $viagem["milhas"]; ?></td>
            </tr>
            <?php
                    $tot_milhas += $viagem["milhas"];
                    $cont2++;
                }
            ?>
            <tr>
                <th colspan="3">Distância total (em milhas) :</th>
                <th><?php echo $tot_milhas; ?></th>
            </tr>
        <?php
        }
    }
?>
</table>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Sistema de gerenciamento de viagens</title>
    </head>
    <body>
        <div id="body">
            <div id="header">
                <span>Login</span>
                <form method="POST" action="index.php">
                    <input type="text" name="login" placeholder="Login"/>
                    <input type="password" name="senha" placeholder="Senha"/>
                    <input type="submit" name="logar" value="Logar"/>
                </form>
                <?php echo $erro; ?>
                <a href="cadastro.php">Cadastrar</a>
            </div>
            <div id="corpo">
                <?php
                    $sql = "SELECT partida, destino FROM voos";
                    $res = mysqli_query($con,$sql);

                    if(mysqli_num_rows($res) > 0)
                    {
                ?>
                <div id="pesquisa">
                    <table>
                        <tr>
                            <th colspan="2">
                                <center>Buscar vôo</center>
                            </th>
                        </tr>
                        <tr>
                            <th>Origem</th>
                            <th>Destino</th>
                        </tr>
                        <form method="POST" action="index.php">
                        <?php
                            $dados = mysqli_fetch_all($res,MYSQLI_ASSOC);

                            $partida = [];
                            $destino = [];

                            foreach ($dados as $dado ) {
                                $partida[] = $dado["partida"];
                                $destino[] = $dado["destino"];
                            }

                            sort($partida);
                            sort($destino);
                            $partida = array_unique($partida);
                            $destino = array_unique($destino);
                        ?>
                        <tr>
                            <td>
                                <select name="partida">
                                <?php
                                    foreach ($partida as $linha) {
                                        ?>
                                            <option><?php echo $linha; ?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </td>
                            <td>
                                <select name="destino">
                                <?php
                                    foreach ($destino as $linha) {
                                        ?>
                                            <option><?php echo $linha; ?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center><input type="submit" name="enviar" value="Pesquisar"/></center>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
</html>