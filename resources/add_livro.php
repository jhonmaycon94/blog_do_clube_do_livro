<?php 
  if(!(isset($_POST["bt_add_livro"]))){
      header("Location: ../index.php");
      exit();
  }
  else{
      $nome_autor = trim($_POST['input_autor']);
      $titulo = trim($_POST['input_titulo']);
      $ano = trim($_POST['input_ano']);
      $genero = trim($_POST['input_genero']);
      $admin_id = $_GET['admin_id'];

      if(empty($titulo)){
          header("Location: ../profile.php?admin_id=".$admin_id."&erro=1");
          exit();
      }
      elseif(empty($nome_autor)){
          header("Location: ../profile.php?admin_id=".$admin_id."&erro=1");
          exit();
      }
       elseif(empty($ano)){
          header("Location: ../profile.php?admin_id=".$admin_id."&erro=1");
          exit();
      }
       elseif(empty($genero)){
          header("Location: ../profile.php?admin_id=".$admin_id."&erro=1");
          exit();
      }
      else{
          require_once("func/perfil.php");
          if(add_livro($admin_id, $nome_autor, $ano, $titulo, $genero))
            header("Location: ../profile.php?admin_id=".$admin_id);
          else{
              header("Location: ../profile.php?admin_id=".$admin_id."&erro=2");
          }  
      }
  }
?>