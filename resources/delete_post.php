<?php 

if(!(isset($_GET['id']))){
    header("Location: ../index.php");
    exit();
}else{
require_once('init.php');

delete_post($_GET['id']);
header("Location: ../index.php");
}
?>