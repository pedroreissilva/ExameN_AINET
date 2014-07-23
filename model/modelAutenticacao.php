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

                    $hash_password = "";
                    //$hash_password = hash('sha512', $_POST['password']);

                    $query = "select username, password, perfil, nome from utilizador where username = ?;";  /*and password = ?*/
                    $database = new model_modelDatabase();

                    $perfil = "";
                    $nome = "";

                    $user = $database->conn->real_escape_string($_POST['username']);
                    $pass = $database->conn->real_escape_string($_POST['password']);

                    if($database->isConnected()){
                        $resultado = $database->conn->prepare($query);
                        $resultado->bind_param("s", $user);

                        if($resultado->execute()){
                            $resultado->bind_result($username, $password, $perfil, $nome);
                            if($resultado){
                                while($linha = $resultado->fetch()){
                                    $_SESSION['username'] = $linha;
                                    $_SESSION['role'] = $perfil;
                                    $_SESSION['name'] = $nome;
                                    $hash_password = $password;
                                }
                                if(crypt($pass, $hash_password) == $hash_password){
                                    $_SESSION['autenticado'] = true;
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