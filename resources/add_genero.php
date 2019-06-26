<?php
  if(!isset($_POST['bt_add_genero'])){
      header("Location: ../index.php");
      exit();
  }
  else{
      $genero = trim($_POST['input_genero']);
      $user_id = $_GET['user_id'];

      if(empty($genero)){
          header("Location: ../profile.php?user_id=".$user_id."&erro=1");
          exit();
      }
      else{
          require_once("func/perfil.php");
          if(add_genero($user_id, $genero)){
              header("Location: ../profile.php?user_id=".$user_id);
              exit();
          }
          else{
              header("Location: ../profile.php?user_id=".$user_id."&erro=2");
              exit();
          }
      }
  }

?>