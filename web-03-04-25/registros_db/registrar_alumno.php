<?php
if (!empty($_REQUEST)) {
     include("conexion.php");

     $sql="insert into alumnos(nombre,mail,codigocurso) values 
     ('$_POST[nombre]','$_POST[mail]',$_POST[codigocurso])";

     mysqli_query($conexion,$sql)
        or die("Problemas en el select" . mysqli_error($conexion));

     mysqli_close($conexion);

     header("Location: ../index.php");


    }
?>