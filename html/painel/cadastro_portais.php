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
                            <p class="general_title"><span>Cadastro - Portais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="#" class="w_validation">
                                    <div class="col_1">
                                        <div class="label"><p>Nome<span>*</span>:</p></div>
                                        <div class="field"><input type="text" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:14px;"></div>

                                        <div class="label"><p>E-mail<span>*</span>:</p></div>
                                        <div class="field"><input type="text" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>
                                    </div>

                                    <div class="col_2">
                                        <div class="label"><p>Site<span>*</span>:</p></div>
                                        <div class="field"><input type="text"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:14px;"></div>
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
                                <th>#</th>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>Email</th>
                            </tr>

                            <tr class="last_row">
                                <td>Item #1</td>
                                <td>Description</td>
                                <td>100 Mb</td>
                                <td class="last_cell">Some text:)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>