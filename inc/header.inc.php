<!-- HEADER BEGIN -->
<header>
    <div id="header">
        <section class="bottom">
            <div class="inner">
                <div id="logo_top"><a href="index.php"><img src="images/logo_top.png" alt="BusinessNews" title="BusinessNews"></a></div>

                <div class="block_today_date">
                    <div class="num"><p id="num_top"></p></div>
                    <div class="other">
                        <p class="month_year"><span id="month_top"></span>, <span id="year_top"></span></p>
                        <p id="day_top" class="day"></p>
                    </div>
                </div>

                <div class="fr">
                    <div class="block_languages">
                        <div class="clearboth"></div>
                    </div>

                    <div class="block_search_top">
                        <form action="search.php" method="POST">
                            <div class="field"><input type="text" class="w_def_text" name="word" title="Digite sua busca aqui"></div>
                            <input type="submit" class="button" value="Buscar">

                            <div class="clearboth"></div>
                        </form>
                    </div>
                </div>

                <div class="clearboth"></div>
            </div>
        </section>

        <section class="section_main_menu">
            <div class="inner">
                <nav class="main_menu">
                    <ul>
                        <li class="current_page_item"><a href="index.php">Home</a></li>
                        <li><a href="#">Administração</a>
                            <ul>
                                <li><a href="painel/cadastro_portais.php">Cadastro de Portais</a></li>
                                <li><a href="painel/cadastro_noticias.php">Cadastro de Notícias</a></li>
                                <li><a href="painel/importa_xml.php">Importa XML</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
</header>
<!-- HEADER END -->