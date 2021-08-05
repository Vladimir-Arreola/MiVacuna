<?php 
    require_once "conexion.php";

    $personaSelec = $_GET["id"];
    // $resultado = "";
    // $resultado2 = "";

    $sqlU = "SELECT P.id_persona, P.curp, P.nombre_persona, P.apellidop_persona, P.apellidom_persona, P.fecha_persona, E.id_estado, E.nombre_estado, P.sexo_persona FROM personas P INNER JOIN estados E on P.id_estado = E.id_estado WHERE P.id_persona=" .$personaSelec;

    $sql = "SELECT * FROM estados";
    $start = $conn->query($sql);
    $rowsEstados = $start->fetchAll();
   

    $resultadoFinal = $conn->query($sqlU);
    $rows = $resultadoFinal;

    function ImprimirPersonas($registro){
        echo "<h1>" .$registro . "</h1>";
    }


    if(empty($rows)){
        $resultado3 = "<p class='error'>No se encontraron resultados</p>";
        header("Location: error.php");
        exit;
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
    <script src="../js/validations.js"></script>
    <title>Actualizar persona</title>
</head>
<body>
<header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-tablas sombra">
        <h2>Actualizar registro</h2>
        <form action="grabar_personas.php" method="post" id="actualiza" class="form-update" onsubmit="return ValidarPersonas()">
            <?php
                foreach($rows as $row){


            ?>
        <div class="form-container">
            <div class="input-container" id="contenedor-id">
                <label for="id">Folio:</label>
                <input class="input-curp" name="id" id="id" value="<?php echo $row['id_persona']?>" disabled>
            </div>  
            <div class="input-container" id="contenedor-curp">
                <label for="curp">Curp:</label>
                <input class="input-curp" name="curp" id="curp" value="<?php echo $row['curp']?>" maxlength="18">
            </div>  
            <div class="input-container" id="contenedor-entidad">
                <label for="estados">Estado:</label>
                <select class="input-curp" name="estado" id="estado">
                    <option value="0">Elige un estado</option>
                    <?php
                        foreach($rowsEstados as $rowEstado){
                    ?>
                    <option value="<?php echo $rowEstado['id_estado']; ?>" selected>
                        <?php echo $rowEstado['nombre_estado']; ?>
                    <?php } ?>
                    </option>
                </select>
            </div>     
            <div class="input-container" id="contenedor-nombre">
                <label for="nombre">Nombre:</label>
                <input class="input-curp" name="nombre" id="nombre" value="<?php echo $row['nombre_persona']?>">
            </div>  
        </div>
        <div class="form-container">
            <div class="input-container" id="contenedor-apellido">
                <label for="apellido">Apellapellidopo Paterno:</label>
                <input class="input-curp" name="apellido" id="apellido" value="<?php echo $row['apellidop_persona']?>">
            </div>  
            <div class="input-container" id="contenedor-apellido_m">
                <label for="apellidoM">Apellapellidopo Materno:</label>
                <input class="input-curp" name="apellidoM" id="apellidoM" value="<?php echo $row['apellidom_persona']?>">
            </div> 
            <div class="input-fechas" id="contenedor-fecha">
                    <label for="fecha">Fecha de nacimiento:</label>
                    <div class="contenedor-fechas">
                        <input class="input-curp" type="date" id="fechas" name="fechas"
                        value="<?php echo $row['fecha_persona']?>"
                        min="1921-01-01" max="2021-01-01">
                    </div>
            </div>
        </div>
        <div class="form-container">
                <div class="radios-container" id="contenedor-sexo">                
                    <p>Por favor, seleccionta tu genero:</p>
                    <div class="input-radio" id="contenedor-sex">              
                        <div class="radio-individual">
                            <input type="radio" name="genero" id="onvre" value="H">
                            <label for="hombre">Hombre</label>
                        </div>
                        <div class="radio-individual">
                            <input type="radio" name="genero" id="mujer" value="M">
                            <label for="hombre">Mujer</label>
                        </div>
                    </div>
            </div>
        </div>
        <input type="hidden" name="personaEscondida" id="personaEscondida" value="<?php echo $row['id_persona']?>">
        <?php } ?>
        <div class="form-container">
            <input type="submit" value="Guardar">
        </div>
        </form>
</body>
</html>