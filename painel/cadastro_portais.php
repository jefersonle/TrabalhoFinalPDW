<?php
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/portal.class.php";

$portal = new Portal();
$portais = $portal->getAll();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    if($nome != "" && $email != "" && $site != ""){
        
        $portal->nmPortal = $nome;
        $portal->site = $site;
        $portal->email = $email;
        $portal->save();

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
                            <p class="general_title"><span>Cadastro - Portais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="" method="POST" class="w_validation">
                                    <div class="col_1">
                                        <div class="label"><p>Nome<span>*</span>:</p></div>
                                        <div class="field"><input required="required" type="text" name="nome" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:14px;"></div>

                                        <div class="label"><p>E-mail<span>*</span>:</p></div>
                                        <div class="field"><input required="required" type="email" name="email" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>
                                    </div>

                                    <div class="col_2">
                                        <div class="label"><p>Site<span>*</span>:</p></div>
                                        <div class="field"><input required="required" type="text" name="site"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:14px;"></div>
                                    </div>

                                    <div class="clearboth"></div>
                                    <div class="separator" style="height:32px;"></div>
                                    <p class="info_text"><?=$msg?></p>
                                    <p class="info_text"><input type="submit" class="general_button" value="Cadastrar"></p>
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
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>