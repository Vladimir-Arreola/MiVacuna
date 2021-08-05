<?php
    session_start();
    
    $contrasenia = trim($_POST["password"]);

    $usuario = trim($_POST["username"]);

    require "conexion.php";

    $sqlStart = "SELECT * FROM usuarios WHERE nombre='$usuario' AND contraseniax= '$contrasenia'";
    
    $final = $conn->query($sqlStart);

    $rows = $final->fetchAll();

    $exist = (int)$rows;

    if($exist > 0){
        $_SESSION["valido"] = "true";
        $conn = null;
        header("Location:administrador.php");
        exit;
    } else {
        $conn = null;
        function Error(){
            echo "<p class='error'>Ese usuario no existe</p>";
        }
        header("Location: login.php");
        exit;
    }
?>