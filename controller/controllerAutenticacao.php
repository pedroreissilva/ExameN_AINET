<?php
class controller_controllerAutenticacao{


    public function __construct(){
    }

    public function autenticarUtilizador(){
        $autenticacao = new model_modelAutenticacao();
        $autenticacao->autenticarUtilizador();
    }


}
?>