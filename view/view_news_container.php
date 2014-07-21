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

    <div class = "individual_news_container">
        <div class = "individual_news_container_title">

        <div class = "individual_news_container_time_hour">

        </div>
        </div>
        <div class = "individual_news_container_content">
            <img>
            <p>

            </p>
            <div class = "individual_news_container_author">

            </div>
        </div>
    </div>




</div>