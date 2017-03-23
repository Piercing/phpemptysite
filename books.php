<?php
    require_once (__DIR__ . '/Database/funciones_bd.php');
    require_once (__DIR__ . '/Models/Response.php');

    $db = new funciones_BD();
    $result = $db->getAllBooks();
    $response = new Response($result);
    $jsonResponse = $response->getJSON();
    $response = null;
    echo $jsonResponse;
?>

