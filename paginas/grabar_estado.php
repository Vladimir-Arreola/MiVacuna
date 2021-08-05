<?php 
    require_once "conexion.php";

    $idEstado = $_POST["estadoEscondido"];
    $nombreEstado = $_POST["estado"];

    $sqlActualizar = "UPDATE estados SET id_estado = '$idEstado', nombre_estado = '$nombreEstado' WHERE id_estado = " .$idEstado;

    $conn->exec($sqlActualizar);
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
    <title>Actualización de Estado</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
        <h2>Estado actualizado correctamente</h2>
        <div class="form-container">
                    <div class="input-container" id="contenedor-id">
                        <label for="id">Numero:</label>
                        <div class="input-completo">
                            <?php echo $idEstado;?>
                        </div>
                    </div>  

                    <div class="input-container" id="contenedor-estados">
                        <label for="personas">Nombre:</label>
                        <div class="input-completo">
                        <?php
                        
                            echo $nombreEstado;
                            
                        ?>
                        </div>
                    </div> 
        </div>
                    <div class="form-container">
                        <a class="boton boton-volver" href="estados.php">Volver</a>
                    </div>
    </div>
</body>
</html>