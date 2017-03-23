<?php
    require_once (__DIR__ . '/Database/funciones_bd.php');
    require_once (__DIR__ . '/Models/Response.php');

    $usuario = $_POST['usuario'];
    $passw   = $_POST['password'];

    $db = new funciones_BD();
    $result = $db->login($usuario, $passw);
    $response = new Response($result);
    $jsonResponse = $response->getJSON();
    $response = null;
    echo $jsonResponse;
?>