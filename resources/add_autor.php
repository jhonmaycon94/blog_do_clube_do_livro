<?php 
  if(!(isset($_POST["bt_add_autor"]))){
      header("Location: ../index.php");
      exit();
  }
  else{
      $nome_autor = trim($_POST['input_nome_autor']);
      $sobrenome_autor = trim($_POST['input_sobrenome_autor']);
      $user_id = $_GET['user_id'];

      if(empty($nome_autor)){
          header("Location: ../profile.php?user_id=".$user_id."&erro=1");
          exit();
      }
      elseif(empty($sobrenome_autor)){
          header("Location: ../profile.php?user_id=".$user_id."&erro=1");
          exit();
      }
      else{
          require_once("func/perfil.php");
          if(add_autor($user_id, $nome_autor, $sobrenome_autor))
            header("Location: ../profile.php?user_id=".$user_id."#escritores");
          else{
              header("Location: ../profile.php?user_id=".$user_id."&erro=2");
          }  
      }
  }
?>