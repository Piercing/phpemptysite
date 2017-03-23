<?php
    // Incorporar funciones
    require_once (__DIR__ . '/Database/funciones_bd.php');
    require_once (__DIR__ . '/Models/Response.php');

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

    $db = new funciones_BD();

    // Comprobar si el usuario existe
    if ($db->isuserexist($usuario, $passw)) {
        //echo(" Este usuario ya existe ingrese otro diferente!");
        // asignar resultado
        //$resultado = "0";
        $response = new Response(null, " Este usuario ya existe ingrese otro diferente!");
        $jsonResponse = $response->getJSON();
        $response = null;
        echo $jsonResponse;
    } else {
        // verificar si el mail existe (hasta cierto punto), verificamos que el dominio existe
        // checkdnsrr — Comprueba registros DNS correspondientes a un nombre de host de Internet dado o dirección IP
        $dominio = explode('@', $mail); // devuelve un array
        if (!checkdnsrr($dominio[1])) {
            // asignar resultado
            $response = new Response(null, " Introduzca una dirección de email válida");
            $jsonResponse = $response->getJSON();
            $response = null;
            echo $jsonResponse;
        } else {
            if ($db->adduser($usuario, $passw, $mail)) {
                //echo " El usuario fue agregado a la Base de Datos correctamente.";
                $result = $db->getUserByLogin($usuario, $passw);
                $response = new Response($result, "Se produjo un error al registrar al usuario");
                $jsonResponse = $response->getJSON();
                $response = null;
                
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

                echo $jsonResponse;
            } else {
                //echo(" ha ocurrido un error.");
                // asignar resultado
                //$resultado = "2";
                $response = new Response(null, " ha ocurrido un error.");
                $jsonResponse = $response->getJSON();
                $response = null;
                echo $jsonResponse;                
            }
        }
    }
?>


