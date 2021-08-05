<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $baseDatos = "bd_vacuna";

    try{

        $conn = new PDO("mysql:host=$servername;dbname=$baseDatos", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "<h1>Si me conecté</h1>";
    }
    catch(PDOException $e)
    {
        echo "<h1>Nooooooooo me conecté</h1>";
    }
?>