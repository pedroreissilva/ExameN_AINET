<!--
    this div contains the news and the toolbar "categories" on top of news_container
-->
<div id = "news_container">
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