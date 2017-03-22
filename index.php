<?php
    echo "hola caracola";

    $usuario = $_POST['usuario'];
    $passw   = $_POST['password'];
    $mail    = $_POST['correo'];
    $clave   = $_POST['clave'];

    echo "datos pasados: \n";
    echo "usuario: " . $usuario . "\n";
    echo "password: " . $passw . "\n";
    echo "correo: " . $mail . "\n";
    echo "clave: " . $clave . "\n";


//   // Incorporar funciones
//   require_once 'funciones_bd.php';
//   $db = new funciones_BD();

//   $enlace = mysqli_connect("eu-cdbr-azure-west-d.cloudapp.net", "bf8fe44cc88880", "9e610bd0", "acsm_764524dac413151");

//   if (!$enlace) {
//       echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
//       echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
//       echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
//       exit;
//   }

//   echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
//   echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

//   $result = mysqli_query($enlace, "INSERT INTO usuario(login,pass,email) VALUES('$usuario', '$passw', '$mail')");
//   // comprobar si la inserccion es correcta y retornar resultado
//   if ($result) {
//       echo "ok";
//       return true;
//   } else {
//     echo "KO";
//       return false;
//   }

//   mysqli_close($enlace);
  
?>
