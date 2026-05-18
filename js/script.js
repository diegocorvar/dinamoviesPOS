const input = document.getElementById("input_id_producto");
const contenedor = document.querySelector(".contenedor_resultados_busqueda ul");

const modalCantidad = document.querySelector(".contenedor_cantidad_peliculas");
const inputCantidad = document.getElementById("input_cantidad_peliculas");
const formCantidad = document.querySelector(".contenedor_cantidad_peliculas form");

const tabla = document.querySelector(".tabla_carrito_compras");

const imgCaratula = document.querySelector(".caratula_pelicula");
const imdb = document.querySelector(".imdb + .informacion_detalle span");
const clasificacion = document.querySelector(".clasificacion + .informacion_detalle span");
const generos = document.querySelector(".generos");

let filaSeleccionada = null;

let peliculaSeleccionada = null;

input.addEventListener("keyup", function () {
    let valor = input.value;

    if (valor.length === 0) {
        contenedor.innerHTML = "";
        return;
    }

    fetch(`/php/Funciones/buscar_pelicula.php?q=${valor}`)
        .then(res => res.json())
        .then(data => {
            contenedor.innerHTML = "";

            data.forEach(pelicula => {
                let li = document.createElement("li");

                li.textContent = pelicula.titulo;
                li.classList.add("resultado_busqueda");

                li.addEventListener("click", () => {
                    peliculaSeleccionada = pelicula;

                    modalCantidad.style.display = "flex";
                    inputCantidad.value = 1;
                    inputCantidad.focus();
                });

                contenedor.appendChild(li);
            });
        });
});


formCantidad.addEventListener("submit", function(e) {
    e.preventDefault();

    const cantidad = parseInt(inputCantidad.value);

    if (!peliculaSeleccionada) return;

    agregarAlCarrito(peliculaSeleccionada, cantidad);

    modalCantidad.style.display = "none";
    peliculaSeleccionada = null;

    input.value = ""; 
    contenedor.innerHTML = "";
});


function agregarAlCarrito(pelicula, cantidad) {
    const filas = tabla.querySelectorAll("tr[data-id]");

    filas.forEach(f => {
        console.log("Fila ID:", f.dataset.id);
    });

    const filaExistente = Array.from(filas).find(f =>
        Number(f.dataset.id) === Number(pelicula.cve_pelicula)
    );

    if (filaExistente) {
        const cantidadCelda = filaExistente.querySelector(".columna_cantidad");
        const totalCelda = filaExistente.querySelector(".columna_total");

        let cantidadActual = parseInt(cantidadCelda.textContent);
        let nuevaCantidad = cantidadActual + cantidad;

        cantidadCelda.textContent = nuevaCantidad;
        totalCelda.textContent = "$" + (nuevaCantidad * pelicula.precio);

        return;
    }

    const fila = document.createElement("tr");
    const total = pelicula.precio * cantidad;

    fila.dataset.id = pelicula.cve_pelicula;
    fila.dataset.codigo_barras = pelicula.codigo_barras || "";
    fila.dataset.titulo = pelicula.titulo;
    fila.dataset.precio = pelicula.precio;
    fila.dataset.imdb = pelicula.imdb || "N/A";
    fila.dataset.clasificacion = pelicula.clasificacion || "N/A";
    fila.dataset.generos = pelicula.generos || "N/A";
    fila.dataset.imagen = pelicula.imagen || "/recursos/caratulas/default.png";

    fila.innerHTML = `
        <td class="fila_tabla_venta columna_codigo">${pelicula.codigo_barras}</td>
        <td class="fila_tabla_venta columna_titulo">${pelicula.titulo}</td>
        <td class="fila_tabla_venta columna_cantidad">${cantidad}</td>
        <td class="fila_tabla_venta columna_precio">$${pelicula.precio}</td>
        <td class="fila_tabla_venta columna_total">$${total}</td>
    `;

    fila.addEventListener("click", () => {
        tabla.querySelectorAll("tr:not(:first-child)").forEach(f => {
            f.classList.remove("seleccionada");
        });

        fila.classList.add("seleccionada");
        filaSeleccionada = fila;

        mostrarDetalles(fila);
    });

    tabla.appendChild(fila);
}

modalCantidad.addEventListener("click", (e) => {
    if (e.target === modalCantidad) {
        modalCantidad.style.display = "none";
    }
});

function mostrarDetalles(fila) {
    imgCaratula.src = fila.dataset.imagen;

    imdb.textContent = fila.dataset.imdb;
    clasificacion.textContent = fila.dataset.clasificacion;

    generos.innerHTML = "";

    let listaGeneros = fila.dataset.generos.split(", ");

    listaGeneros.forEach(g => {
        let span = document.createElement("span");
        span.textContent = g.trim();
        generos.appendChild(span);
    });
}

const btnEliminar = document.querySelector(".btn_eliminar_pelicula_carrito");

btnEliminar.addEventListener("click", () => {
    if (!filaSeleccionada) return;

    filaSeleccionada.remove();

    imgCaratula.src = "/recursos/caratulas/default.png";
    imdb.textContent = "-";
    clasificacion.textContent = "-";
    generos.innerHTML = "";

    filaSeleccionada = null;
});
