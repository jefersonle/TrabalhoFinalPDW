<?php

if(!isset($_GET['id'])) header('Location: cadastro_portais.php');

include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/portal.class.php";

$portal = new Portal();
$portais = $portal->getAll();

$portal->get($_GET['id']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    if($nome != "" && $email != "" && $site != ""){
        $portal->nmPortal = $nome;
        $portal->site = $site;
        $portal->email = $email;
        $portal->update();

        header('Location: cadastro_portais.php');

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
                                        <div class="field"><input required="required" type="text" name="nome" class="req" value="<?=$portal->nmPortal?>"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:14px;"></div>

                                        <div class="label"><p>E-mail<span>*</span>:</p></div>
                                        <div class="field"><input required="required" type="email" name="email" class="req" value="<?=$portal->email?>"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>
                                    </div>

                                    <div class="col_2">
                                        <div class="label"><p>Site<span>*</span>:</p></div>
                                        <div class="field"><input required="required" type="text" name="site" value="<?=$portal->site?>"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:14px;"></div>
                                    </div>

                                    <div class="clearboth"></div>
                                    <div class="separator" style="height:32px;"></div>
                                    <p class="info_text"><?=$msg?></p>
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