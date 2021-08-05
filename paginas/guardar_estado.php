<?php
    require_once "conexion.php";

    $idEstado = $_POST["id"];
    $estado = $_POST["estado"];

    $sqlAgrega = "SELECT * FROM estados WHERE id_estado=" .$idEstado;
    $resultados = $conn->query($sqlAgrega);
    $rows = $resultados->fetchAll();

    if(empty($rows)){
        $sqlInserta = "INSERT INTO estados(id_estado, nombre_estado)";
        $sqlInsertaDos = $sqlInserta . "VALUES('$idEstado', '$estado')";
        $conn->exec($sqlInsertaDos);
        $final = "<p class='success'>" . "El estado fue registrado en la base de datos" . "</p>";
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
    <title>Guardado de estados</title>
</head>
<body>
    <header class="cabecera-admin">
        <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <?php echo $final ?>
    <div class="form-container">
        <a class="boton boton-volver" href="estados.php">Volver al reporte</a>
    </div>
</body>
</html>