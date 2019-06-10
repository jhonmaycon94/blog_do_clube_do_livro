<?php

function status_login(){
  return (isset($_SESSION['user_id'])) ? true : false;
}

function msg_status_login(){
  return (status_login()) ? "Log out" : "Log in";
}

function redireciona_status_login(){
  return(status_login())? "resources/logout.php" : "login.php";
}

function mostra_username(){
  return(status_login())? "Bem-vindo(a) ".$_SESSION['username'] : "participe";
}

function redireciona_cadastro_perfil(){
  return(status_login()) ? "perfil.php" : "cadastro.php"; 
}

?>