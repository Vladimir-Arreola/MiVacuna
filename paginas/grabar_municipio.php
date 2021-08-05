<?php 
    require_once "conexion.php";

    $idMunicipio = $_POST["municipioEscondido"];
    $idEstado = $_POST["estado"];
    $nombreMunicipio = $_POST["municipio"];

    $sqlActualizar = "UPDATE municipios SET id_municipio= '$idMunicipio', nombre_municipio = '$nombreMunicipio', id_estado = '$idEstado' WHERE id_municipio =" .$idMunicipio;

    $sqlEstado = "SELECT * FROM estados WHERE id_estado=" .$idEstado;
    $final = $conn->query($sqlEstado);
    $rowsEstados = $final->fetchAll();

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
    <title>Actualización de Municipio</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
        <h2>Municipio actualizado correctamente</h2>
        <div class="form-container">
                    <div class="input-container" id="contenedor-id">
                        <label for="id">Numero:</label>
                        <div class="input-completo">
                            <?php echo $idMunicipio;?>
                        </div>
                    </div>  

                    <div class="input-container" id="contenedor-estado">
                        <label for="estado">Estado:</label>
                        <div class="input-completo">
                            <?php foreach($rowsEstados as $rowEstado){
                                echo $rowEstado["nombre_estado"];
                            };?>
                        </div>
                    </div>  

                    <div class="input-container" id="contenedor-municipios">
                        <label for="municipios">Nombre:</label>
                        <div class="input-completo">
                        <?php
                        
                            echo $nombreMunicipio;
                            
                        ?>
                        </div>
                    </div> 
        </div>
                    <div class="form-container">
                        <a class="boton boton-volver" href="municipios.php">Volver</a>
                    </div>
    </div>
</body>
</html>