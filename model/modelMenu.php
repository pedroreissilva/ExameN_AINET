<?php


class model_modelMenu {

    private $database;

    public function __construct(){

    }


    public function getLeftMenuOptions(){
        $this->database = new model_modelDatabase();
        $this->database->conn;
        $arrayLeftMenuOptions = array();
        $query = "select id, designacao from hashtag;";

        if($this->database->isConnected()){
            $result = $this->database->conn->query($query);
            if($result){
                while($line = $result->fetch_object()){
                    $arrayLeftMenuOptions[$line->id] = $line->designacao;
                }
            }
            $result->free_result();
        }
        $this->database->conn->close();

        return $arrayLeftMenuOptions;
    }


    public function getTopMenuOptions(){
        $this->database = new model_modelDatabase();
        $this->database->conn;
        $arraytopMenuOptions = array();
        $query = "select id, designacao from seccao;";


        if($this->database->isConnected()){
            $result = $this->database->conn->query($query);
            if($result){
                while($line = $result->fetch_object()){
                    $arraytopMenuOptions[$line->id] = $line->designacao;
                }
            }
            $result->free_result();
        }
        $this->database->conn->close();


        return $arraytopMenuOptions;
    }


}

?>