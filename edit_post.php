<?php require_once "includes/bigheader.php";?>

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
        Nova Postagem
      </h3>

      <?php $post = get_posts($_GET['id']); ?>  
      <form id="form" action="resources/edit_post_res.php?id=<?php echo htmlentities($_GET['id']); ?>" method="POST">
        <div class="form-group">
          <label for=titulo>Título:</label>
          <input type="text" id=titulo name=titulo class="form-control" value="<?php echo $post[0]['title']; ?>">
        </div>
        <div class="form-group">
        <label for="conteudo">Altere abaixo sua publicação:</label>
        <textarea id="conteudo" name="conteudo" class="form-control" rows="20"><?php echo $post[0]['texto']; ?></textarea>
        </div>
        <button type="submit" id=bt_editar name=bt_editar class="btn btn-dark">Editar</button>
      </form>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded" id="div-aside">
        <h4 class="font-italic" id="h4-aside">Sobre</h4>
          <?php if(isset($_SESSION['user_id'])){
            echo '<i class="fas fa-edit" onclick="edit_sobre()" id="icone_editar_sobre"></i>';
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

<!--      <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div> -->
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<?php require_once "includes/bigfooter.php"; ?>
