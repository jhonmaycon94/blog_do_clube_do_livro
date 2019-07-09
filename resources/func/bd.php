<?php
require_once $_SERVER['DOCUMENT_ROOT']."/blog_do_clube_do_livro/resources/conexao.php";

function get_user_id($username){
  global $mysqli;
  $sql = "SELECT user_id FROM usuarios WHERE username = ?";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    return;
  }
  else if(!($stmt->bind_param('s', $username))){
    return;
  }
  else if(!($stmt->execute())){
    return;
  }
  else{
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['user_id'];
  }
}

function get_admin_id($username){
  global $mysqli;
  $sql = "SELECT admin_id FROM admin WHERE username = ?";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    return;
  }
  else if(!($stmt->bind_param('s', $username))){
    return;
  }
  else if(!($stmt->execute())){
    return;
  }
  else{
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['admin_id'];
  }
}

function add_usuario($username, $senha, $primeiro_nome, $sobrenome){
  global $mysqli;

  $sql = "INSERT INTO usuarios(username, senha, nome, sobrenome) VALUES(?, ?, ?, ?);";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->bind_param("ssss", $username, $senha, $primeiro_nome, $sobrenome))) {
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->execute())) {
    echo $mysqli->error;
    return;
  }
  else{
    return true;
  }
}

function add_admin($username, $senha, $primeiro_nome, $sobrenome, $idade, $sexo){
  global $mysqli;

  $sql = "INSERT INTO admin(username, senha, nome, sobrenome, idade, sexo) VALUES(?, ?, ?, ?, ?, ?);";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->bind_param("ssssss", $username, $senha, $primeiro_nome, $sobrenome, $idade, $sexo))) {
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->execute())) {
    echo $mysqli->error;
    return;
  }
  else{
    return true;
  }
}

function get_usuario($user_id){
  global $mysqli;

  $usuario = array();

  $query = "SELECT * FROM usuarios WHERE user_id = ?";
  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $user_id))){
    return;
  }
  elseif(!($stmt->execute())){
    return;
  }
  else{
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    return $usuario;
  }
}

function get_admin($admin_id){
  global $mysqli;

  $admin = array();

  $query = "SELECT * FROM admin WHERE admin_id = ?";
  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $admin_id))){
    return;
  }
  elseif(!($stmt->execute())){
    return;
  }
  else{
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    return $admin;
  }
}
?>
