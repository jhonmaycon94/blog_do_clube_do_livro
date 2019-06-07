<?php
session_start();
include_once('resources/init.php');

$resultado = isset($_POST['input_titulo'], $_POST['conteudo_post']);

if($resultado){
  $erros = array();

  $titulo = trim($_POST['input_titulo']);
  $conteudo = trim($_POST['conteudo_post']);

  if(empty($titulo)){
    $erros[] = "você precisa digitar um título";
  }

  if(empty($conteudo)){
    $erros[] = "você não pode publicar um post vazio";
  }

  if(empty($erros)){
    add_post($_SESSION['user_id'],$titulo, $conteudo);
  }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>add post</title>
  </head>
  <body>
    <?php if(isset($erros) && !empty($erros)){
      echo "<ul><li>", implode('</li><li>', $erros),"</li></ul";
    }
    ?>
    <form class="add_post" action="" method="post">
      <label for="input_titulo">Título:</label>
      <input type="text" name="input_titulo" value="<?php if(isset($_POST['input_titulo'])) echo $_POST['input_titulo'];?>"/><br/>
      <textarea name="conteudo_post" rows="20" cols="30" value="<?php if(isset($_POST['conteudo_post'])) echo $_POST['conteudo_post'];?>"></textarea>
      <button type="submit">publicar</button>
      <a href="index.php">voltar</a>
    </form>
  </body>
</html>
