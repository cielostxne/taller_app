



// Script: Fecha y hora
function actualizarFechaHora() {
    const ahora = new Date();
    const opcionesFecha = {
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
    };
    const fecha = ahora.toLocaleDateString('es-CL', opcionesFecha);
    const hora = ahora.toLocaleTimeString('es-CL', { hour12: false });
    document.getElementById("fechaHora").textContent = `${fecha} - ${hora}`;
}

setInterval(actualizarFechaHora, 1000);
actualizarFechaHora();



// Función para cargar artículos según la categoría
function mostrarArticulosPorCategoria(categoria, contenedorID) {
    const articulos = JSON.parse(localStorage.getItem('articulos')) || [];

    // Filtrar los artículos por la categoría seleccionada
    const articulosFiltrados = articulos.filter(a => a.categoria === categoria);

    // Obtener el contenedor correspondiente
    const contenedor = document.getElementById(contenedorID);
    if (!contenedor) {
        console.warn(`Contenedor con ID "${contenedorID}" no encontrado.`);
        return; // Salir si no existe el contenedor
    }

    // Limpiar el contenedor y agregar los artículos filtrados
    contenedor.innerHTML = "";
    articulosFiltrados.forEach(a => {
        const div = document.createElement('article');
        div.classList.add('articulo');
        div.innerHTML = `
            <h3>${a.titulo}</h3>
            <p><strong>Categoría:</strong> ${a.categoria}</p><br>
            <p>${a.contenido}</p>
        `;
        contenedor.prepend(div); // Agregar al inicio
    });
}

// Función para mostrar artículos según la página actual
function cargarArticulosPaginaActual() {
    const paginaActual = window.location.pathname.split("/").pop(); // Nombre del archivo actual

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
            console.warn('Página desconocida. No se cargaron artículos.');
            return; // No hacer nada si la página no es reconocida
    }

    // Mostrar artículos filtrados por la categoría actual
    mostrarArticulosPorCategoria(categoria, contenedorID);
}

// Llama a la función al cargar la página
cargarArticulosPaginaActual();

// Evento para manejar el formulario flotante y agregar artículos dinámicamente
document.getElementById('formArticulo').addEventListener('submit', function (e) {
    e.preventDefault(); // Evitar la recarga de la página

    const titulo = document.getElementById('tituloArticulo').value.trim();
    const contenido = document.getElementById('contenidoArticulo').value.trim();
    const categoria = document.getElementById('categoriaArticulo').value;

    if (titulo && contenido && categoria) {
        const nuevoArticulo = { titulo, contenido, categoria };

        // Guardar el nuevo artículo en localStorage
        const articulos = JSON.parse(localStorage.getItem('articulos')) || [];
        articulos.unshift(nuevoArticulo); // Agregar al inicio
        localStorage.setItem('articulos', JSON.stringify(articulos));

        // Actualizar la visualización en la página actual
        const paginaActual = window.location.pathname.split("/").pop();
        let contenedorID;
        if (paginaActual === 'deportes_page.html' && categoria === 'Deportes') {
            contenedorID = 'contenedorArticulosDeportes';
        } else if (paginaActual === 'noticias_page.html' && categoria === 'Noticias') {
            contenedorID = 'contenedorArticulosNoticias';
        } else if (paginaActual === 'negocios_page.html' && categoria === 'Negocios') {
            contenedorID = 'contenedorArticulosNegocios';
        }

        if (contenedorID) {
            mostrarArticulosPorCategoria(categoria, contenedorID);
        }

        alert("Noticia Agregada")

        // Cerrar y limpiar el formulario
        cerrarFormulario();
        this.reset();
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
