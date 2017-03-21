<?php
// Importar constantes
require_once 'config.php';

// Conectar y seleccionar BD
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_DATABASE);

// Obtener resultados según selección en BD
$sql = mysql_query("SELECT id, titulo, autor, tema, descripcion, mp3 FROM audiolibros ORDER BY
 autor, titulo ASC");

// Recorrer array obtenido y codificar en json
while ($row = mysql_fetch_assoc($sql))
    $output[] = $row;
$jsonencoded = json_encode($output);

// Hay que indicar la ruta para crear desde cronjob
$filename = "/home/u541002700/public_html/WebService/catalogo.json";

// Guardar en un fichero el resultado convertido en json
$fh = fopen($filename, 'w');
fwrite($fh, $jsonencoded);
fclose($fh);
print($jsonencoded);

// Cerrar conexión a la BD
mysql_close();
?>




