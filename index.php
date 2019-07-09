<?php require_once "includes/bigheader.php"; ?>

     <!-- <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">World</a>
          <a class="p-2 text-muted" href="#">U.S.</a>
          <a class="p-2 text-muted" href="#">Technology</a>
          <a class="p-2 text-muted" href="#">Design</a>
          <a class="p-2 text-muted" href="#">Culture</a>
          <a class="p-2 text-muted" href="#">Business</a>
          <a class="p-2 text-muted" href="#">Politics</a>
          <a class="p-2 text-muted" href="#">Opinion</a>
          <a class="p-2 text-muted" href="#">Science</a>
          <a class="p-2 text-muted" href="#">Health</a>
          <a class="p-2 text-muted" href="#">Style</a>
          <a class="p-2 text-muted" href="#">Travel</a>
        </nav>
      </div> -->

      <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 offset-md-3 px-0">
          <h1 class="display-4 font-italic text-center">Bem-vindo(a) ao Blog do clube do livro</h1>
          <p class="lead my-3 text-center">Aqui você vai encontrar resumos, sugestões, preferências entre outras coisas do mundo literário. Prepare-se para se deliciar no mundo da leitura!</p>
        </div>
      </div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Publicações
      </h3>

       <?php
      if(isset($_SESSION['admin'])){ ?>
        <a href="add_post.php#form">Nova Publicação</a><br/>
      <?php
        }
      ?>

      <?php
      $posts = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));
        foreach($posts as $post){ ?>
          <div id="blog_post" class="blog-post">
          <h2 class="blog-post-title"><a href="index.php?id=<?php echo $post['id']; ?>#blog_post"><?php echo $post["title"]; ?></a></h2><br>
          <p class="blog-post-meta"><?php echo $post["data_formatada"]; ?> por <a href="profile.php?user_id=<?php echo $post["admin_id"]; ?>"><?php echo get_admin_from_id($post["admin_id"]);?></a></p>
          <p class="text-justify"><?php echo $post["texto"]; ?></p>
          </div>
          <?php if(isset($_SESSION['admin'])){ ?>
          <div class="row offset-md-9 border mb-4">
          <div class="col-md-12">
          <a class="mx-4" href="resources/delete_post.php?id=<?php echo htmlentities($post['id']);?>">Excluir</a>
          <a href="edit_post.php?id=<?php echo $post['id'];?>#form">Editar</a>
          </div>
          </div>
          <?php } ?>
      <?php }?>

      <?php
      if(isset($_GET['id'])){
      //  if(isset($_SESSION['user_id'])){
           ?>
            <form action="resources/comentario_res.php?post_id=<?php echo htmlentities($_GET['id']) ?>" method="POST">
              <div class="form-group">
                <label class="sr-only" for="conteudo">Escreva seu comentário aqui</label>
                <textarea id="comentario" name="comentario" class="form-control" placeholder="Escreva seu comentário aqui..." rows="5"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" id=bt_comentar name=bt_comentar class="btn btn-dark">Publicar</button>
              </div>
            </form>
        <?php //} ?>
            <div class="container">
              <div class="row border-bottom">
                <div class="col-md-8 blog-main">
                  <h2>Comentários</h2>
                </div>
              </div>
        <?php
          $comentarios = get_comentarios($_GET['id']);
          foreach($comentarios as $comentario){ ?>
          <div class="row">
            <div class="col-md-8">
            <div id="blog_comentario" class="blog-comentario">
              <p class="blog-comentario-meta text-dark"><?php echo "Em ".$comentario["data_formatada"]; ?><?php echo " ".get_admin_from_id($comentario["admin_id"]);?> comentou:</p>
              <p class="text-muted"><?php echo $comentario["conteudo"]; ?></p>
              </div>
          </div>
         </div>
          <?php
          }
          ?>
          </div>
          <?php
        }
        ?>

      <nav class="blog-pagination offset-md-7">
        <a class="btn btn-outline-primary" href="#">Mais Antigas</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Mais novas</a>
      </nav>
    </div>

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded" id="div-aside">
        <h4 class="font-italic" id="h4-aside">Sobre</h4>
          <?php if(isset($_SESSION['admin'])){
            echo '<i class="fas fa-edit offset-md-8" onclick="edit_sobre()" id="icone_editar_sobre"></i>';
          } ?>
        <p id="p_sobre" class="mb-0"><?php echo get_sobre(); ?></p>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Arquivo</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">Junho 2019</a></li>
          <li><a href="#">Maio 2019</a></li>
          <li><a href="#">Abril 2019</a></li>
          <li><a href="#">Março 2019</a></li>
        </ol>
      </div>

    </aside>

  </div>

  </div>

</main>

<?php require_once "includes/bigfooter.php"; ?>
