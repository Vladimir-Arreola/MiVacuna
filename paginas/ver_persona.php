<?php
    require_once "conexion.php";

    $personaSelec = $_GET["id"];

    $sql = "SELECT P.id_persona, P.curp, P.nombre_persona, P.apellidop_persona, P.apellidom_persona, P.fecha_persona, E.nombre_estado,  P.sexo_persona FROM personas P INNER JOIN estados E on P.id_estado = E.id_estado WHERE id_persona=" .$personaSelec;

    $resultado = $conn->query($sql);
    $rows = $resultado->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/no-margin.css">
    <script src="../js/validations.js"></script>
    <title>Detalle de Persona</title>
</head>
<body>
<header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-tablas">
    <h1>Personas registradas</h1>
        <table class="tabla-solicitud">
            <tr>
                <th>Id</th>
                <th>CURP</th>
                <th>Nombres</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Fecha de Nacimiento</th>
                <th>Entidad</th>
                <th>Genero</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <?php
                foreach($rows as $row){

                
                ?>
                <td><?php echo $row["id_persona"];?></td>
                <td><?php echo $row["curp"];?></td>
                <td><?php echo $row["nombre_persona"];?></td>
                <td><?php echo $row["apellidop_persona"];?></td>
                <td><?php echo $row["apellidom_persona"];?></td>
                <td><?php echo $row["nombre_estado"];?></td>
                <td><?php echo $row["fecha_persona"];?></td>
                <td><?php echo $row["sexo_persona"];?></td>
                <td>
                    <a href="ver_persona.php?id=<?php echo $row["id_persona"];?>">Ver</a>
                    <a href="actualizar_persona.php?id=<?php echo $row["id_persona"];?>">Editar</a>
                    <a onclick="return PrevenirBorrado();" href="borrar_persona.php?id=<?php echo $row['id_persona']; ?>">Borrar</a>
                </td>
            </tr>
            <?php } $conn = null; ?>
        </table>
    </div>
    <div class="form-container">
        <a class="boton boton-volver" href="personas.php">Volver al reporte</a>
    </div>
</body>
</html>