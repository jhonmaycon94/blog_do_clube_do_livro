<?php require_once "includes/bigheader.php"; ?>

  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2>Cadastro</h2>
    </div>

    <div class="row">
      <div class="col-md-2 order-md-2 mb-4"></div>
      <div class="col-md-8 order-md-1">
        <form class="formulario_cadastro" action="resources/cadastro_res.php" method="post">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="primeiroNome">Primeiro Nome:</label>
              <input type="text" class="form-control" id="primeiroNome" name="primeiroNome" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sobrenome">Sobrenome:</label>
              <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
            <div class="invalid-feedback">
              Por favor, insira uma senha válida.
            </div>
          </div>

          <div class="mb-3">
            <label for="confirma_senha">Confirme a senha</label>
            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="input-group">
                <label for="idade">idade:</label>
                <input type="number" name="idade" id="idade" min=1 max="200">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-block my-3">
                <h5>Sexo:</h5>
                <div class="custom-control custom-radio">
                  <input id="rb_masc" name="rb_sexo" type="radio" class="custom-control-input" value="masculino" checked required>
                  <label class="custom-control-label" for="rb_masc">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="rb_fem" name="rb_sexo" type="radio" class="custom-control-input" value="feminino" required>
                  <label class="custom-control-label" for="rb_fem">Feminino</label>
                </div>
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="bt_enviar" type="submit">Enviar</button>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>

  <?php require_once "includes/bigfooter.php"; ?>
