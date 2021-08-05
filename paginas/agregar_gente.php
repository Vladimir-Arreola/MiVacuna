<?php
    require_once "conexion.php";

    $reultado = "";

    $sql = "SELECT * FROM estados";
    $start = $conn->query($sql);
    $rows = $start->fetchAll();

    if (empty($rows)){
        $resultado = "No hay resultados :C";
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
    <title>Agregar Persona</title>
</head>
<body>
    <header class="cabecera-admin">
        <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>

    <div class="contenedor-tablas sombra">
        <h2>Agregar registro</h2>
        <form action="guardar_persona.php" method="post" id="actualiza_persona" class="form-update" onsubmit="return ValidarPersonas();">
        <div class="form-container">
            <div class="input-container" id="contenedor-id">
                <label for="id">Numero:</label>
                <input class="input-curp" name="id" id="id">
            </div>  

            <div class="input-container" id="contenedor-curp">
                <label for="curp">Curp:</label>
                <input class="input-curp" name="curp" id="curp" maxlength="18">
            </div>     

            <div class="input-container" id="contenedor-entidad">
                <label for="estados">Estado:</label>
                <select class="input-curp" name="estado" id="estado">
                    <option value="0">Elige un estado</option>
                    <?php
                        foreach($rows as $row){
                    ?>
                    <option value="<?php echo $row['id_estado']; ?>">
                        <?php echo $row['nombre_estado']; ?>
                    <?php } ?>
                    </option>
                </select>
            </div>     


            <div class="input-container" id="contenedor-nombre">
                <label for="nombre">Nombres:</label>
                    <input class="input-curp" type="text" name="nombre" id="nombre">
            </div>     
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-apellido">      
                    <label for="apellido">Apellido paterno:</label>
                    <input class="input-curp" type="text" name="apellido" id="apellido">
                </div>               
                <div class="input-container" id="contenedor-apellido_m">                
                    <label for="apellidoM">Apellido materno:</label>
                    <input class="input-curp" type="text" name="apellidoM" id="apellidoM">
                </div>            
                <div class="input-container" id="contenedor-phone2">
                    <label for="fecha">Fecha de nacimiento:</label>
                    <div class="contenedor-fechas">
                        <input class="input-curp" type="date" id="fechas" name="fechas"
                        value="2021-01-01"
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
        <input type="hidden" name="idEscondido" id="idEscondido" value="<?php echo $row['id_solicitud']?>">
        <input type="hidden" name="personaEscondida" id="personaEscondida" value="<?php echo $row['id_persona']?>">
        <div class="form-container">
            <input type="submit" value="Guardar">
        </div>
        </form>
</body>
</html>