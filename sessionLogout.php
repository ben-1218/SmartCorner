<?php 
  session_start();

  require_once('config.php');

  if (isset($_SESSION['username']))
  {
    
    destroy_session_and_data();
    header("location:index.php");
    
  }

  
  function destroy_session_and_data()
{
   $_SESSION = array();
   //setcookie(session_name(), '', time() - 2592000, '/');
   session_destroy();
}

?>