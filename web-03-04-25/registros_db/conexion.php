<?php
$conexion = mysqli_connect("localhost", "root", "", "unisimon") or
    die("Error de conexion");
if (isset($conexion)) {
    echo "Conectando a la base de datos..." . "<br>";
    
} else {
    echo "Error de conexion";
}
?>