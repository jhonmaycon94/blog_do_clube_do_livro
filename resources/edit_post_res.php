<?php
//verificar se o usuario chegou até Esta
//página clicando no botão publicar.
if(!isset($_POST['bt_editar'])){
  header("Location: ../edit_post.php");
  exit();
}
//verifica se o formulario foi enviado vazio;
else{
    require_once("init.php");

  $titulo = trim($_POST['titulo']);
  $conteudo = trim($_POST['conteudo']);
  if(empty($titulo) && empty($conteudo)){
    header("Location: ../edit_post.php?erro=1");
    exit();
  }

  //verifica se o titulo foi enviado vazio;
  else if(empty($titulo)){
    header("Location: ../edit_post.php?erro=2");
    exit();
  }

  //verifica se o conteudo foi enviado vazio
  else if(empty($conteudo)){
    header("Location: ../edit_post.php?erro=3");
    exit();
  }

  //se não ocorrer erros insere os dados no banco de dados
  else{
      $post_id = $_GET['id'];
      $titulo = $_POST['titulo'];
      $conteudo = $_POST['conteudo'];

    if(!(edit_post($post_id, $titulo, $conteudo)))
        header("Location: ../edit_post.php?erro=4");
    else{    
        header("location: ../index.php");
    }
    } 
}
  ?>