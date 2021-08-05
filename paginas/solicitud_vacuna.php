<?php
    require_once "conexion.php";

    $id_persona = $_POST['id_gente'];

    $resultados = "";

    $sql = 'SELECT id_estado, nombre_estado FROM estados';
    $stmt = $conn ->query($sql);
    $rows = $stmt ->fetchAll();

    $sqlSolicitu = 'SELECT id_solicitud FROM solicitud';
    $start = $conn ->query($sqlSolicitu);
    $filas = $start ->fetchAll(); 

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
    <script language="javascript">
    function crea_objeto_XMLHttpRequest(){
        try{
            objeto = new XMLHttpRequest();
        }catch(err1){   
        try{
            objeto = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                objeto = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objeto = false;
                }
            }
        }
        return objeto;
    }

    var ajax_Object = crea_objeto_XMLHttpRequest();

    function llamaMunicipios(){
        var URL = "llamar_municipios.php";
        ajax_Object.open("POST", URL, true);
        ajax_Object.onreadystatechange = muestraResultado;
        ajax_Object.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax_Object.send("estado_seleccionado=" + document.getElementById("selecc-estado").value);
    }

    function muestraResultado(){
        if(ajax_Object.readyState == 4 && ajax_Object.status == 200){
            document.getElementById("municipios").innerHTML = ajax_Object.responseText;
        }
    }

function AgregaError(id, numeros){
    var error = document.createElement("P");
    error.className = "mini-error";
    error.style.color = "rgb(187, 12, 12)";
    var forma = document.getElementById(id);
    if(numeros==true){
        error.innerText = "Este campo es obligatorio y solo usa números enteros.";    
    }else{
    error.innerText = "Este campo es obligatorio";
    }
    forma.appendChild(error);
    setTimeout(()=> {
        error.remove();
    }, 5000)
}

function Focus(id){
    document.getElementById(id).focus();
}

function CambiarColor(id){
        document.getElementById(id).style.backgroundColor = "rgb(241, 185, 185)";

        setTimeout(()=> {
        document.getElementById(id).style.backgroundColor = "#efe8d8";
    }, 4000)
}


function ValidaSolicitud(){
    var estado = document.getElementById("selecc-estado").selectedIndex;
    var municipio = document.getElementById("municipios").selectedIndex;
    var codigoPostal = document.getElementById("cp").value;
    var telefono1 = document.getElementById("phone-one").value;
    var telefono2 = document.getElementById("phone-two").value;
    var email = document.getElementById("mail-one").value;
    var email2 = document.getElementById("mail-two").value;


    if (estado == null || estado == 0){
        AgregaError("contenedor-entidad", false);
        Focus("selecc-estado");
        CambiarColor("selecc-estado");
        return false;
    }else if(municipio == null || municipio == 0){
        AgregaError("contenedor-municipio", false);
        CambiarColor("municipios");
        Focus("municipios");
        return false;
    }else if(codigoPostal == null || codigoPostal.length <5 || !/^([0-9])*$/.test(codigoPostal)){
        AgregaError("contenedor-postal", true);
        CambiarColor("cp");   
        Focus("cp");                 
        return false;
    }else if(telefono1 == null || telefono1.length < 10 || !/^([0-9])*$/.test(telefono1)){
        AgregaError("contenedor-phone", true);
        CambiarColor("phone-one");   
        Focus("phone-one");                 
        return false;
    }else if(telefono2 == null || telefono2.length < 10 || !/^([0-9])*$/.test(telefono2)){
        AgregaError("contenedor-phone2", true);
        CambiarColor("phone-two");   
        Focus("phone-two");
        return false;
    }else if(email == null || email.length == 0 || /^\s+$/.test(email)){
        AgregaError("contenedor-email");
        CambiarColor("mail-one");   
        Focus("mail-one");                 
        return false;
    }else if(email2 == null || email2.length == 0 || /^\s+$/.test(email2)){
        AgregaError("contenedor-email");
        CambiarColor("mail-two");   
        Focus("mail-two");                 
        return false;
    }
}

</script>

    <title>Solicitud Para Vacunarse</title>
</head>
<body>
    <header class="cabecera">
            <div class="logo-container">
                <img id="logo" src="../img/gmx.png" alt="gobierno">
            </div>
    </header>
    <div class="barra"></div>
    <h2 class="titulo-form">Lugar donde voy a vacunarme y datos para localizarme</h2>
        <div class="form-comprobante">
            <form action="grabar_solicitud.php" method="post" onsubmit="return ValidaSolicitud();">
                <input type="hidden" name="id_gente" value='<?php echo $id_persona?>'>
                <input type="hidden" name="id_solicitud" value='<?php echo $id_solicitud?>'>
                <div class="form-container">
                    <div class="input-container" id="contenedor-entidad">
                        <label for="selecc-estado">Estado:</label>
                        <select class="input-curp" name="selecc-estado" id="selecc-estado" onChange="javasript:llamaMunicipios();">
                            <option value="0">Selecciona tu Entidad</option>
                            <?php
                                foreach($rows as $row){
                                    echo '<option value=" '.$row['id_estado'].' ">'.$row['nombre_estado'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-container" id="contenedor-municipio">
                        <label for="select-location">Municipio:</label>
                            <select class="input-curp" name="selecc-municipio" id="municipios">
                        </select>
                    </div>
                    <div class="input-container" id="contenedor-postal">
                        <label for="codigo-postal">CP:</label>
                        <input type="text" class="input-curp" name="codigo-postal" id="cp" maxlength="5">
                    </div>
                </div>
                    <div class="form-container">
                        <div class="input-container-two" id="contenedor-phone">
                            <label for="phone-one">Telefono(1): </label>
                            <input type="text" class="input-curp" name="phone-one" id="phone-one" maxlength="10">
                        </div>         
                    <div class="input-container-two" id="contenedor-phone2">
                        <label for="phone-two">Telefono(2): </label>
                        <input type="text" class="input-curp" name="phone-two" id="phone-two" maxlength="10">
                    </div>         
                    <div class="input-container-two" id="contenedor-email">
                        <label for="mail-one">Correo electrónico:</label>
                        <input type="email" class="input-curp" name="mail-one" id="mail-one">
                    </div>         
                    <div class="input-container-two">
                        <label for="mail-two">Correo de apoyo: </label>
                        <input type="email" class="input-curp" name="mail-two" id="mail-two">
                    </div>
                </div>
                <div class="form-container">
                    <div class="input-container-notes">
                        <label for="notas-contacto">Notas de contacto: </label>
                        <textarea name="notas-contacto" id="notas-contacto" cols="100" rows="3"></textarea> 
                    </div>   
                </div>
                <div id="contenedor-errores">
                    </div>  
                <div class="container-lit">
                    <input class="btn btn-ptimary btn-lg lit-buttons-one lit-buttons" type="submit" value="Enviar">  
                </div> 
            </form>
    </div>
    <?php
        $conn = null;
    ?>
</body>
</html>