<?php
    define('ROOT_DIR', dirname(__DIR__));

    spl_autoload_register(function ($class) {
            $ds = DIRECTORY_SEPARATOR;
            // ROOT_DIR is your root directory
            require_once ROOT_DIR . $ds . str_replace('_', $ds, $class).'.php';
            //echo "ROOT_DIR . $ds .str_replace('_', $ds, $class).'.php'";
            //ExameAinet20122013/model/nome da classe.php
        }
    );
?>