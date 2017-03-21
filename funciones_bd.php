<?php

class funciones_BD
{

    private $db;

    // constructor
    function __construct()
    {

        // insertar conexion
        require_once 'connectbd.php';

        // conectar a la BD
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct()
    {
    }

    /**
     * agregar nuevo usuario
     */
    public function adduser($username, $password, $mail)
    {

        // Realizar insercción en la BD
        $result = mysql_query("INSERT INTO usuario(login,pass,email) VALUES('$username',
 '$password', '$mail')");
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
    public function isuserexist($username)
    {

        // Consulta sobre la BD
        $result   = mysqli_query("SELECT login FROM usuario WHERE login = '$username'");
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
        // Consulta sobre la BD
        $result = mysqli_query("SELECT COUNT(*) FROM usuario WHERE login='$user' AND pass='$passw' ");
        // Devuelve en numero de filas
        $count  = mysqli_fetch_row($result);
        /*como el usuario debe ser unico cuenta el numero de ocurrencias con esos datos*/
        if ($count[0] == 1) {
            return true;
        } else {
            return false;
        }
    }

} // funciones_BD

?>
