<?php

//verifica se o usuario chegou nesta página
//clicando no botão editar
if(!isset($_POST['bt_editar_sobre'])){
  header("Location: ../index.php");
  exit();
}
//verifica se o formulario foi enviado vazio
else{
  $conteudo = trim($_POST['conteudo_editar']);
  if(empty($conteudo)){
    header("Location: ../index.php?erro=1");
    exit();
  }
  //verifica se o texto enviado tem menos que 140 caracteres
  else if(strlen($conteudo) >= 500){
    header("Location: ../index.php?erro=2");
    exit();
  }
  //realiza o update no banco de dados
  else{
    require_once("conexao.php");

    $sql = "UPDATE blog SET sobre = ? WHERE id = 1";

    $stmt = $mysqli->stmt_init();
    if(!($stmt = $mysqli->prepare($sql))){
      header("Location: ../index.php?erro=3");
      exit();
    }
    else if(!($stmt->bind_param('s', $conteudo))){
      header("Location: ../index.php?erro=3");
      exit();
    }
    else if(!($stmt->execute())){
      header("Location: ../index.php?erro=3");
      exit();
  }
  //se nenhum erro ocorrer, redireciona para o index
  else{
    header("Location: ../index.php");
    exit();
  }
}
}

?>
