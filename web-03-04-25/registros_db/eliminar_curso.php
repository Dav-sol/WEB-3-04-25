<?php
if (!empty($_POST['nombre'])) {
    include("conexion.php");

    $nombre = $_POST['nombre'];

    $consulta = mysqli_query($conexion, "select * from curso where nombre='$nombre'");
    
    if (mysqli_num_rows($consulta) > 0) {

        $eliminar = mysqli_query($conexion, "delete from curso where nombre='$nombre'")
            or die("Error al eliminar: " . mysqli_error($conexion));
        
        echo "Curso $nombre eliminado correctamente.<br>";
    } else {
        echo "No existe un curso con ese nombre.<br>";
    }

    echo "<a href='/web-03-04-25/index.php'>Volver</a>";
    mysqli_close($conexion);

}
?>

