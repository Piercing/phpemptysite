<?php
    // Nos devolvera un valor indicando si la validacion fue correcto o no.
    // 0 —> validacion incorrecta –> el usuario o contraseña no valida
    // 1 —> validacion correcta –> el correo no es valido
    // Esto lo devuelve el servidor y es lo que leera la app de android.
    // Obtener los datos
    $usuario = $_POST['usuario'];
    $passw   = $_POST['password'];

    // Decodificar valores en base64
    //$usuario = base64_decode($usuario);
    //$passw   = base64_decode($passw);

    // insertar funciones
    require_once 'funciones_bd.php';
    require_once (__DIR__ . '/Models/Response.php');

    $db = new funciones_BD();
    $result = $db->login($usuario, $passw);

    //header('Content-Type: application/json');
    //echo $result;
    //echo json_encode($result);
    var $response = new Response($result);

    echo ''; //$response.getJSON();
?>

