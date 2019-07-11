<?php
  if(!isset($_POST['bt_add_genero'])){
      header("Location: ../index.php");
      exit();
  }
  else{
      $genero = trim($_POST['input_genero']);
      $admin_id = $_GET['admin_id'];

      if(empty($genero)){
          header("Location: ../profile.php?admin_id=".$admin_id."&erro=1");
          exit();
      }
      else{
          require_once("func/perfil.php");
          if(add_genero($admin_id, $genero){
              header("Location: ../profile.php?admin_id=".$admin_id);
              exit();
          }
          else{
              header("Location: ../profile.php?admin_id=".$admin_id."&erro=2");
              exit();
          }
      }
  }

?>