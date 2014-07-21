<?php
class controller_controllerMenu{

    private $menuModel;

    public function __construct(){
        $this->menuModel = new model_modelMenu();
    }


    public function getLeftMenuOptions(){
        return $leftMenuOptions = $this->menuModel->getLeftMenuOptions();
    }

    public function getTopMenuOptions(){
        return $topMenuOptions = $this->menuModel->getTopMenuOptions();
    }


}
?>