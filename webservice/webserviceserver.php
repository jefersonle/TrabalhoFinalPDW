<?php
// Observacoes:
// Adicionar a extensao php_soap no php.ini
include 'class/portal.class.php';

//criacao de uma instancia do servidor (coloque o endereco na sua maquina local)
$server = new SoapServer(null, array('uri' => 'http://localhost/tormen/trabalhofinal'));  // ex.: http://localhost/soap/



//definicao dos métodos disponíveis para uso do servico ( vai retornar apenas a frase Hello World + parametro que receber + ! )

	  		function getSearch($palavraChave){
	  			return $resultado;
	  		}
	  		function getByPortalId($id){
	  			$portal = new Portal();
	  			$resultado = $portal->getById($id);
	  			return $resultado;
	  		}
	  		function getByNoticiaId($id){
	  			return $resultado;
	  		}
	  		function getAllNoticias(){

	  			return $resultado;
	  		}
	  		function getAllPortais(){
	  			$portal = new Portal();
	  			$resultado = $portal->getAll();
	  			return $resultado;
	  		}

//registro do servico na instania
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
