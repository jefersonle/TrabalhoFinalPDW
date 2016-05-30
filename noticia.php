<?php 

if (!isset($_GET['id'])) header('Location: index.php');

include 'inc/head.inc.php'; // inclusao do css e js  
include 'classes/noticia.class.php';
include 'classes/comentarios.class.php';

$noticia = new Noticia();
$not = $noticia->getById($_GET['id']);
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
                        	<div class="f_pic"><a href="#"><img src="imgnoticias/<?=$not['id_noticia']?>.jpg" alt=""></a></div>
                          <p class="title"><a href="#"><?=$not['titulo']?></a></p>
                            
                            <div class="info">
                                <div class="date"><p><?=$not['data']?></p></div>                                   
                            	
                            </div>
                            
                            <div class="content">
                            	<p><?=$not['conteudo']?></p>
                                <p><a href="<?=$not['link']?>">Visitar Página da Notícia</a></p>
                            </div>

                        </article>                    
                      
                        <div class="line_2" style="margin:5px 0px 28px;"></div>

                        <div class="block_comments">
                        	<h2>Comentários</h2>
                            <?php if (count($comentarios)): foreach ($comentarios as $comentario):?>
                            <div class="comment">
                            	<div class="userpic"><a href="#"><img src="images/ava_default_1.jpg" alt=""></a></div>
                                <div class="content">
                                	<p class="name"><a href="#"><?=$comentario['email']?></a></p>
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
                            <h4>Newsletter</h4>
                            
                            <form action="#">
                                <div class="field"><input type="text" class="w_def_text" title="Enter Your Email Addres"></div>
                                <input type="submit" class="button" value="Subscribe">
                                
                                <div class="clearboth"></div>
                            </form>
                        </div>             	
                        
                      <div class="separator" style="height:31px;"></div>
                        
                        <div class="block_popular_posts">
                        	<h4>Popular Posts</h4>
                            
                        	<div class="article">
								<div class="pic">
									<a href="#" class="w_hover">
										<img src="images/pic_popular_post_1.jpg" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="#">Packages and web page editors their default text.</a></p>
									<div class="date"><p>11 July, 2012</p></div>
                                    <div class="icons">
                                    	<ul>
                                        	<li><a href="#" class="views">41</a></li>
                                            <li><a href="#" class="comments">22</a></li>
                                        </ul>
                                    </div>
								</div>
							</div>
							<div class="line_3"></div>
                            
                            <div class="article">
								<div class="pic">
									<a href="#" class="w_hover">
										<img src="images/pic_popular_post_2.jpg" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="#">Web page editors their default model text, and a search for.</a></p>
									<div class="date"><p>07 July, 2012</p></div>
                                    <div class="icons">
                                    	<ul>
                                        	<li><a href="#" class="views">24</a></li>
                                            <li><a href="#" class="comments">16</a></li>
                                        </ul>
                                    </div>
								</div>
							</div>
							<div class="line_3"></div>
                            
                            <div class="article">
								<div class="pic">
									<a href="#" class="w_hover">
										<img src="images/pic_popular_post_3.jpg" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="#">Editors their default model text, and a search uncover.</a></p>
									<div class="date"><p>05 July, 2012</p></div>
                                    <div class="icons">
                                    	<ul>
                                        	<li><a href="#" class="views">33</a></li>
                                            <li><a href="#" class="comments">25</a></li>
                                        </ul>
                                    </div>
								</div>
							</div>
							<div class="line_2"></div>
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