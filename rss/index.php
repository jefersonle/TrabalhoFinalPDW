<?php
//Inclui classe notícia
include "../classes/noticia.class.php";

// Intanciamos um objeto SimpleXMLElement iniciando um xml
$rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
//Add atributo de versão 2.0 do rss
$rss->addAttribute('version', '2.0');
// Cria o elemento <channel> dentro de <rss>
$canal = $rss->addChild('channel');
// Adiciona sub-elementos ao elemento <channel> como título,link,descrição
$canal->addChild('title', 'PG News - RSS');
$canal->addChild('link', 'http://www.pgnews.com/');
$canal->addChild('description', 'Últimas 10 notícias via rss!');

//Instancia notícia
$noticia = new Noticia();
//Pega todas as notícias
$noticias = $noticia->getAll();
//Cria variável de controle
$cont = 1;
//Percorre array de notícias
foreach ($noticias as $noticia) {
	//Faz verificação para exibir apenas as 10 últimas notícias
	if($cont <=10){
		//Cria variáveis para informações do array
		$titulo = $noticia['titulo'];
		$link = $noticia['link'];
		$gravata = $noticia['gravata'];
		$data = $noticia['data'];
		//Adiciona item ao canal
		$item = $canal->addChild('item');
		// Adiciona sub-elementos ao elemento <item>, como Título, link, descrição, data
		$item->addChild('title', $titulo);
		$item->addChild('link', $link);
		$item->addChild('description', $gravata);
		$item->addChild('pubDate', $data);
	}
	//Incremente o controle
	$cont++;
}



// Define o tipo de conteúdo e o charset
header("content-type: application/rss+xml; charset=utf-8");

// Entrega o conteúdo do RSS completo:
echo $rss->asXML();
exit;
?>