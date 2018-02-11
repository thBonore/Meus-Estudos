<?php
  class Application
  {
    protected $controller;
    protected $action;

    protected function LoadRoute( )
    {
      $this->controller  = isset( $_REQUEST["controle"] ) ? ucfirst( $_REQUEST["controle"] ) : "Index";
      $this->action      = isset( $_REQUEST["controle"] ) && isset( $_REQUEST["acao"] ) ? ucfirst( $_REQUEST["acao"] ) : "Index";
    }
    public function Run( )
    {
      $this->LoadRoute( );
      $controller = $this->controller;
      $action     = $this->action;

      $controller_src = "controllers/".$controller.".class.php";

      if ( file_exists( $controller_src ) )
        require_once $controller_src;
      else
        header( "location: ?controle=index" );

      $controller_obj = new $controller;

      if ( method_exists( $controller_obj, $action ) )
        $controller_obj->$action( );

      header( "location: ?controle=".$controller );
    }
  }
?>
