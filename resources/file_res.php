<?php
$pasta_alvo = "../_imagens/perfil/";
$arquivo_alvo = $pasta_alvo . $_FILES['file']['name'];
$ext = $_FILES['file']['type'];

if(strcmp($ext,"image/jpeg") == 0 || strcmp($ext, "image/png") == 0 || strcmp($ext, "image/git") == 0){
  if(move_uploaded_file($_FILES['file']['tmp_name'],$arquivo_alvo))
  echo "sucesso";
else
  echo "falha";
}
else {
  echo "formato invalido";
}
?>
