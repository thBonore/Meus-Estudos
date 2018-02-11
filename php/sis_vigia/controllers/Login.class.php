<?php
  require_once 'models/Usuario.class.php';

  class Login
  {
    public function Index( )
    {
      require_once 'views/login.phtml';
      exit;
    }
    public function Autenticar( )
    {
      if ( isset( $_REQUEST["btn_login"] ) && isset( $_REQUEST["email"] ) && isset( $_REQUEST["senha"] ) )
      {
        $usuario_obj = new Usuario;

        $check = true;
        $check = $usuario_obj->set_email( $_REQUEST["email"] ) ? $check : false;
        $check = $usuario_obj->set_senha( $_REQUEST["senha"] ) ? $check : false;

        $id = $usuario_obj->Existe( );

        if ( $check && $usuario_obj->set_id( $id[0]["usuario_id"] ) )
        {
          $usuario_obj->Logar( );
          header( "location: ?controle=lista" );
          exit;
        }
        unset( $usuario_obj );
      }
    }
  }
?>
