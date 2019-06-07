<?php
$config['db_host'] = "localhost";
$config['username'] = "root";
$config['senha'] = "";
$config['db_name'] ="bookclub";

foreach ($config as $key => $value) {
  // code...
  define(strtoupper($key), $value);
}
?>
