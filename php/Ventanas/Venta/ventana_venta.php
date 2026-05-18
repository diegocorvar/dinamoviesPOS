<section class="vista_venta">
    <!-- =====================
    Barra de búsqueda
    ========================== -->
    <section class="contenedor_busqueda_producto">
        <form onsubmit="return false;">
            <input type="text" id="input_id_producto" name="nombre_producto">
            <button class="btn_busqueda_producto"><img class="icono_busqueda" src="../../recursos/iconos/lupa.png"></button>
        </form>
        <div class="contenedor_resultados_busqueda">
            <ul></ul>
        </div>
    </section>

    <!-- =====================
    Lista de productos (Carrito de compras)
    ========================== -->
    <section class="carrito_compras">

        <!-- Lista de productos -->
        <div class="contenedor_tabla_carrito_compras">
            <table class="tabla_carrito_compras">
                <tr>
                    <th class="encabezado_tabla_venta columna_codigo">Código</th>
                    <th class="encabezado_tabla_venta columna_titulo">Título</th>
                    <th class="encabezado_tabla_venta columna_cantidad">Cantidad</th>
                    <th class="encabezado_tabla_venta columna_precio">Precio u.</th>
                    <th class="encabezado_tabla_venta columna_total">Total</th>
                </tr>
            </table>
        </div>

        <!-- Detalles de película seleccionada -->
        <div class="contenedor_detalles_pelicula_carrito">
            <div class="detalle_contenido">
                <img class="caratula_pelicula" src="../../recursos/caratulas/default.png">
                <div class="fila_detalles">
                    <div class="detalle_pelicula">
                        <div class="titulo_detalle imdb"><span>IMDb</span></div>
                        <div class="informacion_detalle"><span></span></div>
                    </div>
                    <div class="detalle_pelicula ">
                        <div class="titulo_detalle clasificacion"><span>Clasificación</span></div>
                        <div class="informacion_detalle"><span></span></div>
                    </div>
                </div>
                <div class="fila_detalles">
                    <div class="detalle_pelicula">
                        <div class="titulo_detalle genero"><span>Generos</span></div>
                        <div class="informacion_detalle generos">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn_eliminar_pelicula_carrito">
                <img src="../../recursos/iconos/basura.png">
            </button>
        </div>
    </section>

    <div class="contenedor_flotante contenedor_cantidad_peliculas">
        <p>Cantidad</p>
        <form action="">
            <input type="number" id="input_cantidad_peliculas" name="cantidad" value=1 min=1 max=10 required>
            <button class="btn_confirmar_cantidad" type="submit">Ok</button>
        </form>
    </div>

    <div class="contenedor_flotante contenedor_realizar_venta">
        <p class="encabezado_resumen_pago">Métodos de pago</p>
        <div class="contenedor_btns_metodo_pago">
            <button class="btn_elegir_metodo_pago btn_elegir_efectivo">Efectivo</button>
            <button class="btn_elegir_metodo_pago btn_elegir_transferencia">Transferencia</button>
            <button class="btn_elegir_metodo_pago btn_elegir_tarjeta">Tarjeta</button>
        </div>
        <div class="contenedor_resumen_pago">
            <p class="encabezado_resumen_pago subtitulo">Total</p>
            <p class="formato_dinero">$ <span>00.00</span></p>
            <p class="encabezado_resumen_pago subtitulo">Pagó con:</p>
            <div class="formato_dinero">
                <span>$</span> 
                <input
                    type="number"
                    value=0
                    name="dinero_pagado"
                    id="inpt_dinero_pagado"
                />
            </div>
        </div>
        <div class="contenedor_controles_realizar_venta">
            <div class="control_realizar_venta">
                <button class="btn_accion_ventana_realizar_venta cerrar_venta">
                    <img src="../../../recursos/iconos/cerrar.png">
                </button>
            </div>
            <div class="contenedor_cambio_cliente">
                <p>Cambio:</p>
                <p class="formato_dinero">$ <span>00.00</span></p>
            </div>
            <div class="control_realizar_venta">
                <button class="btn_accion_ventana_realizar_venta confirmar_venta">
                    <img src="../../../recursos/iconos/confirmar.png">
                </button>
            </div>
        </div>
    </div>

    <div class="contenedor_flotante contenedor_seleccionar_cliente">
        <p>¿A quien le vamos a vender hoy?</p>
        <form action="">
            <input type="text">
            <div class="contenedor_resultados_busqueda">
                <ul></ul>
            </div>
            <button>OK</button>
            <button>Cancelar</button>
        </form>
    </div>
</section>