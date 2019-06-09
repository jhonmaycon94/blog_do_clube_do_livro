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
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/login.css"/>
    <title>Login</title>
  </head>
  <body class="container">
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
