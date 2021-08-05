<?php
    require_once "conexion.php";

    $idSolicitud = $_POST["idEscondido"];
    $idSolicitud = (int)$idSolicitud;
    $estado = $_POST["selecc-estado"];
    $municipio = $_POST["municipios"];
    $codigoP = $_POST["cp"];
    $telefono = $_POST["telefono"];
    $telefonoDos = $_POST["telefono2"];
    $email = $_POST["email"];
    $emailDos = $_POST["email2"];

    $idPersona = $_POST["personaEscondida"];

    $sqlPersona = "SELECT curp FROM personas WHERE id_persona=" .$idPersona;
    $resultPersona = $conn->query($sqlPersona);
    $rowsPeoples = $resultPersona->fetchAll();
    
    $sqlEstado = "SELECT nombre_estado FROM estados WHERE id_estado=" .$estado;
    $resultadoEstado = $conn->query($sqlEstado);
    $rowsEstados = $resultadoEstado->fetchAll();

    $sqlMunicipio = "SELECT nombre_municipio FROM municipios WHERE id_municipio=" .$municipio;
    $resultadoMunicipio = $conn->query($sqlMunicipio);
    $rowsMunicipios = $resultadoMunicipio->fetchAll();


    $sqlActualizar = "UPDATE solicitud SET id_solicitud = '$idSolicitud', id_persona = '$idPersona',
    id_estado = '$estado', id_municipio = $municipio, cp = '$codigoP', telefono = '$telefono', 
    telefono_dos = '$telefonoDos', email = '$email', email_dos = '$emailDos' WHERE id_solicitud= " .$idSolicitud;

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
    <title>Actualización de Solicitud</title>
</head>
<body>
<header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
    <h2>Solicitud actualizada correctamente</h2>
        <div class="form-container">
            <div class="input-container" id="contenedor-id">
                <label for="id">Folio:</label>
                <div class="input-completo">
                    <?php echo $idSolicitud;?>
                </div>
            </div>  

            <div class="input-container" id="contenedor-personas">
                <label for="personas">Curp:</label>
                <div class="input-completo">
                <?php
                    foreach($rowsPeoples as $rowPeople){
                    echo $rowPeople['curp'];
                    }
                ?>
                </div>
            </div>     

            <div class="input-container" id="contenedor-entidad">
                <label for="estados">Estado:</label>
                <div class="input-completo">
                <?php
                    foreach($rowsEstados as $rowEstado){
                    echo $rowEstado['nombre_estado'];
                    }
                ?>
                </div>
            </div>     

            <div class="input-container" id="contenedor-municipios">
                <label for="municipios">Municipio:</label>
                <div class="input-completo">
                <?php
                    foreach($rowsMunicipios as $rowMunicipio){
                    echo $rowMunicipio['nombre_municipio'];
                    }
                ?>
                </div>
            </div>     
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-postal">      
                    <label for="cp">Código Postal:</label>
                    <div class="input-completo">
                        <?php echo $codigoP;?>
                    </div>
                </div>               
                <div class="input-container" id="contenedor-phone">                
                    <label for="telefono">Telefono:</label>
                    <div class="input-completo">
                        <?php echo $telefono;?>
                    </div>
                </div>            
                <div class="input-container" id="contenedor-phone2">
                    <label for="telefono2">Telefono2:</label>
                    <div class="input-completo">
                        <?php echo $telefonoDos;?>
                    </div>
                </div>
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-email">                
                    <label for="email">Email:</label>
                    <div class="input-completo">
                        <?php echo $email;?>
                    </div>
                </div>
                <div class="input-container" id="contenedor-email2">            
                    <label for="email2">Email de apoyo:</label>
                   <div class="input-completo">
                   <?php echo $emailDos;?>
                   </div>
                </div>
        </div>
        <div class="form-container">
            <a class="boton boton-volver" href="solicitudes.php">Volver</a>
        </div>
</body>
</html>