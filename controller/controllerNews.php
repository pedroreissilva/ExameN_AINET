<?php


class controller_controllerNews {

    private $newsModel;

  public function __construct(){
        $this->newsModel = new model_modelNews();
  }

  public function getNews(){
      return $this->newsModel->getNews();
  }

    public function getNewsWithPagination(){
        return $this->newsModel->getNewsWithPagination();
    }

    public function getPaginationControl(){
        return $this->newsModel->getPaginationControl();
    }

    public function printAddNewsToWebPage(){
        $menuController = new controller_controllerMenu();
        $newsController = new controller_controllerNews();
        $leftMenu = $menuController->getLeftMenuOptions();
        $topMenu = $menuController->getTopMenuOptions();
        $news = $newsController->getNewsWithPagination();
        $paginationControl = $newsController->getPaginationControl();

        if(isset($_SESSION['autenticado']) && count($_SESSION['autenticado'])){
            if(isset($_SESSION['role']) && count($_SESSION['role'])){
                if($_SESSION['role'] == 0){
                    include ROOT_DIR.'/view/view_header.php';
                    include ROOT_DIR.'/view/view_left_menu.php';
                    include ROOT_DIR.'/view/view_insert_news.php';
                    include ROOT_DIR.'/view/view_footer.php';
                }
            }
        }else{
            if($_SESSION['role'] == 0){
                include ROOT_DIR.'/view/view_header.php';
                include ROOT_DIR.'/view/view_left_menu.php';
                include ROOT_DIR.'/view/view_news_container.php';
                include ROOT_DIR.'/view/view_footer.php';
            }
        }


    }

}
?>