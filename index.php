<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: php/conexion/inicio_sesion.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamovies</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shorcut icon" href="recursos/iconos/logo.png"/>
</head>
<body>
    <header>
        <?php include 'php/Ventanas/menu_superior.php' ?>
    </header>
    <main>
        <div class="vista_actual">
            <?php include 'php/Ventanas/Venta/ventana_venta.php' ?>
            <?php include 'php/Ventanas/Venta/footer_venta.php' ?>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>