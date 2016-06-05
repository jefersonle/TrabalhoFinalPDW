<?php 
//Inclui classe portal
include '../classes/portal.class.php';
//Verifica se o id foi passado
if(isset($_GET['id'])){
	//Instancia portal
	$portal = new Portal();
	//Exclui portal
	$portal->delete($_GET['id']);
	//Redireciona para página de cadastro de portais
	header('Location: cadastro_portais.php');
}else{
	//Redireciona para página de cadastro de portais caso o id não seja passado
	header('Location: cadastro_portais.php');
}

?>