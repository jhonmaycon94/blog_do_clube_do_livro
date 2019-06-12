<?php
//verificar se o usuario chegou até Esta
//página clicando no botão publicar.
if(!isset($_POST['bt_publicar'])){
  header("Location: ../add_post.php");
  exit();
}
//verifica se o formulario foi enviado vazio;
else{
  $titulo = trim($_POST['titulo']);
  $conteudo = trim($_POST['conteudo']);
  if(empty($titulo) && empty($conteudo)){
    header("Location: ../add_post.php?erro=1");
    exit();
  }

  //verifica se o titulo foi enviado vazio;
  else if(empty($titulo)){
    header("Location: ../add_post.php?erro=2");
    exit();
  }

  //verifica se o conteudo foi enviado vazio
  else if(empty($conteudo)){
    header("Location: ../add_post.php?erro=3");
    exit();
  }
  //se não ocorrer erros insere os dados no banco de dados
  else{
      session_start();

      require_once("conexao.php");

      $sql = "INSERT INTO posts(user_id, title, texto, data) VALUES (?, ?, ?, NOW());";

      $stmt = $mysqli->stmt_init();
      if(!($stmt = $mysqli->prepare($sql))){
        //echo $mysqli->error;
        header("Location: ../add_post.php?erro=4");
        exit();
      }
      else if(!($stmt->bind_param('sss',$_SESSION['user_id'],$titulo,$conteudo))){
        //echo $mysqli->error;
        header("Location: ../add_post.php?erro=4");
        exit();
      }
      else if(!($stmt->execute())){
        //echo $mysqli->error;
        header("Location: ../add_post.php?erro=4");
        exit();
      }
      else{
        header("Location: ../add_post.php?status=sucesso");
        exit();
      }
  }
}

?>
