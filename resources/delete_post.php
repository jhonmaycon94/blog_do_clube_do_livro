<?php 

if(!(isset($_GET['id']))){
    header("Location: ../index.php");
    exit();
}else{
require_once('init.php');

if(!(delete_post($_GET['id']))){
    header("Location: ../index.php?erro=1");
    exit();
}else{
header("Location: ../index.php");
}
//echo delete_post($_GET['id']);
}
?>