<?php
  require_once 'lib/Application.class.php';
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $application = new Application;
  $application->Run( );
?>
