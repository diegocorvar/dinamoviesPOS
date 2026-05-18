
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();

        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["rol"] = $user["rol"];

        header("Location: ../../index.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="shorcut icon" href="/recursos/iconos/logo.png"/>
</head>
<body>
    <main class="login_background">
        <div class="contenedor_login_form">
            <header>
                <img class="login_logo" src="/recursos/iconos/logo.png">
                <h1>Inicia Sesión</h1>
            </header>
            <form class="form_login" method="POST">
                <label for="input_nombre_usuario">Usuario:
                    <input 
                        type="text"
                        id="input_nombre_usuario"
                        name="usuario"
                        required
                    />
                </label>
                
                <label for="input_password">Contraseña:</label>
                <input 
                    type="password"
                    id="input_password"
                    name="password"
                    required
                />
                <button id="btn_iniciar_sesion" type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </main>
</body>
</html>