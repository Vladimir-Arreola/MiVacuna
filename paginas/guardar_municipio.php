<?php 
    require_once "conexion.php";

    $idMunicipio = $_POST["id"];
    $idEstado = $_POST["estado"];
    $nombreMunicipio = $_POST["municipio"];
    $nombreMunicipio = ucfirst($nombreMunicipio);

    $sqlAgrega = "SELECT * FROM municipios WHERE id_municipio=" .$idMunicipio;
    $resultados = $conn->query($sqlAgrega);
    $rows = $resultados->fetchAll();

    if(empty($rows)){
        $sqlInserta = "INSERT INTO municipios(id_municipio, nombre_municipio, id_estado)";
        $sqlInsertaDos = $sqlInserta . "VALUES('$idMunicipio', '$nombreMunicipio', '$idEstado')";

        $conn->exec($sqlInsertaDos);
        $final = "<p class='success'>" . "El municipio fue registrado en la base de datos" . "</p>";
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
    <title>Guardado de municipios</title>
</head>
<body>
    <header class="cabecera-admin">
        <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <?php echo $final ?>
    <div class="form-container">
        <a class="boton boton-volver" href="municipios.php">Volver al reporte</a>
    </div>
</body>
</html>