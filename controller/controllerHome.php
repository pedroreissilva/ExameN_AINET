<?php

class controller_controllerHome {

    public function __construct(){

    }


    public function printHomeView(){
        include ROOT_DIR.'/view/view_header.php';
        include ROOT_DIR.'/view/view_home.php';
        include ROOT_DIR.'/view/view_footer.php';
    }


} 