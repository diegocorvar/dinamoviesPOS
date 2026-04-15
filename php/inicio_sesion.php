<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/estilos.css"/>
    <link rel="shorcut icon" href="../recursos/imagenes/logo.png"/>
</head>
<body id="body-inicio-sesion">
    <main id="inicio-sesion-contenedor">
        <header>
            <img class="logo" src="../recursos/imagenes/logo.png">
            <h1>Inicia Sesión</h1>
        </header>
        <div id="datos-usuario-contenedor">
            <form>
                <!-- ===== USUARIO ===== -->
                <label for="usuario-inpt" class="set-block">
                    Usuario:
                </label>
                <input
                    id="usuario-inpt"
                    type="text"
                    name="nombre-usuario"
                    required
                    class="set-block"
                />

                <!-- ===== CONTRASEÑA ===== -->
                <label for="pass-inpt" class="set-block">
                    Contraseña:
                </label>
                <input
                    id="pass-inpt"
                    type="password"
                    name="password"
                    required
                    class="set-block"
                />

                <!-- ===== BOTÓN PARA INGRESAR ===== -->
                <button type="submit" id="login-btn">Ingresar</button>
            </form>
        </div>
    </main>
</body>
</html>