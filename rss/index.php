<?php

// Intanciamos/chamamos a classe
$rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
$rss->addAttribute('version', '2.0');
// Cria o elemento <channel> dentro de <rss>
$canal = $rss->addChild('channel');
// Adiciona sub-elementos ao elemento <channel>
$canal->addChild('title', 'Meu primeiro RSS');
$canal->addChild('link', 'http://www.meusite.com/');
$canal->addChild('description', 'Este é o meu primeiro RSS, uha!');
// Cria um elemento <item> dentro de <channel>
$item = $canal->addChild('item');
// Adiciona sub-elementos ao elemento <item>
$item->addChild('title', 'Meu segundo artigo');
$item->addChild('link', 'http://www.meusite.com/artigos.php?id=2');
$item->addChild('description', 'Esse é um resumo do meu segundo artigo.');

// Cria outro elemento <item> dentro de <channel>
$item = $canal->addChild('item');
// Adiciona sub-elementos ao elemento <item>
$item->addChild('title', 'Meu primeiro artigo');
$item->addChild('link', 'http://www.meusite.com/artigos.php?id=1');
$item->addChild('description', 'Esse é um resumo do meu primeiro artigo.');
$item->addChild('pubDate', date('r'));
// Define o tipo de conteúdo e o charset
header("content-type: application/rss+xml; charset=utf-8");

// Entrega o conteúdo do RSS completo:
echo $rss->asXML();
exit;
?>