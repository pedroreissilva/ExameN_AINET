<!--
    this view contains the left menu, this left menu contains the Hashtags from DB
-->

<div id = "left_menu">
    <ul>
    <?php
        foreach($leftMenu as $id=>$value){
            echo '<li id = "'.$id.'"># '.$value.'</li>';
        }
    ?>
    </ul>
</div>