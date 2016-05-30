<?php
    include '../inc/config.php'; // inclusao das configuracoes
    include '../inc/head.pages.inc.php'; // inclusao do css e js
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
                                <form action="#"  method="post" enctype="multipart/form-data" class="w_validation">
                                    <div class="col_1">
                                        <div class="label"><p>Arquivo XML<span>*</span>: </p></div>
                                        <div class="field"><input type="file" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                    </div>
                                    <p class="info_text"><input type="submit" class="general_button" value="Enviar"></p>
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