<?php

    class funciones_BD
    {

        private $db;
        private $con;

        // constructor
        function __construct()
        {
            // insertar conexion
            require_once 'connectbd.php';

            // conectar a la BD
            $this->db = new DB_Connect();
            $this->con = $this->db->connect();
        }

        // destructor
        function __destruct()
        {
            mysqli_close($this->con);
        }

        /**
        * agregar nuevo usuario
        */
        public function adduser($username, $password, $mail)
        {
            // Realizar insercción en la BD
            $result = mysqli_query($this->con, "INSERT INTO usuario(login,pass,email) VALUES('$username', '$password', '$mail')");
            // comprobar si la inserccion es correcta y retornar resultado
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        /**
        * Verificar si el usuario ya existe por el username
        */
        public function isuserexist($username, $passw)
        {
            // Consulta sobre la BD
            $result   = mysqli_query($this->con, "SELECT login FROM usuario WHERE login = '$username' and pass='$passw'");
            //numero de filas retornadas
            $num_rows = mysqli_num_rows($result);

            // retornar resultado
            if ($num_rows > 0) {
                // el usuario existe
                return true;
            } else {
                // no existe
                return false;
            }
        }

        public function login($user, $passw)
        {
            $sql = "SELECT * FROM usuario WHERE login='$user' AND pass='$passw' ";
            if ($result = mysqli_query($this->con,$sql))
            {
                return $result;
            }
            return null;
        }

        public function getUserByLogin($user, $passw)
        {
            $sql = "SELECT * FROM usuario WHERE login='$user' AND pass='$passw' ";
            if ($result = mysqli_query($this->con,$sql))
            {
                return $result;
            }
            return null;
        }        

        public function getUserById($id)
        {
            $sql = "SELECT * FROM usuario WHERE idUsuario=$id ";
            if ($result = mysqli_query($this->con,$sql))
            {
                return $result;
            }
            return null;
        }


        public function getAllUsers()
        {
            $sql = "SELECT * FROM usuario order by idUsuario ";
            if ($result = mysqli_query($this->con,$sql))
            {
                return $result;
            }
            return null;
        }

        public function getAllBooks()
        {
            $sql = "SELECT id, titulo, autor, tema, descripcion, imagen2, mp3 FROM audiolibros ";
            if ($result = mysqli_query($this->con,$sql))
            {
                return $result;
            }
            return null;
        }

        public function getBookById($id)
        {
            $sql = "SELECT id, titulo, autor, tema, descripcion, imagen2, mp3 FROM audiolibros WHERE id = '$id' ";
            if ($result = mysqli_query($this->con,$sql)) {
                return $result;
            }
            return null;
        }        


    } // funciones_BD

?>
