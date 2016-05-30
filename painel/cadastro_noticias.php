<?php
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/noticia.class.php";
include "../classes/portal.class.php";
include "../classes/imagem.class.php";

$portal = new Portal();
$portais = $portal->getAll();

$noticia = new Noticia();
$noticias = $noticia->getAll();

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

        $res = $noticia->save();


        move_uploaded_file($_FILES['imagem']['tmp_name'], "../imgnoticias/".$res.".jpg");

        $msg = "Cadastro efetuado com sucesso";

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
                                                <option value="<?=$portal['id_portal']?>"><?=$portal['nm_portal']?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Título<span>*</span>: </p></div>
                                        <div class="field"><input name="titulo" type="text" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Conteúdo<span>*</span>: </p></div>
                                        <textarea name="conteudo" rows="5" cols="40" value=""></textarea>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                    </div>

                                    <div class="col_2">
                                        <div class="label"><p>Data<span>*</span>:</p></div>
                                        <div class="field"><input type="date" name="data" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Link<span>*</span>:</p></div>
                                        <div class="field"><input type="url" name="link" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Imagem<span>*</span>:</p></div>
                                        <div class="field"><input type="file" name="imagem" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>
                                    </div>



                                    <div class="clearboth"></div>
                                    <div class="separator" style="height:32px;"></div>
                                    <p class="info_text"><input type="submit" class="general_button" value="Cadastrar"></p>
                                </form>
                            </div>

                            <div class="line_3" style="margin:42px 0px 0px;"></div>
                        </div>

                        <table cellpadding="0" cellspacing="0" class="table_1">
                            <tr>                                
                                <th>Portal</th>
                                <th>Data</th>
                                <th>Título</th>
                                <th>Gravata</th>
                                <th>Conteúdo</th>
                                <th>Link</th>
                                <th>Opções</th>
                            </tr>
                            <?php foreach ($noticias as $noticia): ?>
                            <tr class="last_row">
                                <td><?php echo Portal::getName($noticia['id_portal']) ?></td>
                                <td><?=$noticia['data']?></td>
                                <td><?=$noticia['titulo']?></td>
                                <td><?=$noticia['gravata']?></td>
                                <td><?=$noticia['conteudo']?></td>
                                <td><?=$noticia['link']?></td>
                                <td class="last_cell">
                                    <a href="update_noticias.php?id=<?=$noticia['id_noticia']?>">Editar | </a>
                                    <a href="delete_noticias.php?id=<?=$noticia['id_noticia']?>">Excluir</a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>