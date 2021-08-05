<?php 
    require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/no-margin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet"> 
    <script src="../js/validations.js"></script>
    <title>Administrador</title>
</head>
<body>
    <header class="cabecera-admin">
                    <img id="logo" src="../img/gmx.png" alt="gobierno">
    </header>
    <nav class="barra">
        <ul class="opciones"> 
            <a href="solicitudes.php" class="link">Solicitudes</a>
            <a href="estados.php" class="link"><li>Estados</li></a>
            <a href="municipios.php" class="link"><li>Municipios</li></a>
            <a href="personas.php" class="link"><li>Personas</li></a>
        </ul>
    </nav>
    <div class="contenedor-descripcion">
        <h1>Menú de administrador</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur doloribus accusamus, perferendis eius incidunt molestiae dignissimos corporis quaerat tenetur cum maiores voluptatum, quo expedita rerum! Molestias id facilis voluptatibus neque.
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo architecto ab exercitationem odit dolores quae dolorum, est eligendi fugit quis ad aliquam beatae dolor. Ducimus doloremque assumenda alias provident ex.
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, id explicabo aut veritatis cum optio iste ipsa. Autem corporis officia mollitia quas. At ratione ex minus ad expedita ipsa? Optio?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis exercitationem, consequatur ipsam doloremque officia iure similique ab quas id omnis, quisquam expedita doloribus dicta sint, assumenda excepturi nulla maiores nesciunt?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non cupiditate officiis, voluptatibus voluptates saepe quas, quia ratione, sequi molestiae deleniti laudantium labore nostrum similique obcaecati voluptas nesciunt fugiat? Accusantium, facere?
        </p>
    </div>
</body>
</html>