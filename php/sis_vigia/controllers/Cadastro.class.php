<?php
  require_once 'models/Usuario.class.php';

  class Cadastro
  {
    public function Index( )
    {
      require_once 'views/cadastro.phtml';
      exit;
    }
    public function Cadastrar( )
    {
      if ( isset( $_REQUEST["btn_cadastro"] ) && isset( $_REQUEST["nome"] ) && isset( $_REQUEST["sobrenome"] ) && isset( $_REQUEST["email"] ) && isset( $_REQUEST["senha"] ) && isset( $_REQUEST["r_senha"] ) )
      {
        $usuario_obj = new Usuario;

        $check = true;
        $check = $usuario_obj->set_nome( $_REQUEST["nome"] ) ? $check : false;
        $check = $usuario_obj->set_sobrenome( $_REQUEST["sobrenome"] ) ? $check : false;
        $check = $usuario_obj->set_email( $_REQUEST["email"] ) ? $check : false;
        $check = $usuario_obj->set_senha( $_REQUEST["senha"], $_REQUEST["r_senha"] ) ? $check : false;

        if ( $check && !$usuario_obj->Existe( ) )
        {
          $usuario_obj->Cadastrar( );
          header( "location: ?controle=login" );
          exit;
        }
        unset( $usuario_obj );
      }
    }
  }
?>
