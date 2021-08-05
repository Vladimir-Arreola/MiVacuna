<?php
    require_once "conexion.php";


    $persona = $_POST['id_gente'];

    $entidad = $_POST['selecc-estado'];

    $numeroMunicipio = $_POST['selecc-municipio'];

    $codigoP = $_POST['codigo-postal'];

    $numeroTelefono = $_POST['phone-one'];

    $numeroTelefonoDos = $_POST['phone-two'];

    $correo = $_POST['mail-one'];

    $correoApoyo = $_POST['mail-two'];

    $notas = $_POST['notas-contacto'];

    $sql = "SELECT id_solicitud, id_persona, id_estado ,id_municipio, cp, telefono, telefono_dos, email, email_dos, notas FROM solicitud WHERE id_persona='$persona'";

    $resultado = $conn ->query($sql);

    $rows = $resultado ->fetchAll();

    $sqlC2 = "SELECT curp FROM personas WHERE id_persona ='".$persona."'";

    $rest = $conn ->query($sqlC2);
    $rowaxs = $rest ->fetchAll();
    
    foreach($rowaxs as $rowax){
        $curp = $rowax['curp'];
    }


    if(empty($rows)){
        $sqlInserta = "INSERT INTO solicitud(id_persona, id_estado, id_municipio, cp,telefono, telefono_dos, email, email_dos, notas)";
        $sqlInserta2 = $sqlInserta . "VALUES('$persona', '$entidad', '$numeroMunicipio', '$codigoP', '$numeroTelefono', '$numeroTelefonoDos', '$correo', '$correoApoyo', '$notas')";

        $conn->exec($sqlInserta2);

         
        $sql4 = "SELECT id_solicitud FROM solicitud WHERE id_persona=" .$persona;
        $resultado4 = $conn->query($sql4);
        $rows4 = $resultado4->fetchAll();

        foreach($rows4 as $row4){
            $id_solicitud = $row4['id_solicitud'];
        
        }
        
        $final = '<p class="success">' . "Ud. ha sido registrado satisfactoriamente.
                  Con el folio: " .$id_solicitud. ". Espere nuestra llamada donde le indicaremos su fecha y lugar de 
                  vacunación" . "<br>CURP: " .$curp. '</p>';
        
       
    }else{
        $final = '<p class="error">' ."Esta persona ya se ha realizado una solicitud" .'</p>';
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
    <title>Resultado</title>
    <header class="cabecera">
            <div class="logo-container">
                <img id="logo" src="../img/gmx.png" alt="gobierno">
            </div>
    </header>
    <div class="barra"></div>
    <h2 class="titulo-form">Resultado</h2>
        <div class="form-comprobante">
            <div class="contenedor-resultado">
                <?php echo $final?></p>
            </div>

        <?php 
        $sql5 = "SELECT id_solicitud FROM solicitud WHERE id_persona=" .$persona;
        $resultado5 = $conn->query($sql5);
        $rows5 = $resultado5->fetchAll();

        foreach($rows5 as $row5){
            $id_solicitud2 = $row5['id_solicitud'];
        
        }
        ?>

            <div class="form-container">
                <a href="expediente_pdf.php?id=<?php echo $id_solicitud2;?>" class="boton boton-pdf" target="_blank">Ver expediente de vacunación</a>
            </div>
        </div>
</head>
</body>
</html>