<?php
//Inclui arquivos necessários
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/portal.class.php";
//Instancia novo objeto portal
$portal = new Portal();
//Cria array de portais
$portais = $portal->getAll();
//Verifica se a requisição foi feita via post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Salva informações recebidas via post em variáveis
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    //Verifica se os campos não estão vazios
    if($nome != "" && $email != "" && $site != ""){
        //Adiciona informações aos atributos do objeto portal
        $portal->nmPortal = $nome;
        $portal->site = $site;
        $portal->email = $email;
        //Salva objeto portal no banco
        $portal->save();
        //Popula msg
        $msg = "Cadastro efetuado com sucesso";

    }else{
        //Popula msg caso algum campo estiver em branco
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
                            <p class="general_title"><span>Cadastro - Portais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="" method="POST" class="w_validation">
                                    <div class="col_1">

                                        <div class="form-group">
                                            <label for="usr"><p>Nome<span>*</span>: </p></label>
                                            <input required="required" type="text" name="nome" class="form-control" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>E-mail<span>*</span>: </p></label>
                                            <input required="required" type="email" name="email" class="form-control" id="usr">
                                        </div>

                                    </div>

                                    <div class="col_2">
                                        <div class="form-group">
                                            <label for="usr"><p>Site<span>*</span>: </p></label>
                                            <input required="required" type="text" name="site" class="form-control" id="usr">
                                        </div>

                                    </div>

                                    <div class="col-md-2 col-md-offset-5" >
                                        <p class="info_text"><?=$msg?></p>
                                        <p class="info_text"><input type="submit" class="general_button" value="Cadastrar"></p>
                                    </div>
                                    
                                </form>
                            </div>

                            <div class="line_3" style="margin:42px 0px 0px;"></div>
                        </div>

                        <table cellpadding="0" cellspacing="0" class="table_1">
                            <tr>                                
                                <th>Nome</th>
                                <th>Site</th>
                                <th>Email</th>
                                <th>Opções</th>
                            </tr>
                            <!-- Percorre array de portais e popula tabela -->
                            <?php foreach($portais as $portal):?>
                            <tr class="last_row">                                
                                <td><?=$portal['nm_portal']?></td>
                                <td><?=$portal['site']?></td>
                                <td><?=$portal['email']?></td>
                                <td class="last_cell">
                                    <a href="update_portais.php?id=<?=$portal['id_portal']?>">Editar | </a>
                                    <a href="delete_portais.php?id=<?=$portal['id_portal']?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Inclui rodapé -->
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>