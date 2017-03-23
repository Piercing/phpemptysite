<?php

    class DB_Connect
    {
        // constructor
        function __construct() {}

        // destructor
        function __destruct() {} 

        // Conectar la BD
        public function connect()
        {
            // Importar constantes
            require_once 'config.php';
            // conectar mysql
            $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

            // devuelve el manejador de la BD
            return $con;
        }

        // Cerrar la conexión de la BD
        public function close($con)
        {
            mysqli_close($con);
        }
    }
?>
