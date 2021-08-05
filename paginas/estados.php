<?php 
    require_once "conexion.php";
    $sql = "SELECT * FROM estados";
    $final = $conn->query($sql);
    $rows = $final->fetchAll();
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
    <title>Estados</title>
</head>
<body>
    <header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <nav class="barra">
        <ul class="opciones"> 
            <a href="solicitudes.php" class="link">Solicitudes</a>
            <a href="estados.php" class="link"><li>Estados</li></a>
            <a href="municipios.php" class="link"><li>Municipios</li></a>
            <a href="personas.php" class="link"><li>Personas</li></a>
        </ul>
    </nav>
    <div class="contenedor-tablas">
    <h1>Estados registrados</h1>
        <table class="tabla-solicitud">
            <tr>
                <th>Id</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <?php
                foreach($rows as $row){                       
                ?>
                <td><?php echo $row["id_estado"];?></td>
                <td><?php echo $row["nombre_estado"];?></td>
                <td>
                    <a href="ver_estado.php?id=<?php echo $row["id_estado"];?>">Ver</a>
                    <a href="actualizar_estados.php?id=<?php echo $row["id_estado"];?>">Editar</a>
                    <a onclick="return PrevenirBorrado();" href="borrar_estado.php?id=<?php echo $row['id_estado']; ?>">Borrar</a>
                </td>
            </tr>
            <?php } $conn = null; ?>
        </table>
        <div class="contiene-enlaces">
                <a href="agregar_estados.php">Añadir un nuevo estado</a>
        </div>
    </div>
</body>
</html>