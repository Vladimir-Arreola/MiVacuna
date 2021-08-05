<?php 
    require_once "conexion.php";

    $idPersona = $_POST["personaEscondida"];
    $curp = $_POST["curp"];
    $estado = $_POST["estado"];
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellido"];
    $apellidoMaterno = $_POST["apellidoM"];
    $fechaPersona = $_POST["fechas"];
    $generoPersona = $_POST["genero"];

    $curp = strtoupper($curp);
    $nombre = strtoupper($nombre);
    $apellidoPaterno = strtoupper($apellidoPaterno); 
    $apellidoMaterno = strtoupper($apellidoMaterno);
    
    $sqlEstado = "SELECT nombre_estado FROM estados WHERE id_estado=" .$estado;
    $resultadoEstado = $conn->query($sqlEstado);
    $rowsEstados = $resultadoEstado->fetchAll();
    // echo gettype($fechaPersona);
    // echo strlen($fechaPersona);

    function ImprimirPersonas($registro){
        echo "<h1>" .$registro . "</h1>";
    }

    $sqlActualizar = "UPDATE personas SET id_persona = '$idPersona', curp = '$curp', nombre_persona = '$nombre', apellidop_persona = '$apellidoPaterno', apellidom_persona= '$apellidoMaterno', fecha_persona = '$fechaPersona', id_estado = '$estado', sexo_persona = '$generoPersona' WHERE id_persona = " .$idPersona;

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
    <title>Actualización de Persona</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
    <h2>Persona actualizada correctamente</h2>
    <div class="form-container">
                <div class="input-container" id="contenedor-id">
                    <label for="id">Numero:</label>
                    <div class="input-completo">
                        <?php echo $idPersona;?>
                    </div>
                </div>  

                <div class="input-container" id="contenedor-personas">
                    <label for="personas">Curp:</label>
                    <div class="input-completo">
                    <?php
                    
                        echo $curp;
                        
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

                <div class="input-container" id="contenedor-estados">
                    <label for="municipios">Nombre:</label>
                    <div class="input-completo">
                    <?php
                        echo $nombre;
                    ?>
                    </div>
                </div>     
                </div>
                <div class="form-container">
                    <div class="input-container" id="contenedor-postal">      
                        <label for="cp">Apellido Paterno:</label>
                        <div class="input-completo">
                            <?php echo $apellidoPaterno;?>
                        </div>
                    </div>               
                    <div class="input-container" id="contenedor-phone">                
                        <label for="telefono">Apellido Materno:</label>
                        <div class="input-completo">
                            <?php echo $apellidoMaterno;?>
                        </div>
                    </div>            
                    <div class="input-container" id="contenedor-phone2">
                        <label for="telefono2">Fecha de nacimiento:</label>
                        <div class="input-completo">
                            <?php echo $fechaPersona;?>
                        </div>
                    </div>
                </div>
                <div class="form-container">
                    <div class="input-container" id="contenedor-email">                
                        <label for="email">Genero:</label>
                        <div class="input-completo">
                            <?php echo $generoPersona;?>
                        </div>
                    </div>
            </div>
            <div class="form-container">
                <a class="boton boton-volver" href="personas.php">Volver</a>
            </div>
    </div>
</body>
</html>