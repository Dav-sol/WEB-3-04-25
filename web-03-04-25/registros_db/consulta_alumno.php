<?php 
if (!empty($_GET['mail'])) {  
    include("conexion.php");

    $email = $_GET['mail'];  
    
    $sql="select * from alumnos where mail='$email'";
    
    $alumnos = mysqli_query($conexion, $sql) 
        or die("Problemas en el select: " . mysqli_error($conexion));
    
    mysqli_close($conexion);

    if (mysqli_num_rows($alumnos) > 0) {
        while ($alumno = mysqli_fetch_array($alumnos)) {
        echo "Código: " . $alumno['codigo'] . "<br>";
        echo "Nombre: " . $alumno['nombre'] . "<br>";
        echo "Curso: " . $alumno['codigocurso'] . "<br>";
        echo "Mail: " . $alumno['mail'] . "<br>";
        echo "<br><a href='../index.php'>Volver</a>";

        }
    } else {
        echo "No se encontraron resultados para el correo electrónico: $email";
        echo "<br><a href='../index.php'>Volver</a>";
    }
        

}
?>



