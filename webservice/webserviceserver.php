<?php
//Inclui classes noticia e portal
include '../classes/noticia.class.php';
include '../classes/portal.class.php';

//criacao de uma instancia do servidor
$server = new SoapServer(null, array('uri' => 'http://localhost/PDW/webservice/'));



//definicao dos métodos disponíveis para uso do servico 
			//Método para busca de notícia com palavra chave
	  		function getSearch($palavraChave){
	  			$noticia = new Noticia();
	  			$noticias = $noticia->search($palavraChave);

	  			return $noticias;
	  		}
	  		//Método para pegar notícias de um determinado portal pelo seu id
	  		function getByPortalId($id){
	  			$noticia = new Noticia();
	  			$resultado = $noticia->getByPortalId($id);
	  			
	  			return $resultado;
	  		}
	  		//Método que retorna notícia especificada pelo seu id
	  		function getByNoticiaId($id){
	  			$noticia = new Noticia();
	  			$resultado = $noticia->getById($id);

	  			return $resultado;
	  		}
	  		//Método para pegar todas as notícias
	  		function getAllNoticias(){
	  			$noticia = new Noticia();
	  			$noticias = $noticia->getAll();

	  			return $noticias;
	  		}
	  		//Método para pegar todos os Portais
	  		function getAllPortais(){
	  			$portal = new Portal();
	  			$portais = $portal->getAll();
	  			return $portais;
	  		}

	  		

//Registro dos métodos do servico na instancia
$server->addFunction("getSearch");
$server->addFunction("getByPortalId");
$server->addFunction("getByNoticiaId");
$server->addFunction("getAllNoticias");
$server->addFunction("getAllPortais");



// chamada do metodo para atender as requisicoes do servico
// se a chamada for um POST executa o método, caso contrario, apenas mostra a lista das funcoes disponiveis
if ($_SERVER["REQUEST_METHOD"]== "POST") {
		$server->handle();

} else {
	$functions = $server->getFunctions();
	print "Métodos disponíveis no serviço:";
	print "<hr />";
	print " <ul>";
	foreach ($functions as $func) {
		print "<li>$func</li>";
	}
	print "</ul>";
	
}
?>
