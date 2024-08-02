<?php

if(!isset($_POST['codigo'] ) ){
    header('Location: index.php?mensaje=error'); //si no se envia ningun dato
}

include 'model/conexion.php';
$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$edad = $_POST['txtEdad'];
$signo = $_POST['txtSigno'];

$sentencia=$bd->prepare("UPDATE persona SET nombre =?, edad=?, signo=? where codigo=?;");
$resultado=$sentencia->execute( [$nombre, $edad, $signo, $codigo] ); //ejecuta la sentencia

if($resultado===TRUE){
  header("Location: index.php?mensaje=editado");
}else{
    header("Location: index.php?mensaje=error");
}
?>