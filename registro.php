<?php
// Incorporar funciones
require_once 'funciones_bd.php';
$db = new funciones_BD();

// Nos devolvera un valor indicando si el registro fue correcto o no.
// 0 —> registro invalido –> el usuario ya existe
// 1 —> registro invalido –> el correo no es valido
// 2 —> registro invalido –> error de sistema
// 3 —> registro valido
// Esto lo devuelve el servidor y es lo que leera la app de android.
// Obtener los datos
$usuario = $_POST['usuario'];
$passw   = $_POST['password'];
$mail    = $_POST['correo'];
$clave   = $_POST['clave'];

// Decodificar valores en base64
/*
$usuario = base64_decode($usuario);
$passw   = base64_decode($passw);
$mail    = base64_decode($mail);
$clave   = base64_decode($clave);
*/

echo "datos pasados: \n";
echo "usuario: " . $usuario . "\n";
echo "password: " . $passw . "\n";
echo "correo: " . $mail . "\n";
echo "clave: " . $clave . "\n";

echo "INSERT INTO usuario(login,pass,email) VALUES('$usuario', '$passw', '$mail')\n";

// // Incorporar funciones
// require_once 'funciones_bd.php';
// $db = new funciones_BD();

// Comprobar si el usuario existe
if ($db->isuserexist($usuario, $passw)) {
    //echo(" Este usuario ya existe ingrese otro diferente!");
    // asignar resultado
    $resultado = "0";

} else {

    // verificar si el mail existe (hasta cierto punto), verificamos que el dominio existe
    // checkdnsrr — Comprueba registros DNS correspondientes a un nombre de host de Internet dado o dirección IP
    $dominio = explode('@', $mail); // devuelve un array
    if (!checkdnsrr($dominio[1])) {
        // asignar resultado
        $resultado = "1";
    } else {
        var $kk = $db->adduser2($usuario, $passw, $mail);
        echo "error: " . $kk;
        if ($db->adduser($usuario, $passw, $mail)) {
            echo " El usuario fue agregado a la Base de Datos correctamente.";

            // preparar y enviar mensaje
            $para      = $mail;
            $de        = 'admin@audiobooks.hol.es';
            $asunto    = 'AVISO: Registro efectuado';
            $mensaje   = "Bienvenido a audiobooks en español.\n" . "Los datos de registro son:\n\tUSUARIO: " . $usuario . "\n\tCLAVE: " . $clave . "\n\n http://www.audiobooks.hol.es";
            $cabecera  = "FROM: " . $de;
            //La direccion de correo desde donde supuestamente se envió
            $cabeceras = "From: admin@audiobooks.hol.es\n";
            //La direccion de correo a donde se responderá
            $cabeceras .= "Reply-To: admin@audiobooks.hol.es\n";
            // Enviar correo
            mail($para, $asunto, $mensaje, $cabeceras);

            // asignar resultado
            $resultado = "3";

        } else {
            //echo(" ha ocurrido un error.");
            // asignar resultado
            $resultado = "2";
        }
    }
}

//echo json_encode($resultado);
// Devolver resultado
echo $resultado;
?>


