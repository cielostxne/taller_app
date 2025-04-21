document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.navbar-burger');
    const menu = document.querySelector('#navbarMenu');

    burger.addEventListener('click', () => {
        // Alternar la clase is-active en el botón y el menú
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
});


// Script: Fecha y hora
function actualizarFechaHora() {
    const ahora = new Date();
    const opcionesFecha = {
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
    };
    const fecha = ahora.toLocaleDateString('es-CL', opcionesFecha);
    const hora = ahora.toLocaleTimeString('es-CL', { hour12: false });
    

    document.getElementById("fechaHora").textContent = `${fecha} - ${hora}`;
    document.getElementById("fechaHoraDesktop").textContent = `${fecha} - ${hora}`;

}

setInterval(actualizarFechaHora, 1000);
actualizarFechaHora();

// Función para contar artículos en un contenedor específico
function contarElementos(contenedorID, contadorID) {
    // Obtener el contenedor por su ID
    const contenedor = document.getElementById(contenedorID);

    if (contenedor) {
        // Contar los elementos <article> dentro del contenedor
        const cantidadArticulos = contenedor.getElementsByClassName('articulo').length;

        // Actualizar el contador en el DOM
        const contadorElemento = document.getElementById(contadorID);
        if (contadorElemento) {
            contadorElemento.textContent = cantidadArticulos; // Mostrar la cantidad
        }
    } else {
        console.warn(`Contenedor con ID "${contenedorID}" no encontrado.`);
    }
}

// Función para contar artículos por categoría y actualizar contadores en el DOM
function contarArticulosPorCategoria() {
    const articulos = JSON.parse(localStorage.getItem('articulos')) || [];
    const contadores = {
        Deportes: 0,
        Noticias: 0,
        Negocios: 0
    };

    const contador = contarArticulosEnSeccion()

    articulos.forEach(articulo => {
        if (contadores[articulo.categoria] !== undefined) {
            contadores[articulo.categoria] = contador;
        }
    });
    contadores[articulos.categoria] = contador;

    // Actualizamos los contadores correspondientes
    document.getElementById('contadorPost').textContent = contador || 0;

}

// Función para cargar artículos según la categoría
function mostrarArticulosPorCategoria(categoria, contenedorID) {
    const articulos = JSON.parse(localStorage.getItem('articulos')) || [];
    const articulosFiltrados = articulos.filter(a => a.categoria === categoria);

    const contenedor = document.getElementById(contenedorID);
    if (!contenedor) {
        console.warn(`Contenedor con ID "${contenedorID}" no encontrado.`);
        return;
    }

    contenedor.innerHTML = "";
    articulosFiltrados.forEach(a => {
        const div = document.createElement('article');
        div.innerHTML = `
            <article class="is-one-third box">
                <h3 class="title is-4">${a.titulo}</h3>
                <button class="button">
                    <p><span class="subtitle">Categoría:</span> ${a.categoria}</p>
                </button>
                <p>${a.contenido}</p>
            </article>
        `;
        contenedor.prepend(div);
    });


    // Actualizar los contadores dinámicamente
    contarArticulosPorCategoria();
}

// Función para mostrar artículos según la página actual
function cargarArticulosPaginaActual() {
    const paginaActual = window.location.pathname.split("/").pop();

    let categoria, contenedorID;
    switch (paginaActual) {
        case 'deportes_page.html':
            categoria = 'Deportes';
            contenedorID = 'contenedorArticulosDeportes';
            break;
        case 'noticias_page.html':
            categoria = 'Noticias';
            contenedorID = 'contenedorArticulosNoticias';
            break;
        case 'negocios_page.html':
            categoria = 'Negocios';
            contenedorID = 'contenedorArticulosNegocios';
            break;
        default:
            console.warn('Página desconocida.');
            return;
    }

    mostrarArticulosPorCategoria(categoria, contenedorID);
}

// Evento para manejar el formulario flotante y agregar artículos dinámicamente
document.getElementById('formArticulo').addEventListener('submit', function (e) {
    e.preventDefault(); // Evitar el recargo de la página

    const titulo = document.getElementById('tituloArticulo').value.trim();
    const contenido = document.getElementById('contenidoArticulo').value.trim();
    const categoria = document.getElementById('categoriaArticulo').value;

    if (titulo && contenido && categoria) {
        // Crear el nuevo artículo
        const nuevoArticulo = { titulo, contenido, categoria };

        // Obtener los artículos actuales desde localStorage
        const articulos = JSON.parse(localStorage.getItem('articulos')) || [];
        articulos.unshift(nuevoArticulo); // Añadir el nuevo artículo al inicio
        localStorage.setItem('articulos', JSON.stringify(articulos)); // Guardar en localStorage

        alert("Artículo agregado correctamente");



        // Limpiar el formulario
        this.reset();
        cerrarFormulario();
        // Recargar la página después del alert
        setTimeout(() => {
            location.reload();
        }, 500); // Pequeño retraso para que el usuario vea la alerta

    }
});


// Función para mostrar/ocultar el formulario flotante
function toggleFormulario() {
    const formulario = document.getElementById("formulario");
    formulario.style.display = (formulario.style.display === "none" || formulario.style.display === "") ? "block" : "none";
}

// Función para cerrar el formulario flotante
function cerrarFormulario() {
    document.getElementById("formulario").style.display = "none";
}

// Función para contar todos los artículos dentro de ".contenedor-articulos"
function contarArticulosEnSeccion() {
    // Obtener el contenedor de artículos
    const contenedor = document.querySelector(".contenedor-articulos");

    // Verificar si el contenedor existe
    if (contenedor) {
        // Obtener todos los artículos dentro del contenedor
        const articulos = contenedor.getElementsByClassName("is-one-third box");

        // Contar la cantidad de artículos
        const cantidadArticulos = articulos.length;

        // Actualizar el contador en el DOM (asegúrate de tener este elemento en el HTML)
        const contadorElemento = document.getElementById("contadorTotalArticulos");
        if (contadorElemento) {
            contadorElemento.textContent = cantidadArticulos;
        }

        console.log(`Total de artículos en la sección: ${cantidadArticulos}`);
        return cantidadArticulos;
    } else {
        console.warn('No se encontró el contenedor con la clase "contenedor-articulos".');
    }

}

contarArticulosEnSeccion();

// Inicialización al cargar la página
window.onload = function () {
    cargarArticulosPaginaActual();
    contarArticulosPorCategoria();
    contarArticulosEnSeccion();
};

