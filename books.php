<?php
    require_once (__DIR__ . '/Database/funciones_bd.php');
    require_once (__DIR__ . '/Models/Response.php');

    // $usuario = $_POST['usuario'];
    // $passw   = $_POST['password'];

    $db = new funciones_BD();
    $result = $db->getAllBooks();

    $response = new Response($result);
    echo $response->getJSON();
?>

