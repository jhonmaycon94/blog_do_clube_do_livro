<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/blog_do_clube_do_livro/resources/conexao.php';

function add_autor($admin_id, $primeiro_nome, $ultimo_nome){
  global $mysqli;

  $query = "INSERT INTO autores(admin_id, primeiro_nome, ultimo_nome) VALUES(?, ?, ?);";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif (!($stmt->bind_param("sss", $admin_id, $primeiro_nome, $ultimo_nome))) {
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    return true;
  }
}

function get_autores($admin_id){
  global $mysqli;
  $autores = array();

  $query = "SELECT * FROM autores WHERE admin_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif (!($stmt->bind_param("s", $admin_id))) {
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

function add_livro($admin_id, $nome_autor, $ano, $titulo, $genero){
  global $mysqli;

  $query = "INSERT INTO livros(admin_id, nome_autor, ano, title, genero) VALUES(?, ?, ?, ?, ?);";

  if(!($stmt = $mysqli->prepare($query))){
    echo $mysqli->error;
    return;
  }
  elseif (!($stmt->bind_param("sssss", $admin_id, $nome_autor, $ano, $titulo, $genero))) {
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

function get_livros($admin_id){
  global $mysqli;
  $livros = array();

  $query = "SELECT * FROM livros WHERE admin_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif (!($stmt->bind_param("s", $admin_id))) {
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

function delete_livro($id){
  global $mysqli;
  $query = "DELETE * FROM livros WHERE id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $id))){
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    return true;
  }
}

function add_genero($admin_id, $nome){
  global $mysqli;

  $query = "INSERT INTO generos(admin_id, nome) VALUES(?, ?);";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("ss", $admin_id, $nome))){
    return;
  }
  elseif(!($stmt->execute())){
    return;
  }
  else{
    return true;
  }
}

function get_generos($admin_id){
  global $mysqli;
  $generos = array();

  $query = "SELECT * FROM generos WHERE admin_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $admin_id))){
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

function delete_genero($id){
  global $mysqli;
  $query = "DELETE * FROM generos WHERE id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $id))){
    return;
  }
  elseif (!($stmt->execute())) {
    return;
  }
  else{
    return true;
  }
}

function add_image_bd($admin_id, $caminho_arquivo){
  global $mysqli;

  $query = "UPDATE usuarios SET foto_perfil = ? WHERE admin_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    echo $mysqli->error;
    return;
  }
  elseif(!($stmt->bind_param("ss", $caminho_arquivo, $admin_id))){
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

function get_foto_perfil($admin_id){
  global $mysqli;
  $caminho_foto_perfil = '';

  $query = "SELECT foto_perfil FROM usuarios WHERE admin_id = ?";

  if(!($stmt = $mysqli->prepare($query))){
    return;
  }
  elseif(!($stmt->bind_param("s", $admin_id))){
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
