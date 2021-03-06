<?php 
//Verifica se existe o id da notícia, caso não exista redireciona para index
if (!isset($_GET['id'])) header('Location: index.php');
//Inclui cabeçalho
include 'inc/head.inc.php'; 
//Inclui classes notícia e comentários
include 'classes/noticia.class.php';
include 'classes/comentarios.class.php';

//Instancia noticia
$noticia = new Noticia();
//Pega informações da notícia do banco passando seu id pego via GET
$not = $noticia->getById($_GET['id']);

//Cria array com todos os comentários da notícia
$comentarios = Comentarios::getByNoticiaIdAll($_GET['id']);
?>

<body>
	<div class="wrapper sticky_footer">
        <?php include 'inc/header.inc.php'; // inclusao do menu de navegacao?>
        <!-- CONTENT BEGIN -->
        <div id="content" class="right_sidebar">
        	<div class="inner">
            	<div class="general_content">
                	<div class="main_content">
                        <div class="separator" style="height:30px;"></div>
                        
                        <article class="block_single_post">
                            <!-- Exibe imagem da noticia -->
                        	<div class="f_pic"><a href="#"><img src="imgnoticias/<?=$not['id_noticia']?>.jpg" alt=""></a></div>
                         <!-- Exibe título da notícia -->
                          <p class="title"><a href="#"><?=$not['titulo']?></a></p>
                            
                            <div class="info">
                                <!-- Exibe data da notícia -->
                                <div class="date"><p><?=$not['data']?></p></div>                                   
                            	
                            </div>
                            
                            <div class="content">
                                <!-- Exibe conteúdo da notícia -->
                            	<p><?=$not['conteudo']?></p>
                                <!-- Exibe link da notícia -->
                                <p><a href="<?=$not['link']?>">Visitar Página da Notícia</a></p>
                            </div>

                        </article>                    
                      
                        <div class="line_2" style="margin:5px 0px 28px;"></div>

                        <div class="block_comments">
                        	<h2>Comentários</h2>
                            <!-- Percorre array de comentários e exibe cada um deles -->
                            <?php if (count($comentarios)): foreach ($comentarios as $comentario):?>
                            <div class="comment">
                            	<div class="userpic"><a href="#"><img src="images/ava_default_1.jpg" alt=""></a></div>
                                <div class="content">
                                    <!-- Exibe email do comentário -->
                                	<p class="name"><a href="#"><?=$comentario['email']?></a></p>
                                    <!-- Exibe Comentário -->
                                    <p class="text"><?=$comentario['comentario']?></p>
                                </div>
                                <div class="clearboth"></div>
                                <div class="line_3"></div>
                            </div>  
                            <?php endforeach; else: ?> 
                            <p>Nenhum Comentário</p>
                            <?php endif; ?>                        

                        </div>
                        
                        <div class="separator" style="height:30px;"></div>
                        
                        <div class="block_leave_reply">
                        	<h3>Deixe seu Comentário</h3>
                            
                        	<form class="w_validation" action="add_comentario.php" method="POST">
                                <p>E-mail<span>*</span></p>
                            	<div class="field"><input type="email" name="email" class="req"></div>
                                
                                <p>Comentário</p>
                                <div class="textarea"><textarea name="comentario" cols="1" rows="1"></textarea></div>
                                <input type="hidden" name="id_noticia" value="<?=$_GET['id']?>">
                                <input type="submit" class="general_button" value="Comentar">
                            </form>
                        </div>
                        
                    </div>


                    <div class="sidebar">
                        <div class="block_newsletter">
                            <h4>Feed RSS</h4>
                            <button href="feed-rss.php" class="button">Assinar</button>
                        </div>
                        <div class="separator" style="height:31px;"></div>
                    </div>
                	<div class="clearboth"></div>
                </div>
            </div>
        </div>
    	<!-- CONTENT END -->
    </div>
    <?php include 'inc/footer.inc.php'; // inclusao do css e js  ?>
</body>

</html>
