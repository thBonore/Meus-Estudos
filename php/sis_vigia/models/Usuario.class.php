<?php
  require_once 'lib/Connection.class.php';

  class Usuario extends Connection
  {
    protected $id;
    protected $nome;
    protected $sobrenome;
    protected $email;
    protected $senha;
    protected $adm;

    public function __construct( )
    {
      parent::__construct( );
    }

    public function get_id( ) { return $this->id; }
    public function get_nome( ) { return $this->nome; }
    public function get_sobrenome( ) { return $this->sobrenome; }
    public function get_email( ) { return $this->email; }
    public function get_senha( ) { return $this->senha; }
    public function get_adm( ) { return $this->adm; }

    public function set_id( $id )
    {
      $this->id = strlen( trim( $id ) ) ? filter_var( $id, FILTER_SANITIZE_SPECIAL_CHARS ) : false;
      return ( bool ) $this->get_id( );
    }
    public function set_nome( $nome )
    {
      $this->nome = strlen( trim( $nome ) ) ? filter_var( $nome, FILTER_SANITIZE_SPECIAL_CHARS ) : false;
      return ( bool ) $this->get_nome( );
    }
    public function set_sobrenome( $sobrenome )
    {
      $this->sobrenome = strlen( trim( $sobrenome ) ) ? filter_var( $sobrenome, FILTER_SANITIZE_SPECIAL_CHARS ) : false;
      return ( bool ) $this->get_sobrenome( );
    }
    public function set_email( $email )
    {
      $this->email = strlen( trim( $email ) ) && filter_var( $email, FILTER_VALIDATE_EMAIL ) ? filter_var( $email, FILTER_SANITIZE_SPECIAL_CHARS ) : false;
      return ( bool ) $this->get_email( );
    }
    public function set_senha( $senha, $r_senha = "" )
    {
      $this->senha = strlen( trim( $senha ) ) && ( !strlen( $r_senha ) || $senha == $r_senha ) ? md5( $senha ) : false;
      return ( bool ) $this->get_senha( );
    }

    public function Cadastrar( )
    {
      $sql = "INSERT INTO usuario (
        usuario_nome,
        usuario_sobrenome,
        usuario_email,
        usuario_senha,
        usuario_adm
      )
      VALUES (
        '".$this->get_nome( )."',
        '".$this->get_sobrenome( )."',
        '".$this->get_email( )."',
        '".$this->get_senha( )."', ";

      $sql .= mysqli_num_rows( $this->RunSQL( "SELECT usuario_id FROM usuario" ) ) ? "'0'" : "'1'";
      $sql .= ")";
      return ( bool ) $this->RunSQL( $sql );
    }
    public function Existe( )
    {
      return mysqli_fetch_all( $this->RunSQL( "SELECT usuario_id FROM usuario WHERE usuario_email = '".$this->get_email( )."' and usuario_senha = '".$this->get_senha( )."'" ), MYSQLI_ASSOC );
    }
    public function Logar( )
    {
      $dados = mysqli_fetch_all( $this->RunSQL( "SELECT usuario_id, usuario_adm FROM usuario WHERE usuario_id = ".$this->get_id( ) ), MYSQLI_ASSOC );
      session_start( );
      $_SESSION["chave"] = md5( session_id( ) );
      $_SESSION["id"] = $dados[0]["usuario_id"];
      $_SESSION["adm"] = $dados[0]["usuario_adm"];
      session_write_close( );
    }
    public function Listar( )
    {
      return mysqli_fetch_all( $this->RunSQL( "SELECT usuario_id, usuario_nome, usuario_sobrenome, usuario_email FROM usuario" ), MYSQLI_ASSOC );
    }
    public function Trocar_adm( )
    {
      $usuario_adm = mysqli_fetch_array( $this->RunSQL( "SELECT usuario_adm FROM usuario WHERE usuario_id = ".$this->get_id( ) ) );
      $this->adm = $usuario_adm["usuario_adm"] == '0' ? '1' : '0';
      $sql = "UPDATE usuario SET usuario_adm = '".$this->get_adm( )."' WHERE usuario_id = ".$this->get_id( );
      return ( bool ) $this->RunSQL( $sql );
    }
    public function Excluir( )
    {
      return ( bool ) $this->RunSQL( "DELETE FROM usuario WHERE usuario_id = ".$this->get_id( ) );
    }

    public function __destruct( )
    {
      parent::__destruct( );
    }
  }
?>
