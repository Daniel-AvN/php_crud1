<!-- capturar informacion y procesarla -->

<?php
// print_r($_POST);

if( empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtNombre"]) || empty($_POST["txtSigno"]) ){
    
    header('Location: index.php?mensaje=falta');

    exit(); //salgo
}

include_once 'model/conexion.php';
$nombre = $_POST["txtNombre"];
$edad = $_POST["txtEdad"];
$signo = $_POST["txtSigno"];

// insertar personas

$sentencia= $bd->prepare("INSERT INTO persona(nombre, edad, signo) VALUES (?,?,?);");

$resultado= $sentencia->execute([$nombre,$edad,$signo] );

if ($resultado===TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}

?>