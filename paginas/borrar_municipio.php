<?php 
    require_once "conexion.php";

    $idMunicipio = $_GET["id"];
    $idMunicipio = (int)$idMunicipio;

    if($idMunicipio == "" || is_null($idMunicipio) || !is_int($idMunicipio)){
        header("Location: error.php");
        exit;
    }
    
    $sqlConsulta = "SELECT M.id_municipio, M.nombre_municipio, E.nombre_estado FROM municipios M INNER JOIN estados E ON M.id_estado = E.id_estado WHERE id_municipio=" .$idMunicipio;
    $resultado = $conn->query($sqlConsulta);
    $rows = $resultado->fetchAll();

    $sqlEjecucion = "DELETE FROM municipios WHERE id_municipio=" .$idMunicipio;

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
    <title>Borrado de municipio</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
        <h2>Estado borrado correctamente</h2>
        <div class="form-container">
            <div class="input-container">
            <?php foreach($rows as $row){
                            ?>
                <label for="id">Numero:</label>
                <div class="input-completo">
                    <?php echo $row['id_municipio'];?>
                </div>
            </div>
            <div class="input-container" id="contenedor-estados">
                        <label for="personas">Nombre:</label>
                        <div class="input-completo">
                        <?php
                        
                            echo $row['nombre_municipio'];
                            
                        ?>
                        </div>
            </div> 
            <div class="input-container" id="contenedor-estados">
                <label for="personas">Estado:</label>
                    <div class="input-completo">
                        <?php
                            
                            echo $row['nombre_estado'];
                                
                        ?>
                    </div>
            </div> 
        </div>
        <div class="form-container">
                        <a class="boton boton-volver" href="municipios.php">Volver</a>
                    </div>
    </div>
    <?php } ?>
</body>
</html>