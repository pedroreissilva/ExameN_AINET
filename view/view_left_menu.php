<!--
    this view contains the left menu, this left menu contains the Hashtags from DB
-->

<div id = "left_menu">
    <h3>Hashtags</h3>
    <ul>
    <?php
        foreach($leftMenu as $id=>$value){
            echo '<li id = "'.$id.'"># '.$value.'</li>';
        }


    ?>
    </ul>


    <?php


        if(isset($_SESSION['autenticado']) && count($_SESSION['autenticado'])){
            if(isset($_SESSION['role'])){
                if($_SESSION['role'] == 0){
                    echo '<p>Ferramentas</p>';
                    echo '<ul>';
                        echo '<li><img src="images/add.png"><a href = "public_add_news.php">Nova Notícia</a></li>';
                    echo '</ul>';
                }
            }
        }
    ?>
</div>