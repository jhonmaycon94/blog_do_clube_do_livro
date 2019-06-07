<?php
include_once("resources/conexao.php");

$username = filter_input(INPUT_POST, 'username');
$senha = filter_input(INPUT_POST, 'senha');

$query = "SELECT * FROM usuarios WHERE username = '$username' and senha = '$senha'";
$result = $mysqli->query($query);

if($result->num_rows > 0){
  session_start();
  $_SESSION['user_id'] = get_user_id($username);
  header("location: index.php");
}
else{
  
}

function get_user_id($username){
  global $mysqli;
  $query = "SELECT user_id FROM usuarios WHERE username = '$username'";
  return ($result = $mysqli->query($query)->fetch_assoc()) ? $result['user_id'] : false;
}

?>
