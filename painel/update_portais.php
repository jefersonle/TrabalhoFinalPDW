<?php
//Verifica se o id foi passado
if(!isset($_GET['id'])) header('Location: cadastro_portais.php');
// Inclui arquivos necessários
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/portal.class.php";
//Instancia objeto portal
$portal = new Portal();
//Cria array de portais
$portais = $portal->getAll();
//Carrega portal pelo id
$portal->get($_GET['id']);
// Verifica se a requisição foi feita via post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Popula variáveis com informações recebidas via post
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    // Verifica se os campos não estão em branco
    if($nome != "" && $email != "" && $site != ""){
        //Popula atributos do objeto com informações das variáveis
        $portal->nmPortal = $nome;
        $portal->site = $site;
        $portal->email = $email;
        //Atualiza objeto no banco
        $portal->update();
        // Redireciona para página de cadastro de portais
        header('Location: cadastro_portais.php');

    }else{
        //Popula msg
        $msg = "Erro, todos os campos são obrigatórios";
    }
}else{
    // PInicia msg
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
                                            <input required="required"  type="text" name="nome" class="form-control" value="<?=$portal->nmPortal?>" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>E-mail<span>*</span>: </p></label>
                                            <input required="required"  type="email" name="email" class="form-control" value="<?=$portal->email?>" id="usr">
                                        </div>

                                    </div>

                                    <div class="col_2">
                                        <div class="form-group">
                                            <label for="usr"><p>Site<span>*</span>: </p></label>
                                            <input required="required"  type="text" name="site" class="form-control" value="<?=$portal->site?>" id="usr">
                                        </div>

                                    </div>
                                    <div class="col-md-2 col-md-offset-5" >
                                        <p class="info_text"><?=$msg?></p>
                                        <p class="info_text"><input type="submit" class="general_button" value="Atualizar"></p>
                                    </div>
                                    
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