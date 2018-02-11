<?php
  require_once 'models/Usuario.class.php';

  class Lista
  {
    public function Index( )
    {
      session_start( );
      $usuario_obj = new Usuario;
      $lista_usuarios = $usuario_obj->Listar( );
      require_once "views/lista.phtml";
      exit;
    }
    public function Excluir( )
    {
      if ( isset( $_REQUEST["id"] ) )
      {
        $usuario_obj = new Usuario;
        $usuario_obj->set_id( $_REQUEST["id"] );

        session_start( );

        if ( $usuario_obj->get_id( ) != $_SESSION["id"] )
          $usuario_obj->Excluir( );

        session_write_close( );
      }
    }
    public function Passaradm( )
    {
      if ( isset( $_REQUEST["id"] ) )
      {
        session_start( );

        $usuario_obj = new Usuario;
        $usuario_obj->set_id( $_REQUEST["id"] );
        $usuario_obj->Trocar_adm( );
        unset( $usuario_obj );

        $usuario_obj = new Usuario;
        $usuario_obj->set_id( $_SESSION["id"] );
        $_SESSION["adm"] = '0';
        $usuario_obj->Trocar_adm( );
        unset( $usuario_obj );

        session_write_close( );
      }
    }
    public function Sair( )
    {
      session_destroy( );
      header( "location: ?controle=login" );
      exit;
    }
  }
?>
