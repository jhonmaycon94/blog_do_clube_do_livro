<?php require_once "includes/bigheader.php"; ?>
<?php 
$user_id = $_GET['user_id'];
$usuario = get_usuario($user_id);
$livros = get_livros($user_id);
$autores = get_autores($user_id);
$generos = get_generos($user_id);

?>

<div class="container emp-profile">
    <form method="post" action="file_res.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-img">
                <?php 
                    $foto_perfil = (get_foto_perfil($_GET['user_id']) == null) ? "_imagens/icone_img_perfil.png" : get_foto_perfil($_GET['user_id']);
                ?>
                    <img id="blah" src="<?php echo $foto_perfil ?>" class="img-fluid img-thumbnail" alt="icone de perfil"/>
                    <div class="file btn btn-lg btn-primary">
                        <input type="file" name="file" onchange="readURL(this)" accept="image/gif, image/jpeg, image/png"/>
                        <script>
                        function readURL(input) {
                                console.log(input);
                            if (input.files && input.files[0]) {
                                console.log(input.files[0]);
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                $('#blah')
                                    .attr('src', e.target.result)
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                            }
                        </script>
                        mudar foto
                    </div>
                </div>
                <div class="profile-work">
                    <p class="principal text-dark font-weight-bold text-center">PERFIL</p>
                    <h3 class="text-dark font-weight-bold text-center">
                        <?php echo $usuario['nome'] ?>
                    </h3>
                    <h6 class="text-secondary text-center"><?php echo $usuario['idade']." anos"?></h6>
                    <h6 class="text-secondary text-center"><?php echo $usuario['sexo'] ?></h6>
                    <h6 class="text-secondary text-center">
                        <?php echo $usuario['bio']; ?>
                    </h6>
                </div>
            </div>
        <div class="col-md-6">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="livros" role="tabpanel" aria-labelledby="livros-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="label label-default text-dark font-weight-bold">Título</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default text-dark font-weight-bold">Autor</label>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default text-dark font-weight-bold">Ano</label>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default text-dark font-weight-bold">Gênero</label>
                        </div>
                    </div>
                    <?php
                        if(count($livros) == 0){
                            echo "<div class='row'>";
                            echo "<div class='col-md-12'>";
                            echo "<p>".$usuario['nome']." não adicionou nenhum livro favorito</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        else 
                            foreach( $livros as $livro){ 
                    ?>
                    <div class="row border-bottom pt-2">
                        <div class="col-md-3">
                            <p class="text-secondary"><?php echo $livro["title"]; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="text-secondary"><?php echo $livro["nome_autor"]; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="text-secondary"><?php echo $livro["ano"]; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="text-secondary"><?php echo $livro["genero"]; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                        if(isset($_SESSION['user_id']) && $_SESSION['user_id']==$user_id){
                    ?>
                    <div class="row mt-3" id="bt-row-livros">
                        <div class="col-md-12 offset-md-4">
                            <button type="button" class="btn btn-dark" onclick="add_livro(<?php echo $user_id ?>)" id="bt_add_livro">adicionar livro</button>
                        </div>
                    </div>
                        <?php } ?>    
                </div>
                <div class="tab-pane fade" id="escritores" role="tabpanel" aria-labelledby="escritores-tab">
                    <?php 
                    if(count($autores) == 0){
                        echo "<div class='row'>";
                        echo "<div class='col-md-12'>";
                        echo "<p>".$usuario['nome']." não adicionou nenhum escritor favorito</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    else{ ?>
                        <div class="col-md-12 offset-md-4">
                            <span class="label label-default text-dark font-weight-bold">Escritores:</span>
                        </div>
                        <?php
                        foreach($autores as $autor) {
                    ?>    
                    <div class="row offset-md-3">
                        <div class="col-md-8 border-bottom pt-2">
                            <p class="text-secondary offset-md-4"><?php echo $autor["primeiro_nome"]." ".$autor["ultimo_nome"]; ?></p>                                            
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                        if(isset($_SESSION['user_id']) && $_SESSION['user_id']==$user_id){
                    ?>
                    <div class="row mt-3" id="bt-row-autores">
                        <div class="col-md-12 offset-md-4">
                            <button type="button" class="btn btn-dark" onclick="add_autor(<?php echo $user_id ?>)" id="bt_add_autor">adicionar escritor</button>
                        </div>
                    </div>
                        <?php
                        } 
                    } ?>  
                </div>
                <div class="tab-pane fade" id="generos" role="tabpanel" aria-labelledby="generos-tab">
                    <?php
                        if(count($generos) == 0){
                            echo "<div class='row'>";
                            echo "<div class='col-md-12'>";
                            echo "<p>".$usuario['nome']." não adicionou nenhum gênero favorito</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        else { ?>
                        <div class="col-md-12 offset-md-4">
                            <span class="label label-default text-dark font-weight-bold">Genêros:</span>
                        </div>
                        <?php 
                        foreach($generos as $genero) {
                    ?>    
                    <div class="row offset-md-3 pt-2">
                        <div class="col-md-8 border-bottom">
                            <p class="text-secondary offset-md-4"><?php echo $genero["nome"]; ?></p>                                            
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                        if(isset($_SESSION['user_id']) && $_SESSION['user_id']==$user_id){
                    ?>
                    <div class="row mt-3" id="bt-row-genero">
                        <div class="col-md-12 offset-md-4">
                        <button type="button" class="btn btn-dark" onclick="add_genero(<?php echo $user_id ?>)" id="bt_add_genero">adicionar gênero</button>
                        </div>
                    </div>
                        <?php } 
                        }?>  
                </div>
            </div>
        </div>
        <div class="col-md-3">
          <div class="row offset-md-3">
            <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil"/>
          </div>
          <div class="row offset-md-3">  
            <div class="profile-head">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="livros-tab" data-toggle="tab" href="#livros" role="tab" aria-controls="livros" aria-selected="true">Livros Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="escritores-tab" data-toggle="tab" href="#escritores" role="tab" aria-controls="escritores" aria-selected="false">Escritores Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="generos-tab" data-toggle="tab" href="#generos" role="tab" aria-controls="generos" aria-selected="false">Gêneros Favoritos</a>
                    </li>
                </ul>
            </div>
          </div>  
        </div>
    </div>   
</form>
</div>

<?php require_once "includes/bigfooter.php"; ?>
