

<!--
    this div contains the news and the toolbar "categories" on top of news_container
-->
<div id = "news_container">

    <!--
        this div contains the popup box with login fialds
    -->
    <div id = "main_login_container">

        <div id = "main_login_box">
            <div id = "login_header_name">
                <p>AUTENTICAÇÂO</p>
            </div>
            <div id = "login_form_container">
                <form action="public_autentication.php" method="POST">
                    <label for="user">Nome de Utilizador</label><br/>
                    <input type="text" name = "username" style="width: 376px;"><br/>
                    <label for="pass">Palavra-Pass</label><br/><br/>
                    <input type="password" maxlength="20" name = "password" style="width: 376px;"><br/>
                    <input type="submit" value="Entrar">ou<a onclick="present_login_menu('main_login_container')">&nbsp;cancelar</a>
                </form>
            </div>
        </div>
    </div>



    <div id = "news_categories">
        <ul>
            <?php
                foreach($topMenu as $id=>$value){
                    echo '<li id = "'.$id.'">'.$value.'</li>';
                }
            ?>
        </ul>
    </div>



    <?php

        foreach($news as $new){
            $resumo = $new->getResumo();
            $titulo = $new->getTitulo();
            $imagem = $new->getImagem();
            $author = $new->getCreatedAt();
            $updated_at = $new->getUpdatedAt();
            echo '
            <div class = "individual_news_container">
                <div class = "individual_news_container_title">
                    <p>
                    '.$titulo.'
                    </p>
                    <div class = "individual_news_container_time_hour">
                        <p>'.$updated_at.'
                        </p>
                    </div>
                </div>
                 <div class = "individual_news_container_content">
                    <img src = "images/attachments/'.$imagem.'" alt = "">
                    <p>'.$resumo.'
                    </p>
                    <div class = "individual_news_container_author">
                        <p>'.$author.'
                        </p>
                    </div>
                </div>
            </div> <!-- this div closes div that contains all the news-->';
        }

    ?>
    <div id = "paginatio_control">
        <?php
            echo $paginationControl;
        ?>
    </div>



</div>