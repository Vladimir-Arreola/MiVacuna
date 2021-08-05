
// function AgregaError(id, mensaje){
//     var error = document.createElement("P");
//     error.className = "error";
//     var form = document.getElementById(id);
//     error.innerText = mensaje;
//     form.appendChild(error);

//     setTimeout(()=> {
//         error.remove();
//     }, 5000)
// }

function AgregaErrorGrande(id, mensaje){
    var error = document.createElement("P");
     error.className = "error";
     var form = document.getElementById(id);
     error.innerText = mensaje;
     form.appendChild(error);

     setTimeout(()=> {
         error.remove();
     }, 5000)
 }

function AgregaError(id, numeros, digitos){
    var error = document.createElement("P");
    error.className = "mini-error";
    error.style.color = "rgb(187, 12, 12)";
    var forma = document.getElementById(id);
    if(numeros==true){

        if(digitos == 0){
            error.innerText = "Este campo es obligatorio y solo usa números enteros.";    
        }else{
            error.innerText = "Este campo es obligatorio y solo usa " + digitos + " números enteros.";   
        }
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

function ValidaCurp(){
    var curp = document.getElementById("input_curp").value;

    if (curp == null || curp.length == 0 || /^\s+$/.test(curp)){
        AgregaErrorGrande("contenedor-errores", "La curp es obligatoria");
        document.getElementById("input_curp").focus();
        document.getElementById("input_curp").style.borderColor = "#cf2329";
        return false;
    } else if(curp.length<18 || curp.length>18){
        AgregaErrorGrande("contenedor-errores", "La curp es obligatoria");
        document.getElementById("input_curp").focus();
        document.getElementById("input_curp").style.borderColor = "#cf2329";
        return false;
    }
    return true;
}

function ValidaSolicitud(){
    var estado = document.getElementById("selecc-estado").selectedIndex;

    if (estado == null || estado == 0){
        document.getElementById("selecc-estado").focus();
        document.getElementById("selecc-estado").style.backgroundColor = "#cf2329";
        return false;
    }
}

function ValidaLogin(){
    var userName = document.getElementById("name").value;
    var contrasenia = document.getElementById("password").value;

    if(userName == null || userName.length == 0 || /^\s+$/.test(userName)){
        AgregaError("contenedor-usuario", "Ingresa el nombre de usuario por favor");
        Focus("name");
        return false;
    } if(contrasenia == null || contrasenia.length == 0 || /^\s+$/.test(contrasenia)){
        AgregaError("contenedor-pass", "Ingresa la contraseña por favor");
        Focus("password");
        return false;
    }
    return true;
}

function PrevenirBorrado(){
    if(confirm("De verdad quieres eliminar este registro?") == true){
        return true;
    }else{
        return false;
    }
}

function ValidarPersonas(){
    var id = document.getElementById("id").value;
    var curpz = document.getElementById("curp").value;
    var estados = document.getElementById("estado").selectedIndex;
    var nombres = document.getElementById("nombre").value;
    var apellidoP = document.getElementById("apellido").value;
    var apellidoM = document.getElementById("apellidoM").value;
    var fecha = document.getElementById("fechas").value;
    var sexo = document.getElementsByName("genero");

    let siGenero = false;

    for(let i = 0; i<sexo.length; i++){
        if(sexo[i].checked){
            siGenero = true;
            break;
        }
    }


    if(id == null || id.length == 0 || !/^([0-9])*$/.test(id)){
        AgregaError("contenedor-id", true, 0);
        CambiarColor("id");   
        Focus("id");
        return false;
    }else if(curpz == null || curpz.length == 0 || /^\s+$/.test(curpz)){
        AgregaError("contenedor-curp");
        CambiarColor("curp");
        Focus("contenedor-curp");
        return false;
    }else if(estados == 0, estados == 0){
        AgregaError("contenedor-entidad");
        CambiarColor("estado");
        Focus("estado");
        return false;
    }else if(nombres == null, nombres.length == 0 || /^\s+$/.test(nombres)){
        AgregaError("contenedor-nombre");
        CambiarColor("nombre");
        Focus("nombre");
        return false;
    }else if(apellidoP == null, apellidoP.length == 0 ||  /^\s+$/.test(apellidoP)){
        AgregaError("contenedor-apellido");
        CambiarColor("apellido");
        Focus("apellido");
        return false;
    }else if(apellidoM == null, apellidoM.length == 0 ||  /^\s+$/.test(apellidoM)){
        AgregaError("contenedor-apellido_m");
        CambiarColor("apellidoM");
        Focus("apellidoM");
        return false;
    }else if(fecha == null || fecha.length == 0 ||  /^\s+$/.test(fecha)){
        AgregaError("contenedor-fecha");
        CambiarColor("fechas");
        Focus("fechas");
        return false;
    }else if(!siGenero){
        AgregaError("contenedor-sexo");
        CambiarColor("contenedor-sex");
        return false;
    }
    
    return true;
}

function ValidarEstados(){
    var id = document.getElementById("id").value;
    var nombre = document.getElementById("estado").value;

    if (id== null || id.length == 0 || !/^([0-9])*$/.test(id)){
        AgregaError("contenedor-id", true, 0);
        CambiarColor("id");   
        Focus("id");
        return false;
    }else if(nombre == null || nombre.length == 0 || /^\s+$/.test(apellidoP)){
        AgregaError("contenedor-estado");
        CambiarColor("estado");   
        Focus("estado");
        return false;
    }
    return true;
}

function ValidarMunicipios(){
    var id = document.getElementById("id").value;
    var estados = document.getElementById("estado").selectedIndex;
    var municipio = document.getElementById("municipio").value;

    if (id== null || id.length == 0 || !/^([0-9])*$/.test(id)){
        AgregaError("contenedor-id", true, 0);
        CambiarColor("id");   
        Focus("id");
        return false;
    }else if(estados == 0 || estados.length == 0){
        AgregaError("contenedor-entidad");
        CambiarColor("estado");   
        Focus("estado");
        return false;
    }else if(municipio == null || municipio.length == 0 ||  /^\s+$/.test(municipio)){
        AgregaError("contenedor-municipio");
        CambiarColor("municipio");   
        Focus("municipio");
        return false;
    }
    return true;
}