<?php
//checa se o usuário cliclou no botão de login
//para chegar até esta página
if(!isset($_POST['bt_submit_login'])){
  header("Location: ../login.php");

//checa se o usuário enviou um formulário vazio
}else if(empty(trim($_POST['username'])) && empty(trim($_POST['senha']))){
  header("Location: ../login.php?erro=1");
  exit();

  //checa se o username foi enviado vazio
}else if(empty(trim($_POST['username']))){
    header("Location: ../login.php?erro=2");
    exit();

    //checa se a senha foi enviada vazia
  }else if(empty(trim($_POST['senha']))){
    header("Location: ../login.php?erro=3&username=".$_POST['username']);
    exit();
  }
  else{
    //requere o objeto mysqli que representa
    //uma conexão ao banco de dados
    require_once("conexao.php");

    //prepared statement
    $sql = "SELECT * FROM usuarios WHERE username = ?";

    //checa se não ocorre nenhum erro ao fazer
    //a consulta ao banco de dados
    $stmt = $mysqli->stmt_init();
    if(!($stmt = $mysqli->prepare($sql))){
      header("Location: ../login.php?erro=4&username=".$_POST['username']);
      exit();
    }
    else if(!($stmt->bind_param("s",$_POST['username']))){
      header("Location: ../login.php?erro=4&username=".$_POST['username']);
      exit();
    }
    else if(!($stmt->execute())){
      header("Location: ../login.php?erro=4&username=".$_POST['username']);
      exit();
    }
    //consulta no banco de dados se o usuario inserido existe
    //senão retorna um erro
    else{
      $result = $stmt->get_result();
      if(!($result->num_rows > 0)){
        header("Location: ../login.php?erro=5&username=".$_POST['username']);
        $stmt->close();
        exit();
      }

      //checa se o usuário e senham inseridos são corretos
      else{
        //prepared statement
        $sql = "SELECT * FROM usuarios WHERE username = ? AND senha = ?";

        //checa se não ocorre nenhum erro ao executar o prepared statement
        $stmt = $mysqli->stmt_init();
        if(!($stmt = $mysqli->prepare($sql))){
          header("Location: ../login.php?erro=4&username=".$_POST['username']);
          exit();
        }
        else if(!($stmt->bind_param('ss', $_POST['username'], $_POST['senha']))){
          header("Location: ../login.php?erro=4&username=".$_POST['username']);
          exit();
        }
        else if(!($stmt->execute())){
          header("Location: ../login.php?erro=4&username=".$_POST['username']);
          exit();
        }
        //checa se a uma combinação com este usuario e senha
        else{
          $result = $stmt->get_result();
          if(!($result->num_rows > 0)){
            header("Location: ../login.php?erro=6&username=".$_POST['username']);
            exit();
          }
          //se não houver erros inicia a sessão e envia uma msg de sucesso
          else{
            require_once("func/bd.php");
            session_start();
            if(get_user_id($_POST['username'])){
              $_SESSION['user_id'] = get_user_id($_POST['username']);
              $_SESSION['username'] = $_POST['username'];
              header("Location: ../login.php?login=sucesso");
              exit();
            }
          }
        }
      }
    }
  }
?>
