<?php

// Nos devolvera la descripcion del registro especificado
// Esto lo devuelve el servidor y es lo que leera la app de android.
// Obtener los datos
$_id = $_POST['_id'];

// Incorporar funciones
require_once (__DIR__ . '/Database/funciones_bd.php');
$db = new funciones_BD();
$con = $db->connect();

// Obtener la descripcion del registro especificado
$sql = mysqli_query($con, "SELECT descripcion from audiolibros WHERE id = '$_id'");

//número de filas retornadas
$num_rows = mysql_num_rows($sql);

// Obtener valor obtenido
if ($num_rows > 0) {
    // el registro existe
    $row       = mysql_fetch_array($sql);
    $resultado = $row["descripcion"];
} else {
    // no existe
    $resultado = null;
}

//echo json_encode($resultado);
// Devolver valor obtenido
echo $resultado;
?>



