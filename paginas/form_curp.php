<?php
    require_once "conexion.php";

    $curp_existe = $_POST["curp"];

    $sql = "SELECT P.id_persona, P.curp, P.nombre_persona, P.apellidop_persona, P.apellidom_persona, P.fecha_persona, E.id_estado, P.sexo_persona, E.nombre_estado FROM personas P INNER JOIN estados E ON P.id_estado = E.id_estado
    WHERE curp like '%$curp_existe%'";

   

    $error = "Ese registro no existe";

    $result = $conn->query($sql);
    $rows = $result->fetchAll();

    $btnBack = "<a href='../index.php' class='btn btn-ptimary btn-lg lit-buttons lit-buttons-two'>Regresar</a>";

    foreach ($rows as $row){
        $id_gente = $row['id_persona'];
        $nombre =  $row['nombre_persona'];
        $apellidoM = $row['apellidom_persona'];
        $apellidoP = $row['apellidop_persona'];
        $genero = $row['sexo_persona'];
        $estado = $row['id_estado'];
        $fecha = $row['fecha_persona'];
        $validCurp = $row['curp'];
        $nombreEstado = $row['nombre_estado'];
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
    <title>Confirma tu CURP</title>
</head>
<body>
    <header class="cabecera">
            <div class="logo-container">
                <img id="logo" src="../img/gmx.png" alt="gobierno">
            </div>
    </header>
    <div class="barra"></div>
    <h2 class="titulo-form">Confirma tu CURP</h2>
        <div class="form-comprobante">
            <?php
                if(empty($rows)){
                    $id_gente = $error;
                    $nombre =  $error;
                    $apellidoP =  $error;
                    $apellidoM =  $error;
                    $curp_existe = "Ese registro no existe";
                    $fecha =  $error;
                    $estado = $error;
                    $genero =  $error;
                    echo "<div class='error'>No se encontró ese registro.</div>";
                    echo $btnBack;     
                    }else{
                        echo'
                            <form action="solicitud_vacuna.php" method="post">
                                <div class="form-container">
                                <div class="input-container">
                                <label for="nombre">Nombre:</label>
                                <input class="input-curp" type="text" name="nombre" id="" disabled value=
                                "'.$nombre.'">
                            </div>
                            <input type="hidden" name="id_gente" value="'.$id_gente.'">
                            <div class="input-container">
                                <label for="apellido-paterno">Primer apellido:</label>
                                <input class="input-curp" type="text" name="apellido-paterno" disabled id=""
                                value="'.$apellidoP.'">
                            </div>
                            <div class="input-container">
                                <label for="apellido-materno">Segundo apellido:</label>
                                <input class="input-curp" type="text" name="apellido-materno" id="" disabled
                                value="'.$apellidoM.'">
                            </div>
                        </div>
                        <div class="form-container">
                            <div class="input-container">
                                <label for="curp">CURP:  </label>
                                <input class="input-curp" type="text" name="curp" id="" disabled value="'.$curp_existe.'">
                            </div>
                            <div class="">
                                <label for="fecha">Fecha de nacimiento:</label>
                                <input class="input-curp" type="text" name="fecha" id="" disabled value="'.$fecha .'">
                            </div>
                            <div class="form-group">
                                <label for="estado">Entidad de nacimiento:</label>
                                <input class="input-curp" type="text" name="estado" id="" disabled value="'.$nombreEstado.'">
                            </div>
                            <div class="form-group">
                                <label for="genero">Genero:</label>
                                <input class="input-curp" type="text" name="genero" id="" disabled value="'.$genero . '">
                            </div>
                                      
                            </div>
                    <p class="paragraph-terms">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora impedit sit nobis ipsam reprehenderit quasi omnis distinctio amet sint maiores aliquid, dolores labore harum, et ex neque? Labore, ducimus illum.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sequi iure libero vel inventore mollitia consequuntur aut dolor nemo, ipsa in velit veritatis, dolores nihil odio quae error? Distinctio, saepe.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, quibusdam voluptas accusamus modi delectus molestiae ut provident ex eos dolor non quo optio pariatur, iste et adipisci veniam voluptatum repellendus.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas doloremque quas cum rem laborum iure doloribus cumque adipisci alias, impedit itaque quis similique, veniam est perferendis voluptatibus atque incidunt accusamus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint illo accusamus inventore quidem, ex ipsam voluptas laborum veniam repellat assumenda ut ducimus iure omnis labore distinctio ad minus sunt. Ullam.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur deserunt voluptates odio. Sint optio sed, quae molestias maxime minus porro officia nemo quasi neque sit voluptate minima. Sit, error asperiores?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque officiis aliquam error quas dolore atque laborum velit! Aut, nihil officiis soluta nulla delectus iste saepe tenetur! Molestiae sit voluptatibus et!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ut obcaecati alias illum quam. Voluptas, aperiam, culpa quaerat accusantium ipsum aliquam laudantium odio nulla, hic dolores suscipit eos voluptates ipsa.
                    Nihil, commodi unde sequi aspernatur modi veniam excepturi minima, quasi voluptatibus exercitationem nemo quidem autem at repellendus a, corrupti odio! At atque, quibusdam in quia consequuntur iure reprehenderit itaque blanditiis?
                    </p>
                    <div class="container-lit">
                    <input class="btn btn-ptimary btn-lg lit-buttons lit-buttons-one" type="submit" value="Quiero vacunarme">
                        '.$btnBack.'
                    </div>
                </form>';                     
                        }
                    ?>
        </div>
</body>
</html>