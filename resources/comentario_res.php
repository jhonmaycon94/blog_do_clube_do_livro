<?php
$post_id = $_GET['post_id'];

if(!(isset($_POST['bt_comentar']))){
     header("Location: ../index.php?id=".$post_id."#blog_post");
    exit();
}
else{
    $comentario = trim($_POST['comentario']);
    if(empty($comentario)){
        header("Location: ../index.php?id=".$post_id."&erro=1#blog_post");
        exit();
    }
    else{
        require_once('init.php');
        if(!(add_comentario($comentario, $_GET['post_id'], $_SESSION['user_id']))){
            header("Location: ../index.php?id=".$post_id."&erro=2#blog_post");
            exit();
        }
        else{
            header("Location: ../index.php?id=".$post_id."#blog_post");
        }
    }
}