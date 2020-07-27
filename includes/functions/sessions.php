<?php
  function user_authenticated(){
    if(!check_user()){
      header('Location:login.php');
    }
  };
  function check_user(){
    return isset($_SESSION["user_email"]);
  };
  session_start();
  user_authenticated();
?>