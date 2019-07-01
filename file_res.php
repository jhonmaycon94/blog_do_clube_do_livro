<?php
require_once("resources/init.php");

$pasta_alvo = "_imagens/perfil/";
$arquivo_alvo = $pasta_alvo . $_FILES['file']['name'];
$ext = $_FILES['file']['type'];
$erro = $_FILES['file']['error'];
var_dump($ext);
var_dump($_FILES);

switch($erro){
  case 0:
    if(strcmp($ext,"image/jpeg") == 0 || strcmp($ext, "image/png") == 0 || strcmp($ext, "image/git") == 0 || strcmp($ext, "image/jpg") == 0){
      if(move_uploaded_file($_FILES['file']['tmp_name'],$arquivo_alvo)){
        echo "sucesso";
        if(!(add_image_bd($_SESSION['user_id'], $arquivo_alvo))){
          echo "erro";
        }
        }
        else{
        echo "falha";
        }
    }
    else {
      echo "formato invalido";
    }
    break;
  
  case 1:
    echo "o tamanho da foto é muito grande";
    break;
  
  case 2:
    echo "o tamanho da foto é muito grande";
    break;
    
  case 3:
    echo "falha no upload do arquivo"
    break;

  case 4:
    header("Location: ")  
  }

?>
