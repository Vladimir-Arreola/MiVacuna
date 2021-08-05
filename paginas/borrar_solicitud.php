<?php 
    require_once "conexion.php";

    $idSolicitud = $_GET['id'];

    $idSolicitud = (int)$idSolicitud;

    if($idSolicitud == "" || is_null($idSolicitud) || !is_int($idSolicitud)){
        header("Location: solicitud_inexistente.php");
        exit;
    }


    $sqlConsulta = "SELECT S.id_solicitud, P.curp, E.nombre_estado, M.nombre_municipio, S.cp, S.telefono, S.telefono_dos, S.email, S.email_dos FROM solicitud S INNER JOIN estados E on S.id_estado = E.id_estado INNER JOIN personas P on S.id_persona = P.id_persona INNER JOIN municipios M on S.id_municipio = M.id_municipio WHERE S.id_solicitud=" .$idSolicitud;

    $resultado = $conn->query($sqlConsulta);

    $rows = $resultado->fetchAll();

    $sqlEjecucion = "DELETE FROM solicitud WHERE id_solicitud=" .$idSolicitud;

    $conn->exec($sqlEjecucion);

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
    <title>Borrar solicitud</title>
</head>
<body>
    <header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
    <h2>Solicitud borrada correctamente</h2>
        <div class="form-container">
            <div class="input-container" id="contenedor-id">
                <label for="id">Folio:</label>
                <div class="input-completo">
                    <?php

                    foreach($rows as $row){
                    
                    echo $row['id_solicitud'];?>
                </div>
            </div>  

            <div class="input-container" id="contenedor-personas">
                <label for="personas">Curp:</label>
                <div class="input-completo">
                <?php
                   
                    echo $row['curp'];
                    
                ?>
                </div>
            </div>     

            <div class="input-container" id="contenedor-entidad">
                <label for="estados">Estado:</label>
                <div class="input-completo">
                <?php
                    echo $row['nombre_estado'];
                ?>
                </div>
            </div>     

            <div class="input-container" id="contenedor-municipios">
                <label for="municipios">Municipio:</label>
                <div class="input-completo">
                <?php              
                    echo $row['nombre_municipio'];
                ?>
                </div>
            </div>     
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-postal">      
                    <label for="cp">Código Postal:</label>
                    <div class="input-completo">
                        <?php echo $row['cp'];?>
                    </div>
                </div>               
                <div class="input-container" id="contenedor-phone">                
                    <label for="telefono">Telefono:</label>
                    <div class="input-completo">
                        <?php echo $row['telefono'];?>
                    </div>
                </div>            
                <div class="input-container" id="contenedor-phone2">
                    <label for="telefono2">Telefono2:</label>
                    <div class="input-completo">
                    <?php echo $row['telefono_dos'];?>
                    </div>
                </div>
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-email">                
                    <label for="email">Email:</label>
                    <div class="input-completo">
                        <?php echo $row['email'];?>
                    </div>
                </div>
                <div class="input-container" id="contenedor-email2">            
                    <label for="email2">Email de apoyo:</label>
                   <div class="input-completo">
                   <?php echo $row['email_dos'];?>
                   </div>
                </div>
        </div>
        <div class="form-container">
            <a class="boton boton-volver" href="solicitudes.php">Volver</a>
        </div>
        <?php } ?>
</body>
</html>