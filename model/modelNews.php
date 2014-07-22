<?php


    class model_modelNews {

        private $paginationControl;

        public function __construct(){
            $this->paginationControl = "";
        }

        public function getNewsWithPagination(){
            $numOfNews = $this->countNewsOnDataBase();
            $this->paginationControl = "";

            if($numOfNews != 0){

                $numOfNewsPerPage = 5;
                $numOfPages = ceil($numOfNews/$numOfNewsPerPage);

                if($numOfPages < 1){
                    $numOfPages = 1;
                }

                $pageNumber = 1;


                if(isset($_GET['page']) && count($_GET['page'])){
                    $pageNumber = preg_replace('#[^0-9]#','', $_GET['page']);
                }

                if($pageNumber < 1){
                    $pageNumber = 1;
                }else{
                    if($pageNumber > $numOfPages){
                        $pageNumber = $numOfPages;
                    }
                }

                $limit = 'LIMIT ' .($pageNumber - 1) * $numOfNewsPerPage .',' .$numOfNewsPerPage;


                $arrayNews = array();
                $query = "select noticia.id, noticia.corpo, noticia.created_at, noticia.resumo, noticia.seccao_id, noticia.titulo, noticia.updated_at, imagem.filename as imagem
                  from noticia join imagem
                  on noticia.id = imagem.noticia_id
                  $limit;";
                $database = new model_modelDatabase();

                if($database->isConnected()){
                    $result = $database->conn->query($query);
                    if($result){
                        while($line = $result->fetch_object()){
                            $arrayNews[$line->id] = new model_modelNewsObject($line->corpo, $line->created_at, $line->id, $line->resumo, $line->seccao_id, $line->titulo, $line->updated_at, $line->imagem);
                        }
                    }
                    $result->free_result();
                }
                $database->conn->close();





                if($numOfPages != 1){
                    if($pageNumber > 1){
                        $previewPage = $pageNumber - 1;
                        $this->paginationControl = '&nbsp;<a href = "'.$_SERVER['PHP_SELF'].'?page='.$previewPage.'">Anterior</a>';

                        for($i = 1; $i < $pageNumber; $i++){
                            $this->paginationControl .= '&nbsp;<a href = "'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a>';
                        }
                    }

                    $this->paginationControl.= $pageNumber;


                    if($pageNumber < $numOfPages){

                        for($i = $pageNumber + 1; $i < $numOfPages + 1; $i++){
                            $this->paginationControl .= '&nbsp;<a href = "'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a>';
                        }

                        $nextPage = $pageNumber + 1;
                        if($nextPage > $numOfPages){
                            $nextPage = $numOfPages;
                        }
                        $this->paginationControl .= '&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?page='.$nextPage.'">Proxima</a>';
                    }


                }


                return $arrayNews;
            }
        }


        /*
         * this method will count the number of news on Database
         * and will return this value.
         */
        public function countNewsOnDataBase(){
            $numOfNews = "";
            $query = "select count(id) from noticia;";
            $database = new model_modelDatabase();
            if($database->isConnected()){
                $result = $database->conn->query($query);
                if($result){
                    while($line = $result->fetch_row()){
                        $numOfNews = $line[0];
                    }
                }
                $result->free_result();
            }
            $database->conn->close();

            return $numOfNews;
        }


        public function getPaginationControl(){
            return $this->paginationControl;
        }
    }

?>