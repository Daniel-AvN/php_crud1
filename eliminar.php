<?php

if(!isset($_GET['codigo'] ) ){
    header('Location: index.php?mensaje=error'); //si no se envia ningun dato
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];
$sentencia=$bd->prepare("DELETE FROM persona WHERE codigo =?;");
$resultado=$sentencia->execute( [$codigo] ); //ejecuta la sentencia de borrar con el $codigo q vale

if($resultado===TRUE){
  header("Location: index.php?mensaje=eliminado");
}else{
    header("Location: index.php?mensaje=error");
}
?>