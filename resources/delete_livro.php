<?php
include_once("init.php");
if(!(delete_livro($_GET['id']))){
    header("Location: ..profile.php?admin_id=".$_GET['admin_id']."&erro=1");
    exit();
}
else
{
header("Location: ../profile.php?admin_id=".$_GET['admin_id']);
}
?>