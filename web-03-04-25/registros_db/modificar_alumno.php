<?php

if(!empty($_POST['mail_viejo'])&&!empty($_POST['mail_nuevo'])){
    include("conexion.php");

    $mail_viejo = $_POST['mail_viejo'];
    $mail_nuevo = $_POST['mail_nuevo'];

    $sql="update alumnos set mail='$mail_nuevo' where mail='$mail_viejo'";

    mysqli_query($conexion, $sql) or die("Problemas en el select: " . mysqli_error($conexion));
    echo "El correo electrónico ha sido actualizado de $mail_viejo a $mail_nuevo.";
    echo "<br><a href='../index.php'>Volver</a>";

    mysqli_close($conexion);
}
else{
    echo "Por favor, complete todos los campos.";
    echo "<br><a href='../index.php'>Volver</a>";
}

?>