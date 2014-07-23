<?php
    session_start();

    include_once '../config/commons.php';

    $newsController = new controller_controllerNews();

    $newsController->printAddNewsToWebPage();

?>

