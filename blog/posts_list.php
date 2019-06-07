<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>Posts</title>
  </head>
  <body>
    <?php
    include "resources/init.php";
    $posts = get_posts();
    var_dump($posts);
    ?>
    <a href="index.php">voltar</a>
  </body>
</html>
