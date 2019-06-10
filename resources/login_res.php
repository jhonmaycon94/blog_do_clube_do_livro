<?php
function get_user_id($username){
  global $mysqli;
  $query = "SELECT user_id FROM usuarios WHERE username = '$username'";
  return ($result = $mysqli->query($query)->fetch_assoc()) ? $result['user_id'] : false;
}

$erros = array();

if(isset($_POST['bt_submit_login'])){
require_once("conexao.php");

$username = filter_input(INPUT_POST, 'username');
$senha = filter_input(INPUT_POST, 'senha');

$query = "SELECT * FROM usuarios WHERE username = '$username' and senha = '$senha'";

if($result = $mysqli->query($query)){
  if($result->num_rows > 0)
  {
    session_start();
      get_user_id($username);
      $_SESSION['user_id'] = get_user_id($username);
      $_SESSION['username'] = $username;
      header("location: ../index.php");
    
  }
  else
  {
    $erros[] = "usuário ou senha inválidos";
  }
}
else
{
  $erros[] = "falha na conexão ao banco de dados";
}
}
?>