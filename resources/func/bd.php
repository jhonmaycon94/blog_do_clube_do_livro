<?php
require_once "./conexao.php";

function get_user_id($username){
  global $mysqli;
  $sql = "SELECT user_id FROM usuarios WHERE username = ?";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    return;
  }
  else if(!($stmt->bind_param('s', $_POST['username']))){
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

function add_usuario($username, $senha, $primeiro_nome, $sobrenome, $idade, $sexo){
  global $mysqli;

  $sql = "INSERT INTO usuarios(username, senha, nome, sobrenome, idade, sexo) VALUES(?, ?, ?, ?, ?, ?);";

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
?>
