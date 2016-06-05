<?php 
//Inclui classe comentário
include 'classes/comentarios.class.php';
//Verifica se a requisição é via post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//Instancia Comentarios
	$comentario = new Comentarios();
	//Add variáveis do comentários
	$comentario->idNoticia = $_POST['id_noticia'];
	$comentario->email = $_POST['email'];
	$comentario->comentario = $_POST['comentario'];
	//Salva novo comentário no banco
	$comentario->save();

	//Redireciona para página de notícia anterior
	$url = "Location: noticia.php?id=".$_POST['id_noticia'];
	header($url);

}else{
	//Redireciona para index caso a requisição não seja via post
	header('Location: index.php');
}

?>