<?php
//Inclui arquivos necessários
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include '../classes/noticia.class.php';

//Verifica se a requisição foi feita via post
if($_SERVER['REQUEST_METHOD'] == "POST"){
  //Move o xml enviado para a pasta xml
  move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");
  //Instancia novo objeto DOM
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
    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 50);

    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;
    //Salva a notícia no banco
    $not->save();

  }
  //Popula msg
  $msg = "Cadastro efetuado com sucesso!";
  
}else{
  //Inicia msg
  $msg = "";
}
?>
    <body>
        <div class="wrapper sticky_footer">
            <?php include '../inc/header.pages.inc.php'; // inclusao do menu de navegacao?>
            <div id="content" class="">
                <div class="inner">
                    <div class="general_content">
                        <div class="main_content">
                            <p class="general_title"><span>Importa XML - Notíciais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action=""  method="post" enctype="multipart/form-data" class="w_validation">
                                    <div class="col_1">

                                        <div class="form-group">
                                            <label for="usr"><p>Arquivo XML<span>*</span>: </p></label>
                                            <input type="file" name="arquivo" class="form-control" id="usr">
                                        </div>

                                    </div>
                                    <div class="col-md-2 col-md-offset-5" >
                                        <p class="info_text"><input type="submit" class="general_button" value="Enviar"></p>
                                    </div>

                                </form>
                                <div class="col-md-2 col-md-offset-5" >
                                    <p><?=$msg?></p>
                                </div>
                            </div>

                            <div class="line_3" style="margin:42px 0px 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>