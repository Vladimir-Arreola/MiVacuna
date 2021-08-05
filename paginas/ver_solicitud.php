<?php
    require_once "conexion.php";

    $solicitudSelec = $_GET["id"];

    $sql = "SELECT S.id_solicitud, P.curp, E.nombre_estado, M.nombre_municipio, S.cp, S.telefono, S.telefono_dos, S.email, S.email_dos FROM solicitud S INNER JOIN estados E on S.id_estado = E.id_estado INNER JOIN personas P on S.id_persona = P.id_persona INNER JOIN municipios M on S.id_municipio = M.id_municipio WHERE S.id_solicitud=" .$solicitudSelec;

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
    <title>Detalle de Solicitud</title>
</head>
<body>
<header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-tablas">
    <h1>Detalle del registro</h1>
    <table class="tabla-solicitud">
        <tr>
            <th>Folio</th>
            <th>Persona</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>CP</th>
            <th>Telefono</th>
            <th>Telefono alt</th>
            <th>Correo</th>
            <th>Correo alt</th>
            <th>Acciones</th>
        </tr>
        <tr>
            <?php
             foreach($rows as $row){

             
            ?>
            <td><?php echo $row["id_solicitud"];?></td>
            <td><?php echo $row["curp"];?></td>
            <td><?php echo $row["nombre_estado"];?></td>
            <td><?php echo $row["nombre_municipio"];?></td>
            <td><?php echo $row["cp"];?></td>
            <td><?php echo $row["telefono"];?></td>
            <td><?php echo $row["telefono_dos"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["email_dos"];?></td>
            <td><a href="solicitudes.php">Volver</a>
            <a href="actualizar_solicitud.php?id=<?php echo $row['id_solicitud'] ?>">Editar</a>
            <a href="">Borrar</a></td>
        </tr>
        <?php } $conn = null; ?>
    </table>
        <div class="contiene-enlaces">
            <a href="solicitudes.php">Volver al reporte general</a>
            <a href="">Añadir nueva solicitud</a>
        </div>
    </div>
</body>
</html>