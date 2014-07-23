<?php
    session_start();

    include_once '../config/commons.php';

    $homeController = new controller_controllerHome();

    $homeController->printHomeView();

?>