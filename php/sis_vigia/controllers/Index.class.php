<?php
  class Index
  {
    public function Index( )
    {
      session_start( );

      if ( isset( $_SESSION["chave"] ) )
      {
        if ( $_SESSION["chave"] == md5( session_id( ) ) )
          header( "location: ?controle=lista" );
        else
          session_destroy( );
      }
      header( "location: ?controle=login" );
      exit;
    }
  }
?>
