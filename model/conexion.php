<?php
// conexion a base de datos
$contrasena ="";
$usuario ="root";
$nombre_bd ="crud";

try{
    // creamos una instancia de la clase PDO
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$nombre_bd, 
        $usuario, $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => " SET NAMES utf8 ")
    );
}
catch(Exception $e) {
    echo "problema con la conexion: " . $e->getMessage();
}


?>