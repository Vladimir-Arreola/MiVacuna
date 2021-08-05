<?php

require_once "conexion.php";
    $sql = "SELECT P.id_persona, P.curp, P.nombre_persona, P.apellidop_persona, P.apellidom_persona, P.fecha_persona, E.id_estado, P.sexo_persona FROM personas P INNER JOIN estados E ON P.id_estado = E.id_estado";

    $result = $conn->query($sql);
    $rows = $result->fetchAll();

    foreach ($rows as $row){

        $conn = null;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    <link rel="stylesheet" href="../css/styles.css">    
    <link rel="stylesheet" href="../css/no-margin.css">
    <title>Mi Vacuna Madrigal</title>
</head>
<body>
    <header class="cabecera">
        <div class="logo-container">
            <img id="logo" src="../img/gmx.png" alt="gobierno">
        </div>
    </header>
    <nav class="barra">
        <ul class="opciones"> 
            <a href="solicitudes.php" class="link">Solicitudes</a>
            <a href="estados.php" class="link"><li>Estados</li></a>
            <a href="municipios.php" class="link"><li>Municipios</li></a>
            <a href="personas.php" class="link"><li>Personas</li></a>
        </ul>
    </nav>
    <main class="all-container">
        <div class="carga-curp"  id="box">
                <p class="paragraph-description">Soy mayor de 18 años y estoy embarazada o este año cumplo 50 años o más y me quiero vacunar:</p>
            <form action="form_curp.php" method="post" id="manda-curp" class="form-group" onsubmit="return ValidaCurp()">
                <div class="input-group" id="form-cont">
                    <div class="input-group-prepend" id="max-content">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495057" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                    </div>
                </div>
                    <input name="curp" id="input_curp" type="text" class="form-control input-text" maxlength="18" placeholder="Introducir CURP">  
                </div>
                <p class="paragraph paragraph-warning">Nota: Su curp debe de estar registrada en el sistema</p>
                <div id="contenedor-errores">

                    </div>
                <div class="container-buttons" id="container-button">
                    <button id="send" type="submit" class="btn btn-ptimary btn-lg my-button sup-button">Confirmar Curp</button>
                </div>
            </form>
        </div>
    </main>
    <div class="menu">
        <button type="button" class="btn btn-ptimary btn-lg  my-button menu-button-one">Guía para registrarse en mi vacuna</button>
        <button type="button" class="btn btn-ptimary btn-lg my-button menu-button-two">¿No conoces tu CURP? Consúltala aquí</button>
        <button type="button" class="btn btn-ptimary btn-lg my-button menu-button-three">Aviso de privacidad</button>
        <button type="button" class="btn btn-ptimary btn-lg my-button menu-button-four">Información segunda dosis</button>
    </div>
    <p class="paragraph-time">El horario de operación es continuo de lunes a domingo.</p>
    <footer class="paragraph paragraph-footer">
        <p>La aplicación de la Política Nacional de Vacunación es de carácter público, ajena a cualquier partido político. Queda prohibido su uso para fines distintos a los establecidos.</p>
        <div class="barra-footer"></div>
    </footer>
    <script src="../js/validations.js"></script>
</body>
</html>
