<?php 
    require_once "conexion.php";

    $municipioSelec = $_GET["id"];

    $sqlEstados = "SELECT * FROM estados";
    $resultaEstados = $conn->query($sqlEstados);
    $rowsEstados = $resultaEstados->fetchAll();

    $sql = "SELECT M.id_municipio, E.nombre_estado, M.id_estado, M.nombre_municipio FROM municipios M INNER JOIN estados E on M.id_estado = E.id_estado WHERE id_municipio=".$municipioSelec;
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
    <title>Detalle de municipio</title>
</head>
<body>
    <header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <nav class="barra">
        <ul class="opciones"> 
            <a href="solicitudes.php" class="link">Solicitudes</a>
            <a href="estados.php" class="link"><li>Estados</li></a>
            <a href="municipios.php" class="link"><li>Municipios</li></a>
            <a href="personas.php" class="link"><li>Personas</li></a>
        </ul>
    </nav>
    <div class="contenedor-tablas sombra">
            <h2>Modificar registro</h2>
            <form action="grabar_municipio.php" method="post" id="actual" class="form-update" onsubmit="return ValidarMunicipios();">
            <?php
                foreach($rows as $row){
               
            ?>
            <div class="form-container">
                <div class="input-container" id="contenedor-id">
                    <label for="id">Numero:</label>
                    <input class="input-curp" name="id" id="id" value="<?php echo $row['id_municipio']?>" disabled>
                </div>  

                <div class="input-container" id="contenedor-entidad">
                <label for="estado">Estado:</label>
                <select class="input-curp" name="estado" id="estado">
                    <option value="0">Elige un estado</option>
                        <?php foreach($rowsEstados as $rowEstado){
                            echo '<option value="'.$rowEstado['id_estado'].'">'.$rowEstado['nombre_estado'].'</option>';}
                        ?>
                        <option value="<?php echo $row['id_estado']; ?>" selected>
                        <?php echo $row['nombre_estado']; ?>
                    </option>
                    </option>
                </select>
            </div>     

                <div class="input-container" id="contenedor-municipio">
                    <label for="municipio">Nombre del municipio:</label>
                    <input class="input-curp" name="municipio" id="municipio" maxlength="18" value="<?php echo $row['nombre_municipio']?>">
                </div>       
            </div>  
            <div class="button-container">
                <input type="hidden" name="municipioEscondido" id="municipioEscondido" value="<?php echo $row['id_municipio']?>">
                <input type="submit" value="Guardar">
            </div>
            </form>
        </div>
        <?php } ?>
</body>
</html>