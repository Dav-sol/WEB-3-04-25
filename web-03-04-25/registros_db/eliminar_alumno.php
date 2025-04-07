<?php
if (!empty($_POST['mail'])) {
    include("conexion.php");

    $mail = $_POST['mail'];

    $consulta = mysqli_query($conexion, "select * from alumnos where mail='$mail'");
    
    if (mysqli_num_rows($consulta) > 0) {

        $eliminar = mysqli_query($conexion, "delete from alumnos where mail='$mail'")
            or die("Error al eliminar: " . mysqli_error($conexion));
        
        echo "Alumno con mail $mail eliminado correctamente.<br>";
    } else {
        echo "No existe un alumno con ese mail.<br>";
    }

    echo "<a href='/web-03-04-25/index.php'>Volver</a>";
    mysqli_close($conexion);
} 
?>

