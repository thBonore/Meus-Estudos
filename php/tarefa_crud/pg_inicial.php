<?php

    session_start();
    
    if(strlen(trim($_SESSION["id"]))==0)
    {
        header("Location: index.php");  
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Uma página inical qualquer</title>
        <link rel="stylesheet" type="text/css" href="Styles/default.css">
        <link rel="stylesheet" type="text/css" href="Styles/pg_inicial.css">
    </head>
    <body>
        <div id="corpo">
            <nav id="form">
                <li><h2>Bem vindo, <?php echo $_SESSION["login"];?></h2></li>
                <li><a href="cadastro_cliente.php">Cadastrar um cliente</a></li>
                <li><a href="pesquisa.php">Procurar por um cliente</a></li>
                <li><a href="sair.php">Sair</a></li>
            </nav>
        </div>
        <marquee id="marquee">"Achou que eu estava brincando!?"</marquee>    
    </body>
</html>