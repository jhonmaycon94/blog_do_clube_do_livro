<?php

include_once("bd.php");

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
  return(status_login()) ? "profile.php?user_id=".get_user_id($_SESSION['username']) : "cadastro.php";
}

function retorna_usuario(){
  if(isset($_GET['erro'])){
    if($_GET['erro'] == 3 || $_GET['erro'] == 6 || $_GET['erro'] == 7){
      return htmlentities($_GET['username']);
    }
  }else {
    return;
  }
}

?>
