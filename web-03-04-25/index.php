<?php
include("registros_db/conexion.php");

$cursos_select = mysqli_query(mysql: $conexion, query: "SELECT id, nombre FROM curso") or
    die("Problemas en el select cursos" . mysqli_error(mysql: $conexion));

$alumnos = mysqli_query(mysql: $conexion, query: "SELECT codigo, nombre, mail FROM alumnos") or
    die("Problemas en el select alumnos" . mysqli_error(mysql: $conexion));

$cursos = mysqli_query(mysql: $conexion, query: "SELECT id, nombre, estado FROM curso") or
    die("Problemas en el select cursos" . mysqli_error(mysql: $conexion));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Menu Principal</h1>

    <h1>Registrar alumnos</h1>
    <form action="registros_db/registrar_alumno.php" method="post">
        Ingrese nombre:
        <input type="text" name="nombre"><br>
        Ingrese mail:
        <input type="text" name="mail"><br>
        Seleccione el curso:
        <select name="codigocurso">
            <?php while ($curso = mysqli_fetch_array($cursos_select)): ?>
                <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <section>
    <h1>Registrar curso</h1>
    <form action="registros_db/registrar_curso.php" method="post">
        Ingrese nombre del curso:
        <input type="text" id="nombre" name="nombre" required><br><br>
        Seleccione el estado del curso:
        <select name="estado">
            <option value="A">activo</option>
            <option value="I">inactivo</option>
        </select>
        <br>
        <input type="submit" value="Registrar">

    </form>
    </section>


    <h1>Lista de alumnos</h1>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Mail</th>
            <?php while ($alumno = mysqli_fetch_assoc($alumnos)): ?>
            <tr>
                <td><?= $alumno['codigo'] ?></td>
                <td><?= $alumno['nombre'] ?></td>
                <td><?= $alumno['mail'] ?></td>
            </tr>
        <?php endwhile; ?>

        </tr>
    </table>

    <h1>Lista de cursos </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Estado</th>
            <?php while ($curso = mysqli_fetch_assoc($cursos)): ?>
            <tr>
                <td><?= $curso['id'] ?></td>
                <td><?= $curso['nombre'] ?></td>
                <td><?= $curso['estado'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tr>
    </table>



    <section>
        <h1>Buscar alumno por mail</h1>
        <form action="registros_db/consulta_alumno.php" method="get">
            Ingrese mail:
            <input type="text" name="mail"><br>
            <input type="submit" value="Buscar">
        </form>
    </section>

    <section>
        <h1>Eliminar alumno por mail</h1>
        <form action="registros_db/eliminar_alumno.php" method="post">
            Ingrese mail del alumno a eliminar:
            <input type="email" name="mail" required><br>
            <input type="submit" value="Eliminar">
        </form>
    </section>

    <section>
        <h1>eliminar curso</h1>
        <form action="registros_db/eliminar_curso.php" method="post">
            Ingrese nombre del curso a eliminar:
            <input type="text" name="nombre" required><br>
            <input type="submit" value="Eliminar">
        </form>
    </section>

    <section>
        <h1>Eliminar todos los registros</h1>
        <form action="registros_db/eliminar_todo.php" method="post">
            <label>¿Qué deseas borrar?</label><br>
            <input type="radio" name="tabla" value="alumno"> Todos los alumnos<br>
            <input type="radio" name="tabla" value="curso"> Todos los cursos<br><br>
            <input type="submit" value="Eliminar todo">
        </form>
    </section>

    <section>
        <h1>Modificar alumnos</h1>
        <form action="registros_db/modificar_alumno.php" method="post">
            Correo actual: <input type="email" name="mail_viejo" required><br><br>
            Nuevo correo: <input type="email" name="mail_nuevo" required><br><br>
            <input type="submit" value="Actualizar correo">
        </form>
    </section>


</body>

</html>