<?php
  abstract class connection
  {
    protected $connection;

    protected function __construct( )
    {
      $this->connection = $this->connect( );
    }

    private function connect( )
    {
      $link = mysqli_connect( '127.0.0.1', 'root', 'paçoquete_disquete_love', 'sis_vigia' );
      mysqli_set_charset( $link, 'utf8' );

      return $link;
    }
    protected function RunSQL( $sql )
    {
      $res = $this->connection->query( $sql );

      if ( mysqli_error( $this->connection ) )
        $res = false;

      return $res;
    }

    protected function __destruct( )
    {
      mysqli_close( $this->connection );
    }
  }
?>
