<?php require_once "includes/bigheader.php"; ?>
      <div class="row align-items-center">
        <div class="col-md-4"></div>
          <div class="col-md-4">
            <img src="_imagens/livro-aberto.png" alt="livro aberto">
            <form action="resources/login_res.php" method="POST">
              <div class="form-group">
                <label for='username' class="sr-only">Usuário:</label>
                <input type="text" name="username" placeholder="usuário" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for='senha' class="sr-only">Senha:</label>
                <input type="password" name="senha" placeholder="senha" id="senha" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary" name="bt_submit_login">Login</button>
            </form>
          </div>
          <div class="col-md-4"></div>  
        </div>  
        <?php require_once "includes/bigfooter.php"; ?>
