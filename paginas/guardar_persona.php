<?php

    function ImprimirPersonas($registro){
        echo "<h1>" .$registro . "</h1>";
    }
    require_once "conexion.php";

    $idPersona = $_POST["id"];
    $curpPersona = $_POST["curp"];
    $estadoPersona = $_POST["estado"];
    $nombrePersona = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellido"];
    $apellidoMaterno = $_POST["apellidoM"];
    $fechaPersona = $_POST["fechas"];
    $generoPersona = $_POST["genero"];

    $curpPersona = strtoupper($curpPersona);
    $nombrePersona = strtoupper($nombrePersona);
    $apellidoPaterno = strtoupper($apellidoPaterno); 
    $apellidoMaterno = strtoupper($apellidoMaterno);

    $sqlAgrega = "SELECT * FROM personas WHERE id_persona=" .$idPersona;
    $resultados = $conn->query($sqlAgrega);
    $rows = $resultados->fetchAll();
    
    if(empty($rows)){
        $sqlInserta = "INSERT INTO personas(id_persona, curp, nombre_persona, apellidop_persona, apellidom_persona, fecha_persona, id_estado, sexo_persona)";

        $sqlInsertados = $sqlInserta . "VALUES('$idPersona', '$curpPersona', '$nombrePersona', '$apellidoPaterno', '$apellidoMaterno', '$fechaPersona', '$estadoPersona', '$generoPersona')";

        $conn->exec($sqlInsertados);
        $final = "<p class='success'>" . "La persona fue registrada en la base de datos" . "</p>";
    }else{
        $final = "<p class='error'>" . "No se ha guardado nada :(" . "</p>";
    }


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
    <title>Guardado de personas</title>
</head>
<body>
    <header class="cabecera-admin">
        <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <?php echo $final ?>
    <div class="form-container">
        <a class="boton boton-volver" href="personas.php">Volver al reporte</a>
    </div>
</body>
</html>