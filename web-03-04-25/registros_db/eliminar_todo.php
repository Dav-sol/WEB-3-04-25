<?php
if (!empty($_POST['tabla'])) {
    include("conexion.php");

    $tabla = $_POST['tabla'];

    if ($tabla === "alumno" || $tabla === "curso") {
        $sql="delete from $tabla";
         if (mysqli_query($conexion, $sql)){
            echo "Se eliminaron todos los registros de la tabla $tabla";
        } else {
            echo "Error al eliminar los registros: " . mysqli_error($conexion);
         }

        echo "<br><a href='../index.php'>Volver</a>";

    }
    mysqli_close($conexion);

}
?>