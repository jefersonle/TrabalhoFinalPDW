<?php

//Inclui arquivos necessários
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/noticia.class.php";
include "../classes/portal.class.php";
include "../classes/imagem.class.php";

//Instancia objeto portal
$portal = new Portal();
//Cria array com todos os portais
$portais = $portal->getAll();

//Instacia objeto notícia
$noticia = new Noticia();
//Cria array com todas as notícias
$noticias = $noticia->getAll();

//Verifica se a requisição foi feita via post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Cria variáveis com as informações recebidas via post
    $id_portal = $_POST['portal'];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST['data'];
    $link = $_POST['link'];
    //Verifica se os campos não estão vazios
    if($id_portal !="" && $titulo !="" && $conteudo !="" && $data !="" && $link !=""){
        //Atribui atributos ao objeto
        $noticia->idPortal = $id_portal;
        $noticia->titulo = $titulo;
        $noticia->data = $data;
        $noticia->conteudo = $conteudo;
        $noticia->link = $link;
        //Gera gravata a partir do conteúdo
        $noticia->gravata = substr($conteudo, 0, 200);
        //Salva notícia no banco
        $res = $noticia->save();

        //Faz upload da imagem para a pasta imgnoticias com o nome sendo o id da notícia
        move_uploaded_file($_FILES['imagem']['tmp_name'], "../imgnoticias/".$res.".jpg");
        //Altera msg
        $msg = "Cadastro efetuado com sucesso";

    }else{
        //Se algum campo estiver em branco altera a msg
        $msg = "Erro, todos os campos são obrigatórios";
    }
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
                            <p class="general_title"><span>Cadastro - Notíciais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="" method="POST" class="w_validation" enctype="multipart/form-data">
                                    <div class="col_1">
                                        <div class="form-group">
                                            <label for="sel1">Portal:</label>
                                            <select name="portal" class="form-control" id="sel1">
                                                <!-- Percorre array de portais para criar um select -->
                                                <?php foreach($portais as $portal): ?>
                                                <option value="<?=$portal['id_portal']?>"><?=$portal['nm_portal']?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Título<span>*</span>: </p></label>
                                            <input type="text" name="titulo" class="form-control" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="comment"><p>Conteúdo<span>*</span>: </p></label>
                                            <textarea class="form-control" name="conteudo" value="" rows="5" id="comment"></textarea>
                                        </div>

                                    </div>

                                    <div class="col_2">
                                        <div class="form-group">
                                            <label for="usr"><p>Data<span>*</span>: </p></label>
                                            <input type="date" name="data" class="form-control" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Link<span>*</span>: </p></label>
                                            <input type="url" name="link" class="form-control" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Imagem<span>*</span>: </p></label>
                                            <input type="file" name="imagem" class="form-control" id="usr">
                                        </div>

                                    </div>

                                    <div class="col-md-2 col-md-offset-5" ><p class="info_text"><input type="submit" class="general_button" value="Cadastrar"></p></div>

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
                            <!-- Percorre array de notícias para exibir na tabela -->
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
            <!-- Inclui Rodapé -->
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>