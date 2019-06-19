<?php
if(!(isset($_POST['bt_enviar']))){
  header("Location: ../index.php");
  exit();
}
else{
  $primeiro_nome = trim($_POST['primeiroNome']);
  $sobrenome = trim($_POST['sobrenome']);
  $username = trim($_POST['username']);
  $senha = trim($_POST['senha']);
  $confirma_senha = trim($_POST['confirma_senha']);
  $idade = trim($_POST['idade']);
  $sexo = $_POST['rb_sexo'];

if(empty($primeiro_nome) && empty($sobrenome) && empty($username) && empty($senha) && empty($confirma_senha) && empty($idade) && empty($sexo)){
  header("Location: ../cadastro.php?erro=1");
  exit();
}
elseif (empty($primeiro_nome)) {
  header("Location: ../cadastro.php?erro=2");
  exit();
}
elseif (empty($sobrenome)) {
  header("Location: ../cadastro.php?erro=3");
  exit();
}
elseif (empty($username)) {
  header("Location: ../cadastro.php?erro=4");
  exit();
}
elseif (empty($senha)) {
  header("Location: ../cadastro.php?erro=5");
  exit();
}
elseif (empty($confirma_senha)) {
  header("Location: ../cadastro.php?erro=6");
  exit();
}
elseif (empty($idade)) {
  header("Location: ../cadastro.php?erro=7");
  exit();
}
elseif (strcmp($senha, $confirma_senha) != 0) {
  header("Location: ../cadastro.php?erro=8");
  exit();
}
else{
  require_once('func\bd.php');

  if(!(add_usuario($username, $senha, $primeiro_nome, $sobrenome, $idade, $sexo))){
    header("Location: ../cadastro.php?erro=9");
    exit();
  }
  else{
    header("Location: ../index.php");
  }
}
}
?>
