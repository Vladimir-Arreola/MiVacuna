<?php
    require_once "conexion.php";

    $solicitudSelec = $_GET["id"];
    $resultado = "";
    $resultado2 = "";

    $sqlEstados = 'SELECT * FROM estados';
    $startm = $conn->query($sqlEstados);
    $rowsEstados = $startm->fetchAll();

    $sqlPersonas = 'SELECT * FROM personas';
    $startGente = $conn->query($sqlPersonas);
    $rowsPersonas = $startGente->fetchAll();

    $superSql = 'SELECT id_estado FROM solicitud WHERE id_solicitud='.$solicitudSelec;
    $startSup = $conn->query($superSql);
    $rowsSuper = $startSup->fetchAll();

    foreach($rowsSuper as $rowSuper){
        $estado = $rowSuper['id_estado'];
    }
    $sqlMunicipios = 'SELECT * FROM municipios WHERE id_estado='.$estado;
    $startMunicipios = $conn->query($sqlMunicipios);
    $rowsMunicipios = $startMunicipios->fetchAll();

    $solicitudSelec= $_GET["id"];
    $solicitudSelec = (int)$solicitudSelec;
    
    if($solicitudSelec == ""){
        header("Location:error.php");
        exit;
    }
    if(is_null($solicitudSelec)){
        header("Location: error.php");
        exit;
    }

    $sqlU = "SELECT S.id_solicitud, S.id_persona, P.curp, S.id_estado, E.nombre_estado, M.nombre_municipio, S.cp, S.telefono, S.telefono_dos, S.email, S.email_dos FROM solicitud S INNER JOIN estados E on S.id_estado = E.id_estado INNER JOIN personas P on S.id_persona = P.id_persona INNER JOIN municipios M on S.id_municipio = M.id_municipio WHERE S.id_solicitud=" .$solicitudSelec;

    $resultado3 = $conn->query($sqlU);
    $rows = $resultado3->fetchAll();

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

function AgregaError(id, numeros, digitos){
    var error = document.createElement("P");
    error.className = "mini-error";
    error.style.color = "rgb(187, 12, 12)";
    var forma = document.getElementById(id);
    if(numeros==true){
        error.innerText = "Este campo es obligatorio y solo usa " + digitos + " números enteros.";    
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
    var telefono1 = document.getElementById("telefono").value;
    var telefono2 = document.getElementById("telefono2").value;
    var email = document.getElementById("email").value;
    var email2 = document.getElementById("email2").value;

    if(estado == null || estado == 0){
        AgregaError("contenedor-entidad", false);
        Focus("selecc-estado");
        CambiarColor("selecc-estado");
        return false;
    }else if(municipio == null || municipio == 0){
        AgregaError("contenedor-municipios", false);
        CambiarColor("municipios");
        Focus("municipios");
        return false;
    }else if(codigoPostal == null || codigoPostal.length <5 || !/^([0-9])*$/.test(codigoPostal)){
        AgregaError("contenedor-postal", true, 5);
        CambiarColor("cp");   
        Focus("cp");                 
        return false;
    }else if(telefono1 == null || telefono1.length < 10 || telefono1.length > 10 || !/^([0-9])*$/.test(telefono1)){
        AgregaError("contenedor-phone", true, 10);
        CambiarColor("telefono");   
        Focus("telefono");                 
        return false;
    }else if(telefono2 == null || telefono2.length < 10 || telefono2.length > 10 || !/^([0-9])*$/.test(telefono2)){
        AgregaError("contenedor-phone2", true, 10);
        CambiarColor("telefono2");   
        Focus("telefono2");
        return false;
    }else if(email == null || email.length == 0 || /^\s+$/.test(email)){
         AgregaError("contenedor-email");
         CambiarColor("email");   
         Focus("email");                 
         return false;
    }else if(email2 == null || email2.length == 0 || /^\s+$/.test(email2)){
        AgregaError("contenedor-email2");
        CambiarColor("email2");   
        Focus("email2");                 
        return false;
    }
    return true; 
}
</script>

    <title>Editar Solicitud</title>
</head>
<body>
<header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <div class="contenedor-tablas sombra">
        <h2>Actualizar registro</h2>
        <form action="guardar_solicitud.php" method="post" id="actualiza_solicitud" class="form-update" onsubmit="return ValidaSolicitud()">
            <?php
                foreach($rows as $row){


            ?>
        <div class="form-container">
            <div class="input-container" id="contenedor-id">
                <label for="id">Folio:</label>
                <input class="input-curp" name="id" id="id" value="<?php echo $row['id_solicitud']?>" disabled>
            </div>  

            <div class="input-container" id="contenedor-personas">
                <label for="personas">Curp:</label>
                <input class="input-curp" name="personas" id="personas" value="<?php echo $row['curp'] ?>" disabled>
            </div>     

            <div class="input-container" id="contenedor-entidad">
                <label for="estados">Estado:</label>
                <select class="input-curp" name="selecc-estado" id="selecc-estado"  onChange="javasript:llamaMunicipios();">
                    <option value="0">Elige un estado</option>
                    <?php foreach($rowsEstados as $rowEstado){
                        echo '<option value="'.$rowEstado['id_estado'].'">'.$rowEstado['nombre_estado'].'</option>';
                    } ?>
                    <option value="<?php echo $row['id_estado']; ?>" selected>
                        <?php echo $row['nombre_estado']; ?>
                    </option>
                </select>
            </div>     


            <div class="input-container" id="contenedor-municipios">
                <label for="municipios">Municipio:</label>
                <select class="input-curp" name="municipios" id="municipios">
                    <option value="0">Elige un municipio</option>

                    <?php foreach($rowsMunicipios as $rowMunicipio){
                        echo '<option value="'.$rowMunicipio['id_municipio'].'">'.$rowMunicipio['nombre_municipio'].'</option>';
                    } ?>
                    <option value="<?php echo $rowMunicipio['id_municipio']?>" selected>
                        <?php echo $rowMunicipio['nombre_municipio'] ?>

                    </option>
                </select>
            </div>     
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-postal">      
                    <label for="cp">Código Postal:</label>
                    <input class="input-curp" type="text" name="cp" id="cp" value="<?php echo $row['cp'] ?>">
                </div>               
                <div class="input-container" id="contenedor-phone">                
                    <label for="telefono">Telefono:</label>
                    <input class="input-curp" type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']?>">
                </div>            
                <div class="input-container" id="contenedor-phone2">
                    <label for="telefono2">Telefono2:</label>
                    <input class="input-curp" type="text" name="telefono2" id="telefono2" value="<?php echo $row['telefono_dos']?>">
                </div>
            </div>
            <div class="form-container">
                <div class="input-container" id="contenedor-email">                
                    <label for="email">Email:</label>
                    <input class="input-curp" type="text" name="email" id="email" value="<?php echo $row['email']?>">
                </div>
                <div class="input-container" id="contenedor-email2">            
                    <label for="email2">Email de apoyo:</label>
                    <input class="input-curp" type="text" name="email2" id="email2" value="<?php echo $row['email_dos']?>">
                </div>
        </div>
        <input type="hidden" name="idEscondido" id="idEscondido" value="<?php echo $row['id_solicitud']?>">
        <input type="hidden" name="personaEscondida" id="personaEscondida" value="<?php echo $row['id_persona']?>">
        <div class="form-container">
            <input type="submit" value="Guardar">
        </div>
        </form>
        <?php } ?>
</body>
</html>