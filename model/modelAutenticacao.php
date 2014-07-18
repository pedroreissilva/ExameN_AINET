<?php
    class model_modelAutenticacao{

        public function __construct(){
        }


        public function autenticarUtilizador(){
            if(isset($_SESSION['errors'])){
                unset($_SESSION['errors']);
            }

            if((isset($_POST['username']) && count($_POST['username'])) && (isset($_POST['password']) && count($_POST['password']))){
                //verificar se existem campos vazios
                if(strlen($_POST['username']) == 0){
                    $_SESSION['errors']['username'] = "O campo do utilizador encontra se vazio";
                }
                if(strlen($_POST['password']) == 0){
                    $_SESSION['errors']['password'] = "O campo da password encontra se vazio";
                }


                if(isset($_SESSION['errors']) && count($_SESSION['errors']) != 0){

                }else{

                    //$hashed_password -> pass que está na base de dados
                    //if (crypt($password_introduzida_pelo user, $hashed_password) == $hashed_password) 

                    $hash_password = hash('sha512', $_POST['password']);

                    $query = "select username, password, tipo, nome_completo from utilizador where username = ? and password = ?";
                    $database = new model_modelDatabase();

                    $tipo = "";
                    $nome_completo = "";

                    $username = $database->conn->real_escape_string($_POST['username']);
                    $password = $database->conn->real_escape_string($hash_password);

                    if($database->isConnected()){
                        $resultado = $database->conn->prepare($query);
                        $resultado->bind_param("ss", $username, $password );

                        if($resultado->execute()){

                            $resultado->bind_result($username, $password, $tipo, $nome_completo);
                            if($resultado){
                                while($linha = $resultado->fetch()){
                                    $_SESSION['username'] = $linha;
                                    $_SESSION['autenticado'] = true;
                                    $_SESSION['role'] = $tipo;
                                    $_SESSION['name'] = $nome_completo;
                                }
                                $resultado->free_result();
                            }
                        }
                        //$resultado->close();
                    }
                    $database->conn->close();

                }
            }
        }

    }
?>