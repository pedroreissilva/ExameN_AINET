<?php

class model_modelDatabase{

    public $conn;

    public function __construct(){

        include ROOT_DIR.'/config/dbaccess.php';
        //FIXME - Devemos fazer a ligação a base de dados tal como está nos slides
        //@ $this->conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        @ $this->conn = new mysqli($host,$user,$pass,$database);

        if($this->isConnected()){
            $this->conn->set_charset('utf8');
        }
    }

    public function isConnected(){
        return ($this->conn && !$this->conn->connect_errno);
    }


}