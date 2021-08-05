<?php 
    require_once "conexion.php";

    $idPersona = $_GET['id'];

    $idPersona = (int)$idPersona;

    if($idPersona == "" || is_null($idPersona) || !is_int($idPersona)){
        header("Location: error.php");
        exit;
    }

    $sqlConsulta = "SELECT P.id_persona, P.curp, P.nombre_persona, P.apellidop_persona, P.apellidom_persona, P.fecha_persona, E.id_estado, E.nombre_estado, P.sexo_persona FROM personas P INNER JOIN estados E on P.id_estado = E.id_estado WHERE P.id_persona=" .$idPersona;

    $resultado = $conn->query($sqlConsulta);
    $rows = $resultado->fetchAll();

    $sqlEjecucion = "DELETE FROM personas WHERE id_persona=" .$idPersona;

    //Ejecutamos la consulta para borrar
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
    <title>Actualización de Persona</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-actualizado sombra">
    <h2>Persona borrada correctamente</h2>
    <div class="form-container">
                <div class="input-container" id="contenedor-id">
                    <label for="id">Numero:</label>
                    <div class="input-completo">
                        <?php foreach($rows as $row){
                            echo $row['id_persona'];
                        ?>
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

                <div class="input-container" id="contenedor-estados">
                    <label for="municipios">Nombre:</label>
                    <div class="input-completo">
                    <?php
                        echo $row['nombre_persona'];
                    ?>
                    </div>
                </div>     
                </div>
                <div class="form-container">
                    <div class="input-container" id="contenedor-postal">      
                        <label for="cp">Apellido Paterno:</label>
                        <div class="input-completo">
                            <?php echo $row['apellidop_persona'];?>
                        </div>
                    </div>               
                    <div class="input-container" id="contenedor-phone">                
                        <label for="telefono">Apellido Materno:</label>
                        <div class="input-completo">
                            <?php echo $row['apellidom_persona'];?>
                        </div>
                    </div>            
                    <div class="input-container" id="contenedor-phone2">
                        <label for="telefono2">Fecha de nacimiento:</label>
                        <div class="input-completo">
                            <?php echo $row['fecha_persona'];?>
                        </div>
                    </div>
                </div>
                <div class="form-container">
                    <div class="input-container" id="contenedor-email">                
                        <label for="email">Genero:</label>
                        <div class="input-completo">
                            <?php echo $row['sexo_persona'];?>
                        </div>
                    </div>
            </div>
            <div class="form-container">
                <a class="boton boton-volver" href="personas.php">Volver</a>
            </div>
    </div>
    <?php } ?>
</body>
</html>