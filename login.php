<?php
function get_user_id($username){
  global $mysqli;
  $query = "SELECT user_id FROM usuarios WHERE username = '$username'";
  return ($result = $mysqli->query($query)->fetch_assoc()) ? $result['user_id'] : false;
}

$erros = array();

if(isset($_POST['username'])){
include_once("resources/conexao.php");

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
      header("location: index.php");
    
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
<?php require_once "includes/bigheader.php"; ?>
      <div class="row align-items-center">
        <div class="col-md-4"></div>
          <div class="col-md-4">
            <img src="_imagens/livro-aberto.png" alt="livro aberto">
            <?php
                if(count($erros)>0)
                echo "<ul class='text-danger'><li>".implode("</li><li>", $erros)."</li><ul>"
              ?>
            <form action="" method="POST">
              <div class="form-group">
                <label for='username' class="sr-only">Usuário:</label>
                <input type="text" name="username" placeholder="usuário" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for='senha' class="sr-only">Senha:</label>
                <input type="password" name="senha" placeholder="senha" id="senha" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
          <div class="col-md-4"></div>  
        </div>  
        <?php require_once "includes/bigfooter.php"; ?>
