<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/blog_do_clube_do_livro/resources/conexao.php';

function add_autor($user_id, $primeiro_nome, $ultimo_nome){
  global $mysqli;

  $query = "INSERT INTO autores(user_id, primeiro_nome, ultimo_nome) VALUES(?, ?, ?);";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif (!($stmt->bind_param("sss", $user_id, $primeiro_nome, $ultimo_nome))) {
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    return true;
  }
}

function get_autores($user_id){
  global $mysqli;
  $autores = array();

  $query = "SELECT * FROM autores WHERE user_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif (!($stmt->bind_param("s", $user_id))) {
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
      $autores[] = $row;
    }

    return $autores;
  }
}

function add_livro($user_id, $nome_autor, $ano, $titulo, $genero){
  global $mysqli;

  $query = "INSERT INTO livros(user_id, nome_autor, ano, title, genero) VALUES(?, ?, ?, ?, ?);";

  if(!($stmt = $mysqli->prepare($query))){
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->bind_param("sssss", $user_id, $nome_autor, $ano, $titulo, $genero))) {
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->execute())) {
    echo $mysqli->error;
    return;
  }
  else{
    return true;
  }
}

function get_livros($user_id){
  global $mysqli;
  $livros = array();

  $query = "SELECT * FROM livros WHERE user_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif (!($stmt->bind_param("s", $user_id))) {
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
      $livros[] = $row;
    }

    return $livros;
  }
}

function add_genero($user_id, $nome){
  global $mysqli;

  $query = "INSERT INTO generos(user_id, nome) VALUES(?, ?);";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("ss", $user_id, $nome))){
    return;
  }
  elseif(!($stmt->execute())){
    return;
  }
  else{
    return true;
  }
}

function get_generos($user_id){
  global $mysqli;
  $generos = array();

  $query = "SELECT * FROM generos WHERE user_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $user_id))){
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $generos[] = $row;
    }
    return $generos;
  }
}

function add_image_bd($user_id, $caminho_arquivo){
  global $mysqli;

  $query = "UPDATE usuarios SET foto_perfil = ? WHERE user_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    echo $mysqli->error;
    return;
  }
  elseif(!($stmt->bind_param("ss", $caminho_arquivo, $user_id))){
    echo $mysqli->error;
    return;
  }
  elseif(!($stmt->execute())){
    echo $mysqli->error;
    return;
  }
  else{
    return true;
  }
}

function get_foto_perfil($user_id){
  global $mysqli;
  $caminho_foto_perfil = '';

  $query = "SELECT foto_perfil FROM usuarios WHERE user_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $user_id))){
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    $result = $stmt->get_result();
    $caminho_foto_perfil = $result->fetch_assoc();
    return $caminho_foto_perfil['foto_perfil'];
  }
}
?>


