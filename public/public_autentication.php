<?php
    session_start();

    include_once '../config/commons.php';

    $autenticatioControl = new controller_controllerAutenticacao();
    $autenticatioControl->autenticarUtilizador();

    header("Location: public_home.php");

?>