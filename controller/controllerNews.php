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


}
?>