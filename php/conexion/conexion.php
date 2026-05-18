<?php

$host = "byz3wgmftoa0w8zz00b9-mysql.services.clever-cloud.com"; 
$usuario = "uiaull1jq652jylj";  
$contrasena = "hlBPVSgsbZFqqcWSIvyL";
$base_datos = "byz3wgmftoa0w8zz00b9";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>