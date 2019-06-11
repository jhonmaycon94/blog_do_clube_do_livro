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
?>
