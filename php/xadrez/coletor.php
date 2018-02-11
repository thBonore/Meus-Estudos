<?php
  include "connect.inc.php";

  function Rodar($numeros = array()) {
    $return = [];
    for ($cont = 0; $cont < count($numeros); $cont++) {
      $return[$cont]  = $numeros[$cont][1];
      $return[$cont] .= 7 - $numeros[$cont][0];
    }
    return $return;
  }

  session_start();
  // $_SESSION["registrados"] = [];

  $marcados = [];

  if (isset($_POST["btn_xadrez"]))
    $_SESSION["marcados"][] = $_POST["btn_xadrez"];

  if (isset($_POST["btn_limpar"]))
    $_SESSION["marcados"] = [];

  if (isset($_POST["btn_enviar"])) {
    $combinacao = [];
    foreach ($_SESSION["marcados"] as $numero)
      $combinacao[] = $numero[0].(7 - $numero[1]);

    $_SESSION["registrados"][] = $_SESSION["marcados"];
    $_SESSION["registrados"][] = $combinacao;

    for ($cont = 0; $cont < 3; $cont++) {
      $_SESSION["marcados"] = Rodar($_SESSION["marcados"]);
      $combinacao = Rodar($combinacao);
      $_SESSION["registrados"][] = $_SESSION["marcados"];
      $_SESSION["registrados"][] = $combinacao;
    }
    $_SESSION["marcados"] = [];
  }

  if (isset($_SESSION["marcados"]))
    $marcados = $_SESSION["marcados"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Problema das damas</title>
    <style>
      #div-tabuleiro {
        width: 400px;
      }
      #div-botoes-tabueiro {
        width: 414px;
      }
      #div-tabuleiro {
        border: 7px solid brown;
      }
      .btn {
        margin-top: 5px;
        padding: 13px 13px;
        width: 100%;
        color: black;
        line-height: 0;
        cursor: pointer;
        font-weight: none;
        background-color: white;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        border: 2px solid black;
      }
      .xadrez-branco, .xadrez-preto {
        width: 50px;
        height: 50px;
        cursor: pointer;
        border: none;
        color: transparent;
        font-size: 40px;
        line-height: 0;
        font-weight: none;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
      }
      .xadrez-marcado {
        color: red;
        cursor: default;
      }
      .xadrez-branco:hover, .xadrez-preto:hover {
        color: red;
      }
      .xadrez-branco {
        background-color: white;
      }
      .xadrez-preto {
        background-color: black;
      }
    </style>
  </head>
  <body>
    <form method="POST" action="coletor.php">
      <div id="div-tabuleiro">
        <table id="tabuleiro">
          <?php
            for ($linha = 0; $linha < 8; $linha++) {
              echo "<tr>";
              for ($coluna = 0; $coluna < 8; $coluna++) {
                $cor = (($linha + $coluna) % 2) ? "preto" : "branco";
                $valor = $linha.$coluna;
                $espaco_marcado = false;
                foreach ($marcados as $marcado) {
                  if ($marcado == $valor) {
                    $espaco_marcado = true;
                    break;
                  }
                }
                if ($espaco_marcado) {
                  ?>
                    <button class="xadrez-<?=$cor?> xadrez-marcado" title="<?=$valor?>" disabled>♛</button>
                  <?php
                } else {
                  ?>
                    <button type="submit" class="xadrez-<?=$cor?>" name="btn_xadrez" value="<?=$valor?>">♛</button>
                  <?php
                }
              }
              echo "<br></tr>";
            }
          ?>
        </table>
      </div>
      <div id="div-botoes-tabueiro">
        <button type="submit" class="btn" name="btn_limpar">Limpar</button>
        <button type="submit" class="btn" name="btn_enviar">Enviar</button>
      </div>
    </form>
    <?php
      if (isset($_SESSION["registrados"])) {
        for ($cont = 1; $cont <= count($_SESSION["registrados"]); $cont++) {
          echo "<b>".$cont."º:</b>";
          foreach ($_SESSION["registrados"][$cont - 1] as $numero)
            echo " $numero ";
          echo "<br>";
        }
      }
    ?>
  </body>
</html>
