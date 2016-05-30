<?php

if(!isset($_GET['id'])) header('Location: cadastro_noticias.php');

include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/noticia.class.php";
include "../classes/portal.class.php";

$portal = new Portal();
$portais = $portal->getAll();

$noticia = new Noticia();
$noticia->get($_GET['id']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_portal = $_POST['portal'];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST['data'];
    $link = $_POST['link'];
    
    if($id_portal !="" && $titulo !="" && $conteudo !="" && $data !="" && $link !=""){
        $noticia->idPortal = $id_portal;
        $noticia->titulo = $titulo;
        $noticia->data = $data;
        $noticia->conteudo = $conteudo;
        $noticia->link = $link;
        $noticia->gravata = substr($conteudo, 0, 50);

        $noticia->update();

        if (isset($_FILES['imagem'])) {
             move_uploaded_file($_FILES['imagem']['tmp_name'], "../imgnoticias/".$noticia->idNoticia.".jpg");
        }

        header('Location: cadastro_noticias.php');

    }else{
        $msg = "Erro, todos os campos são obrigatórios";
    }
}else{
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
                            <p class="general_title"><span>Cadastro - Notíciais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="" method="POST" class="w_validation" enctype="multipart/form-data">
                                    <div class="col_1">
                                        <div class="label"><p>Portal:</p></div>
                                        <div class="field">
                                            <select name="portal" class="req">
                                                <?php foreach($portais as $portal): ?>
                                                <option value="<?=$portal['id_portal']?>"
                                                    <?php if($portal['id_portal'] == $noticia->idPortal) echo "selected"?>
                                                    ><?=$portal['nm_portal']?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Título<span>*</span>: </p></div>
                                        <div class="field"><input name="titulo" type="text" class="req" value="<?=$noticia->titulo?>"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Conteúdo<span>*</span>: </p></div>
                                        <textarea name="conteudo" rows="5" cols="40"><?=$noticia->conteudo?></textarea>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                    </div>

                                    <div class="col_2">
                                        <div class="label"><p>Data<span>*</span>:</p></div>
                                        <div class="field"><input type="date" name="data" class="req" value="<?=$noticia->data?>"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Link<span>*</span>:</p></div>
                                        <div class="field"><input type="url" name="link" class="req" value="<?=$noticia->link?>"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Imagem<span>*</span>:</p></div>
                                        <div class="field"><input type="file" name="imagem"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>
                                    </div>



                                    <div class="clearboth"></div>
                                    <div class="separator" style="height:32px;"></div>
                                    <p class="info_text"><input type="submit" class="general_button" value="Atualizar"></p>
                                </form>
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