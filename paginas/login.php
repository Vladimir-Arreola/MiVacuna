<?php 
    require_once "conexion.php";
    
    $db = $conn;
    session_start();
    $_SESSION["valido"] = "";
    session_unset();
    session_destroy();
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
    <script src="../js/validations.js"></script>
    <title>Login</title>
</head>
<body class="text-center">
    <form action="validar_sesion.php" method="POST" onsubmit="return ValidaLogin()">
    <div class="all-login-container">
        <img src="../img/gmx.png" alt="gobierno de México" class="imagen-gobierno">
        <div class="container-credential sombra">
        <h1 class="mb-3">Iniciar sesión</h1>  
            <div id="contenedor-usuario">
                <input class="form-control form-control-login" type="text" name="username" id="name" placeholder="Nombre de usuario">
            </div>
            <div id="contenedor-pass">
                <input class="form-control form-control-login" type="password" name="password" id="password" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
        </div>
    </div>
    </form>
</body>
</html>