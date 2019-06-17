<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/blog_do_clube_do_livro/resources/conexao.php';

//insere os dados no banco de dados
function add_post($user_id, $title, $conteudo){
  global $mysqli;
  $query = "INSERT INTO `posts`(user_id, title, texto, data) VALUES ($user_id,'$title','$conteudo',LOCALTIME());";
    if(!$mysqli->query($query)){
      echo $mysqli->error;
}
 else{
   echo "sucesso";
}
}

function edit_post($post_id, $title, $conteudo){
  global $mysqli;

  $sql = "UPDATE posts SET title = ? , texto = ? , data = NOW() WHERE id = ?";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    return;
  }
  else if(!($stmt->bind_param("sss", $title, $conteudo, $post_id))){
    return;
  }
  else if(!($stmt->execute())){
    return;
  }
  else{
    return true;
  }
}

function delete_post($id){
  global $mysqli;
  $sql = "DELETE FROM posts WHERE id = ?";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($sql))){
    return;
  }
  else if(!($stmt->bind_param('s', $id))){
    return;
  }
  else if(!($stmt->execute())){
    return;
  }
  else{
    return true;
  }
}

//dado um id retorna o usuário com este id
function get_username_from_id($id){
  global $mysqli;
  $query = "SELECT username FROM usuarios WHERE user_id = $id";
  if(!$mysqli->query($query)){
    echo $mysqli->error;
  }else{
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
      $username = $row['username'];
    }
  }
  return $username;
}

//recupera a lista de post do banco de dados
function get_posts($id = null){
  global $mysqli;
  $posts = array();
  $query = "SELECT *,DATE_FORMAT(data, '%d/%b/%Y') as data_formatada FROM posts";

  if(isset($id)){
    $query .= " WHERE id = ".$id;
  }

  $query .= " ORDER BY id DESC";
  
  if(!$mysqli->query($query)){
    return false;
  }
  else
  {
    $result = $mysqli->query($query);
    while($row = $result->fetch_assoc()){
      $posts[] = $row;
    }
  }
  return $posts;
}

function get_sobre(){
  global $mysqli;

  $sobre = array();

  $query = "SELECT sobre FROM blog";
  if(!($result = $mysqli->query($query))){
    return false;
  }
  else{
    $sobre = $result->fetch_assoc();
    return $sobre['sobre'];
  }
}

function add_comentario($conteudo, $post_id, $user_id){
  global $mysqli;

  $query = "INSERT INTO comentarios(post_id, user_id, conteudo, data) VALUES (?, ?, ?, NOW());";

  $stmt = $mysqli->stmt_init();
  if(!($stmt = $mysqli->prepare($query))){
    echo $mysqli->erro;
    return;
  }
  elseif(!($stmt->bind_param("sss", $post_id, $user_id, $conteudo))){
    echo $mysqli->erro;
    return;
  }
  elseif(!($stmt->execute())){
    echo $mysqli->erro;
    return;
  }
  else{
    return true;
  }
}

?>
