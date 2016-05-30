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
                            <p class="general_title"><span>Cadastro - Notíciais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="#" class="w_validation">
                                    <div class="col_1">
                                        <div class="label"><p>Portal:</p></div>
                                        <div class="field"><input type="text" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Título<span>*</span>: </p></div>
                                        <div class="field"><input type="text" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Conteúdo<span>*</span>: </p></div>
                                        <textarea rows="5" cols="40" value=""></textarea>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                    </div>

                                    <div class="col_2">
                                        <div class="label"><p>Data<span>*</span>:</p></div>
                                        <div class="field"><input type="date" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Link<span>*</span>:</p></div>
                                        <div class="field"><input type="url" class="req"></div>
                                        <div class="clearboth"></div>
                                        <div class="separator" style="height:12px;"></div>

                                        <div class="label"><p>Gravata<span>*</span>:</p></div>
                                        <div class="field"><input type="text" class="req"></div>
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
                                <th>#ID Notícia</th>
                                <th>Portal</th>
                                <th>Data</th>
                                <th>Título</th>
                                <th>Conteúdo</th>
                                <th>Gravata</th>
                                <th>Link</th>
                            </tr>

                            <tr class="last_row">
                                <td>Description</td>
                                <td>Description</td>
                                <td>Description</td>
                                <td>Description</td>
                                <td>Description</td>
                                <td>Description</td>
                                <td>Description</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>