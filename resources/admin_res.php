<?php
//checa se o usuário cliclou no botão de login
//para chegar até esta página
if(!isset($_POST['bt_submit_login'])){
  header("Location: ../admin.php");
  exit();
//checa se o usuário enviou um formulário vazio
}else if(empty(trim($_POST['username'])) && empty(trim($_POST['senha']))){
  header("Location: ../admin.php?erro=1");
  exit();

  //checa se o username foi enviado vazio
}else if(empty(trim($_POST['username']))){
    header("Location: ../admin.php?erro=2");
    exit();

    //checa se a senha foi enviada vazia
  }else if(empty(trim($_POST['senha']))){
    header("Location: ../admin.php?erro=3&username=".$_POST['username']);
    exit();
  }
  else if(strlen(trim($_POST['senha'])) < 4){
    header("Location: ../admin.php?erro=7&username=".$_POST['username']);
    exit();
  }
  else{
    //requere o objeto mysqli que representa
    //uma conexão ao banco de dados
    require_once("conexao.php");

    //prepared statement
    $sql = "SELECT * FROM admin WHERE username = ?";

    //checa se não ocorre nenhum erro ao fazer
    //a consulta ao banco de dados
    $stmt = $mysqli->stmt_init();
    if(!($stmt = $mysqli->prepare($sql))){
      header("Location: ../admin.php?erro=4&username=".$_POST['username']);
      exit();
    }
    else if(!($stmt->bind_param("s",$_POST['username']))){
      header("Location: ../admin.php?erro=4&username=".$_POST['username']);
      exit();
    }
    else if(!($stmt->execute())){
      header("Location: ../admin.php?erro=4&username=".$_POST['username']);
      exit();
    }
    //consulta no banco de dados se o usuario inserido existe
    //senão retorna um erro
    else{
      $result = $stmt->get_result();
      if(!($result->num_rows > 0)){
        header("Location: ../admin.php?erro=5&username=".$_POST['username']);
        $stmt->close();
        exit();
      }

      //checa se o usuário e senham inseridos são corretos
      else{
        //prepared statement
        $sql = "SELECT * FROM admin WHERE username = ?";

        //checa se não ocorre nenhum erro ao executar o prepared statement
        $stmt = $mysqli->stmt_init();
        if(!($stmt = $mysqli->prepare($sql))){
          header("Location: ../admin.php?erro=4&username=".$_POST['username']);
          exit();
        }
        else if(!($stmt->bind_param('s', $_POST['username']))){
          header("Location: ../admin.php?erro=4&username=".$_POST['username']);
          exit();
        }
        else if(!($stmt->execute())){
          header("Location: ../admin.php?erro=4&username=".$_POST['username']);
          exit();
        }
        //checa se a uma combinação com este usuario e senha
        else{
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          $hashed_password_check = password_verify($_POST['senha'], $row['senha']);
          if($hashed_password_check == false){
            header("Location: ../admin.php?erro=6&username=".$_POST['username']);
            exit();
          }
          //se não houver erros inicia a sessão e envia uma msg de sucesso
          else{
            require_once("func/bd.php");
            session_start();
            if(get_admin_id($_POST['username'])){
              $_SESSION['admin_id'] = get_admin_id($_POST['username']);
              $_SESSION['username'] = $_POST['username'];
              $_SESSION['admin'] = true;
              header("Location: ../index.php?login=sucesso");
              exit();
            }
          }
        }
      }
    }
  }
?>
