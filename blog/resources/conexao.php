<?php
include_once('config.php');

$mysqli = new mysqli(DB_HOST, USERNAME, SENHA, DB_NAME);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
