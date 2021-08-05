<?php 
    require_once "conexion.php";

    $idEstado = $_GET['id'];
    $idEstado = (int)$idEstado;
    
    if($idEstado == "" || is_null($idEstado) || !is_int($idEstado)){
        header("Location: error.php");
        exit;
    }

    $sqlConsulta = "SELECT * FROM estados WHERE id_estado=" .$idEstado;

    $resultado = $conn->query($sqlConsulta);
    $rows = $resultado->fetchAll();

    $sqlEjecucion = "DELETE FROM estados WHERE id_estado=" .$idEstado;

    $conn->query($sqlEjecucion);

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
    <title>Borrado de Estado</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
        <h2>Estado borrado correctamente</h2>
        <div class="form-container">
                    <div class="input-container" id="contenedor-id">
                        <?php foreach($rows as $row){
                            ?>
                        <label for="id">Numero:</label>
                        <div class="input-completo">
                            <?php echo $row['id_estado'];?>
                        </div>
                    </div>  

                    <div class="input-container" id="contenedor-estados">
                        <label for="personas">Nombre:</label>
                        <div class="input-completo">
                        <?php
                        
                            echo $row['nombre_estado'];
                            
                        ?>
                        </div>
                    </div> 
        </div>
                    <div class="form-container">
                        <a class="boton boton-volver" href="estados.php">Volver</a>
                    </div>
    </div>
    <?php } ?>
</body>
</html>