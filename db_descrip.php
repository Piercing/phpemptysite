<?php
    require_once (__DIR__ . '/Database/funciones_bd.php');
    require_once (__DIR__ . '/Models/Response.php');

    $id = $_GET['id'];

    $db = new funciones_BD();
    $result = $db->getBookById($id);
    $response = new Response($result);
    $jsonResponse = $response->getJSON();
    $response = null;
    echo $jsonResponse;
?>



