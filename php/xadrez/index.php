<?php
  include "connect.inc.php";

  $marcados = [];
  $combinacoes = [];

  session_start();

  if (isset($_POST["btn_xadrez"]) || isset($_POST["btn_solucao"])) {
    $_SESSION["btn_xadrez"] = (isset($_POST["btn_xadrez"])) ? $_POST["btn_xadrez"] : $_SESSION["btn_xadrez"];

    $sql = "SELECT combinacao_id FROM posicoes WHERE posicao = '".$_SESSION["btn_xadrez"]."'";
    $res = mysqli_query($con, $sql);

    $combinacoes = mysqli_fetch_all($res, MYSQLI_ASSOC);

    $sql  = "SELECT posicao FROM posicoes WHERE combinacao_id = ";
    $sql .= (isset($_POST["btn_solucao"])) ? $_POST["btn_solucao"] : $combinacoes[0]["combinacao_id"];
    $res = mysqli_query($con, $sql);

    $posicoes = mysqli_fetch_all($res, MYSQLI_ASSOC);

    for ($cont = 0; $cont < count($posicoes); $cont++)
      $marcados[] = $posicoes[$cont]["posicao"];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Problema das damas</title>
    <style>
      #div-tabuleiro {
        width: 400px;
        border: 7px solid brown;
      }
      #div-botoes-tabueiro {
        width: 414px;
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
      .xadrez-azul, .xadrez-azul:hover {
        color: blue;
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
    <form method="POST" action="index.php">
      <div>
        <div id="div-tabuleiro">
          <table id="tabuleiro">
            <?php
              $alfabeto = array("H", "G", "F", "E", "D", "C", "B", "A");
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
                    if ($valor == $_SESSION["btn_xadrez"]) {
                      ?>
                        <button class="xadrez-<?=$cor?> xadrez-marcado" title="<?=$alfabeto[$valor[1]].($valor[0]+1)?>" disabled>♛</button>
                      <?php
                    } else {
                      ?>
                        <button class="xadrez-<?=$cor?> xadrez-marcado xadrez-azul" title="<?=$alfabeto[$valor[1]].($valor[0]+1)?>" disabled>♛</button>
                      <?php
                    }
                  } else {
                    ?>
                      <button type="submit" class="xadrez-<?=$cor?>" title="<?=$alfabeto[$valor[1]].($valor[0]+1)?>" name="btn_xadrez" value="<?=$valor?>">♛</button>
                    <?php
                  }
                }
                echo "<br></tr>";
              }
            ?>
          </table>
        </div>
        <?php
          if (isset($_POST["btn_xadrez"]) || isset($_SESSION["btn_xadrez"])) {
            ?>
            <div id="div-botoes-tabueiro">
              <?php
              if (count($combinacoes) > 1) {
                for ($cont = 0; $cont < count($combinacoes); $cont++) {
                  ?>
                  <button type="submit" class="btn" name="btn_solucao" value="<?=$combinacoes[$cont]["combinacao_id"]?>">Solução #<?=$cont + 1?></button>
                  <?php
                }
              }
              if (isset($_POST["btn_xadrez"]) || isset($_POST["btn_solucao"])) {
                ?>
                <button type="submit" class="btn" name="btn_limpar">Limpar</button>
                <?php
              }
              ?>
            </div>
            <?php
          }
        ?>
      </div>
    </form>
  </body>
</html>
