<?php

class controller_controllerHome {

    public function __construct(){

    }


    public function printHomeView(){
        $menuController = new controller_controllerMenu();
        $newsController = new controller_controllerNews();
        $leftMenu = $menuController->getLeftMenuOptions();
        $topMenu = $menuController->getTopMenuOptions();
        $news = $newsController->getNewsWithPagination();
        $paginationControl = $newsController->getPaginationControl();
        include ROOT_DIR.'/view/view_header.php';
        include ROOT_DIR.'/view/view_left_menu.php';
        include ROOT_DIR.'/view/view_news_container.php';
        include ROOT_DIR.'/view/view_footer.php';
    }


} 