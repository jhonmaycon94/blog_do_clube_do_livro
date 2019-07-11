<?php
include_once("init.php");
if(!(delete_genero($_GET['id']))){
    header("Location: ..profile.php?admin_id=".$_GET['admin_id']."&erro=1");
    exit();
}
else
{
header("Location: ../profile.php?admin_id=".$_GET['admin_id']);
}
?>