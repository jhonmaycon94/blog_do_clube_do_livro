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
                    <div class="col-md-4">
                        <div class="profile-img box">
                            <?php 
                                $foto_perfil = (get_foto_perfil($_GET['user_id']) == null) ? "_imagens/icone_img_perfil.png" : get_foto_perfil($_GET['user_id']);
                            ?>
                            <img src="<?php echo $foto_perfil ?>" alt="icone de perfil"/>
                            <div class="file btn btn-lg btn-primary">
                                mudar foto
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $usuario['nome'] ?>
                                    </h5>
                                    <h6>
                                        <?php echo $usuario['bio']; ?>
                                    </h6>
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
                    <div class="col-md-2">
                        <input type="file" name="file"/>
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p class="principal">PERFIL</p>
                            <a ><?php echo $usuario['idade']." anos"?></a><br/>
                            <a ><?php echo $usuario['sexo'] ?></a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="livros" role="tabpanel" aria-labelledby="livros-tab">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <span class="label label-default">Título</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="label label-default">Autor</label>
                                            </div>
                                            <div class="col-md-3">
                                              <span class="label label-default">Ano</label>
                                            </div>
                                            <div class="col-md-3">
                                              <span class="label label-default">Gênero</label>
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
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><?php echo $livro["title"]; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><?php echo $livro["nome_autor"]; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><?php echo $livro["ano"]; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><?php echo $livro["genero"]; ?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php 
                                            if(isset($_SESSION['user_id']) && $_SESSION['user_id']==$user_id){
                                        ?>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <p>adicionar livro</p>
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
                                        else 
                                            foreach($autores as $autor) {
                                        ?>    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?php echo $autor["primeiro_nome"]." ".$autor["ultimo_nome"]; ?></p>                                            
                                            </div>
                                        </div>
                                        <?php } ?>
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
                                            else  
                                            foreach($generos as $genero) {
                                        ?>    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?php echo $genero["nome"]; ?></p>                                            
                                            </div>
                                        </div>
                                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

<?php require_once "includes/bigfooter.php"; ?>
