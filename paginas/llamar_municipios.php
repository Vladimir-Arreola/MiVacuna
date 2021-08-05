<?php
    require_once "conexion.php";
    $resultado;
    $resultado2 = "<option value='0'> Seleccione su municipio</option>";
    $resultado3 ="<option value='0'> No existen municipios registrados</option>";

    $estado_escogido = $_POST["estado_seleccionado"];

    $sqlD = "SELECT * FROM municipios WHERE id_estado ='$estado_escogido'";

    $resultado = $conn->query($sqlD);

    $rows = $resultado->fetchAll();

    if(empty($rows)){
        echo $resultado3;
        die();
    }else{
        echo $resultado2;
        foreach($rows as $row){
            echo '<option value="'.$row['id_municipio'].'">' .$row['nombre_municipio'].'</option>';
        }
    }
?>