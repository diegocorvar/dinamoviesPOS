<nav id="menu_superior">
    <!-- =====================
    Botones para cambiar entre ventanas
    ========================== -->
    <div>
        <button class="opcion_menu btn_vente">Venta</button>
        <button class="opcion_menu btn_inventario">Inventario</button>
        <button class="opcion_menu btn_clientes">Clientes</button>
        <button class="opcion_menu btn_reportes">Reportes</button>
    </div>

    <!-- =====================
    Información de sesión
    ========================== -->
    <div>
        <div class="usuario_logueado">
            <div><img class="icono icono_usuario" src="../../recursos/iconos/usuario.png"></div>
            <div><span><?php echo $_SESSION["usuario"]; ?></span></div>
        </div>
        <form class="form_cerrar_sesion" action="php/conexion/cerrar_sesion.php" method="POST">
            <button id="btn_cerrar_sesion" class="opcion_menu">
                <img class="icono icono_cerrar_sesion" src="../../recursos/iconos/cerrar-sesion.png">
            </button>
        </form>
    </div>
</nav>