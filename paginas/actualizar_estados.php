<?php 
    require_once "conexion.php";
    
    $estadoSelec = $_GET["id"];

    $sql = "SELECT * FROM estados WHERE id_estado=" .$estadoSelec;
    $resultado = $conn->query($sql);
    $rows = $resultado;
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
    <script src="../js/validations.js"></script>
    <title>Actualizar estado</title>
</head>
<body>
    <header class="cabecera-admin">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-tablas sombra">
            <h2>Agregar registro</h2>
            <form action="grabar_estado.php" method="post" id="actual" class="form-update" onsubmit="return ValidarEstados();">
            <?php
                foreach($rows as $row){


            ?>
            <div class="form-container">
                <div class="input-container" id="contenedor-id">
                    <label for="id">Numero:</label>
                    <input class="input-curp" name="id" id="id" value="<?php echo $row['id_estado']?>" disabled>
                </div>  

                <div class="input-container" id="contenedor-estado">
                    <label for="curp">Nombre del estado:</label>
                    <input class="input-curp" name="estado" id="estado" maxlength="18" value="<?php echo $row['nombre_estado']?>">
                </div>     
            </div>  
            <div class="button-container">
            <input type="hidden" name="estadoEscondido" id="estadoEscondido" value="<?php echo $row['id_estado']?>">
                <input type="submit" value="Guardar">
            </div>
            </form>
        </div>
        <?php } ?>
</body>
</html>