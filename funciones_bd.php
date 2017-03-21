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
    public function isuserexist($username)
    {

        // Consulta sobre la BD
        $result   = mysqli_query($this->con, "SELECT login FROM usuario WHERE login = '$username'");
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

    // public function login($user, $passw)
    // {
    //     // Consulta sobre la BD
    //     $result = mysqli_query($this->con, "SELECT COUNT(*) FROM usuario WHERE login='$user' AND pass='$passw' ");
    //     // Devuelve en numero de filas
    //     $count  = mysqli_fetch_row($result);
    //     /*como el usuario debe ser unico cuenta el numero de ocurrencias con esos datos*/
    //     if ($count[0] == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function login($user, $passw)
    {
        $jsonArray[] = array();
        $sql = "SELECT * FROM usuario WHERE login='$user' AND pass='$passw' ";
        if ($result = mysqli_query($this->con,$sql))
        {
            // Fetch one and one row
            if ($row = mysqli_fetch_row($result))
            {
                //printf ("%s (%s)\n", $row[0] ,$row[1]);
                $jsonArray.push($jsonArray, "{'id': $row[0]}");
        //         // $jsonArray.push($jsonArray, "{'login': $row[1]}");
        //         // $jsonArray.push($jsonArray, "{'email': $row[3]}");
        //         // $jsonArray.push($jsonArray, "{'cookie': $row[4]}");
        //         // $jsonArray.push($jsonArray, "{'validez': $row[5]}");
            }
            // Free result set
            mysqli_free_result($result);
        }
        //return "{value:10}";
        return $jsonArray;
    }

} // funciones_BD

?>
