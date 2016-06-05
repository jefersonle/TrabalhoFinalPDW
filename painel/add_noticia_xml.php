<?php 
//Inclui classe notícia
include '../classes/noticia.class.php';
//Verifica se a requisição foi feita via post
if($_SERVER['REQUEST_METHOD'] == "POST"){
	//Move o xml enviado para a pasta xml
	move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");
  //Instancia novo objeto DOMM
	$doc = new DOMDocument();
  $doc->preserveWhiteSpace=false;
  $doc->formatOutput=true;
  //Carrega o arquivo da pasta onde foi salvo o upload no objeto DOMDocument
  $doc->load('xml/noticias.xml');

  //Cria array de notícias
  $noticias = $doc->getElementsByTagName( "noticia" );
  //Percorre array de notícias
  foreach( $noticias as $noticia )
  {
    //Instancia objeto noticia
    $not = new Noticia();
    //Pega informações do xml e adiciona ao objeto notícia
    $not->idPortal = $noticia->getElementsByTagName( "idPortal" )->item(0)->nodeValue;

    $not->titulo = $noticia->getElementsByTagName( "titulo" )->item(0)->nodeValue;

    $not->data = $noticia->getElementsByTagName( "data" )->item(0)->nodeValue;

    $not->conteudo = $noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue;
    //Cria a gravata a partir do conteúdo
    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 200);

    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;
    //Salva a notícia no banco
    $not->save();

  }
  //Redireciona para a página de formulário
  header('Location: importa_xml.php');
  
}else{
  //Caso não seja requisição via post redireciona para o formulário
  header('Location: importa_xml.php');
}

 ?>