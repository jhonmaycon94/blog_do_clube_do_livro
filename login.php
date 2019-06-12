<?php require_once "includes/bigheader.php"; ?>
      <div class="row align-items-center">
        <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="container">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                  <img src="_imagens/livro-aberto.png" alt="livro aberto">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>

              </div>
            </div>
            <?php
              if(isset($_GET['erro'])){
                $erros = [1 => "O formulário não pode ser enviado em branco",
                          2 => "O usuário não pode ser deixado em branco",
                          3 => "A senha não pode ser deixada em branco",
                          4 => "Erro na consulta ao banco de dados",
                          5 => "Usuário não existe",
                          6 => "Usuário ou senha incorretos"];

                for($i=1; $i<=6; $i++){
                  if($_GET['erro'] == $i){
                    echo "<p class= 'bg-danger text-center p-msg'>".$erros[$i]."</p>";
                    break;
                  }
              }
            }else if(isset($_GET['login'])){
              if($_GET['login'] == 'sucesso'){
              echo "<p class= 'bg-success text-center p-msg'>Logado com sucesso!</p>";
            }
            }
            ?>
            <form action="resources/login_res.php" method="POST">
              <div class="form-group">
                <label for='username' class="sr-only">Usuário:</label>
                <input type="text" name="username" placeholder="usuário" id="username" class="form-control" value="<?php echo retorna_usuario() ?>">
              </div>
              <div class="form-group">
                <label for='senha' class="sr-only">Senha:</label>
                <input type="password" name="senha" placeholder="senha" id="senha" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="bt_submit_login">Login</button>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
          </div>
        <?php require_once "includes/bigfooter.php"; ?>
