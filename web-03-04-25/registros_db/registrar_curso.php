<?php
if (!empty($_REQUEST)) {
     include("conexion.php");

     $sql="insert into curso(nombre,estado) values 
     ('$_POST[nombre]','$_POST[estado]')";

     mysqli_query($conexion,$sql)
        or die("Problemas en el select" . mysqli_error($conexion));

     mysqli_close($conexion);

     header("Location: ../index.php");

     
    }
?>