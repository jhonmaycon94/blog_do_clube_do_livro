<?php
date_default_timezone_set('America/Recife');
include_once $_SERVER['DOCUMENT_ROOT'].'/BookClub_Site/blog/resources/conexao.php';

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

function edit_post($post_id, $user_id,$title, $conteudo){
  global $mysqli;
  //compara o user_id passado por parâmetro com o do banco de dados
  //se for igual permite a edição
  //insere o novo título e novo conteudo no banco de dados
  //senão sai da função
  $query = "SELECT user_id FROM posts WHERE id = $post_id;";
  if($mysqli->query($query)){
    $result = $mysqli->query($query)->fetch_assoc();
    $user_id_bd = $result['user_id'];
    if($user_id != $user_id_bd){
      return false;
    }
    else{
      $query = "UPDATE posts SET title = $title and SET texto = $conteudo and SET data = LOCALTIME() WHERE id = $post_id;";
      if($mysqli->query($query)){
        return true;
      }
      else{
        return false;
      }
    }
  }
}

function delete_post($id){
  global $mysqli;
  $query = "DELETE FROM posts WHERE id = $id;";

  if($mysqli->query($query)){
    return true;
  }else {
    return false;
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
function get_posts(){
  global $mysqli;
  $query = "SELECT *,DATE_FORMAT(data, '%d/%b/%Y') as data_formatada FROM posts";
  if(!$mysqli->query($query)){
    echo $mysqli->error;
  }else{
    while($result = $mysqli->query($query)->fetch_assoc())
      $posts = $result;
      return $posts;
    /*while ($row = $result->fetch_assoc()) {
      echo "<h1>".$row['title']."</h1><br/>";
      echo "<p>".$row['texto']."<p><br/>";
      echo "<h6>postado por ".get_username_from_id($row['user_id'])." em ".$row['data_formatada']."</h6><br/><br/>";
    }*/
  }
}

?>
