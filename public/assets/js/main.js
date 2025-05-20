
document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.navbar-burger');
    const menu = document.querySelector('#navbarMenu');

    burger.addEventListener('click', () => {
        // Alternar la clase is-active en el botón y el menú
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });


});

//-----------------------
// HORA

function actualizarFechaHora() {
    const ahora = new Date();
    const opcionesFecha = { weekday: 'short', day: '2-digit', month: '2-digit', year: 'numeric' };
    let fecha = ahora.toLocaleDateString('es-CL', opcionesFecha);

    // Reemplazo el formato de fecha para mantener el formato deseado
    fecha = fecha.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2-$1-$3'); 

    const hora = ahora.toLocaleTimeString('es-CL', { hour12: false });



    const elementoFechaHora = document.getElementById("fechaHora");
    const elementoFechaHoraDesktop = document.getElementById("fechaHoraDesktop");

    if (elementoFechaHora) {
        elementoFechaHora.textContent = `${fecha} - ${hora}`;
    }

    if (elementoFechaHoraDesktop) {
        elementoFechaHoraDesktop.textContent = `${fecha} - ${hora}`;
    }
}

setInterval(actualizarFechaHora, 1000);
actualizarFechaHora();


(function () {
    var actualizarHora = function () {
        // Obtenemos la fecha actual, incluyendo las horas, minutos, segundos, dia de la semana, dia del mes, mes y año;
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();

        // Accedemos a los elementos del DOM para agregar mas adelante sus correspondientes valores
        var pHoras = document.getElementById('horas'),
            pAMPM = document.getElementById('ampm'),
            pMinutos = document.getElementById('minutos'),
            pSegundos = document.getElementById('segundos'),
            pDiaSemana = document.getElementById('diaSemana'),
            pDia = document.getElementById('dia'),
            pMes = document.getElementById('mes'),
            pYear = document.getElementById('year');


        // Obtenemos el dia se la semana y lo mostramos
        var semana = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
        pDiaSemana.textContent = semana[diaSemana];

        // Obtenemos el dia del mes
        pDia.textContent = dia;

        // Obtenemos el Mes y año y lo mostramos
        var meses = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
        pMes.textContent = meses[mes];
        pYear.textContent = year;

        // Cambiamos las hora de 24 a 12 horas y establecemos si es AM o PM

        if (horas >= 12) {
            horas = horas - 12;
            ampm = ' PM';
        } else {
            ampm = ' AM';
        }

        // Detectamos cuando sean las 0 AM y transformamos a 12 AM
        if (horas == 0) {
            horas = 12;
        }

        // Si queremos mostrar un cero antes de las horas ejecutamos este condicional
        // if (horas < 10){horas = '0' + horas;}
        pHoras.textContent = horas;
        pAMPM.textContent = ampm;

        // Minutos y Segundos
        if (minutos < 10) { minutos = "0" + minutos; }
        if (segundos < 10) { segundos = "0" + segundos; }

        pMinutos.textContent = minutos;
        pSegundos.textContent = segundos;
    };

    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000);
}())

//------------------------

// MOSTRAR ARTICULOS

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
        case 'deportes_page.php':
            categoria = 'Deportes';
            contenedorID = 'contenedorArticulosDeportes';
            break;
        case 'noticias_page.php':
            categoria = 'Noticias';
            contenedorID = 'contenedorArticulosNoticias';
            break;
        case 'negocios_page.php':
            categoria = 'Negocios';
            contenedorID = 'contenedorArticulosNegocios';
            break;
        default:
            console.warn('Página desconocida.');
            return;
    }

    mostrarArticulosPorCategoria(categoria, contenedorID);
}

//------------------------
/*
CONTAR DINAMICAMENTE
*/

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

//------------------------

function mostrarNotificacion(mensaje) {
    const notificacion = document.createElement('div');
    notificacion.classList.add('notification', 'is-success');


    notificacion.innerHTML += mensaje;
    notificacion.style.fontSize = "0.8rem"
    notificacion.style.position = "fixed";
    notificacion.style.top = "20px";
    notificacion.style.right = "20px";
    notificacion.style.zIndex = "1000";

    document.body.appendChild(notificacion);

    // **Darle tiempo para mostrarse antes de recargar**
    setTimeout(() => {
        notificacion.remove();
    }, 5000);
}

//-------------------------
/*
Cargar datos del formulario dinamicamente
*/

// Función para agregar un nuevo artículo al DOM según la categoría
function agregarArticuloAlDOM(articulo) {
    const contenedor = {
        'Deportes': document.getElementById('contenedorArticulosDeportes'),
        'Noticias': document.getElementById('contenedorArticulosNoticias'),
        'Negocios': document.getElementById('contenedorArticulosNegocios')
    }[articulo.categoria]; // Selecciona el contenedor adecuado según la categoría

    if (contenedor) {
        const articuloElemento = document.createElement('article');
        articuloElemento.className = 'is-one-third box';
        articuloElemento.innerHTML = `
            <h3 class="title is-4">${articulo.titulo}</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> ${articulo.categoria}</p>
            </button>
            <p>${articulo.contenido}</p>
        `;
        contenedor.prepend(articuloElemento); // Añade el artículo al inicio del contenedor
    }
}


// Evento para manejar el formulario flotante y agregar artículos dinámicamente
/*
document.getElementById('formArticulo').addEventListener('submit', function (e) {
    //console.log("Evento submit detectado.");

    
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

        mostrarNotificacion("✅ ¡Artículo agregado correctamente!"); // Mostrar notificación en lugar de alert


        agregarArticuloAlDOM(nuevoArticulo);



        // Limpiar el formulario
        this.reset();
        cerrarFormulario();
        // Recargar la página después del alert


    }
});
*/


document.getElementById('formArticulo').addEventListener('submit', async function (e) {
    e.preventDefault(); // Evita recargar la página

    const titulo = document.getElementById('tituloArticulo').value.trim();
    const contenido = document.getElementById('contenidoArticulo').value.trim();
    const categoria = document.getElementById('categoriaArticulo').value;
    //console.log(categoria)
    const id_usuario = 1; // Suponiendo que el usuario tiene ID 1 (deberías obtenerlo dinámicamente)

    if (titulo && contenido && categoria) {
        const formData = new FormData();
        formData.append("titulo", titulo);
        formData.append("contenido", contenido);
        formData.append("categoria", categoria);
        formData.append("id_usuario", id_usuario);

        try {
            const response = await fetch('/app/controllers/ArticuloController.php', {
                method: 'POST',
                body: formData
            });

            const textResponse = await response.text(); // Captura la respuesta como texto
            console.log("Respuesta del servidor:", textResponse); // Mostrar en consola

            const data = JSON.parse(textResponse); // Convertirlo a JSON

            if (data.status === "success") {
                mostrarNotificacion("✅ ¡Artículo agregado correctamente!");
                cerrarFormulario();
            } else {
                mostrarNotificacion("❌ Error al guardar el artículo.");
            }
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion("❌ Error de conexión con el servidor.");
        }

    }
});



// Cargar todos los artículos al iniciar la página
document.addEventListener('DOMContentLoaded', cargarArticulos);

// Función para cargar todos los artículos desde localStorage
function cargarArticulos() {

    const articulos = JSON.parse(localStorage.getItem('articulos')) || [];
    const contenedorDeportes = document.getElementById('contenedorArticulosDeportes');
    const contenedorNoticias = document.getElementById('contenedorArticulosNoticias');
    const contenedorNegocios = document.getElementById('contenedorArticulosNegocios');

    // Limpiar los contenedores antes de añadir nuevos artículos
    contenedorDeportes.innerHTML = '';
    contenedorNoticias.innerHTML = '';
    contenedorNegocios.innerHTML = '';

    articulos.forEach(articulo => agregarArticuloAlDOM(articulo));
}



//--------------------------------

// Función para mostrar/ocultar el formulario flotante
function toggleFormulario() {
    const formulario = document.getElementById("formulario");
    formulario.style.display = (formulario.style.display === "none" || formulario.style.display === "") ? "block" : "none";
}

// Función para cerrar el formulario flotante
function cerrarFormulario() {
    document.getElementById("formulario").style.display = "none";
}





document.querySelectorAll('.breadcrumb a').forEach(enlace => {
    enlace.addEventListener('click', function (event) {
        event.preventDefault(); // Evita el salto brusco
        const destino = document.querySelector(this.getAttribute('href'));
        if (destino) {
            destino.scrollIntoView({
                behavior: "smooth", // Efecto de desplazamiento suave
                block: "start" // Asegura que la sección llegue bien al inicio de la vista
            });
        }
    });
});







// Inicialización al cargar la página
window.onload = function () {
    cargarArticulosPaginaActual();
    contarArticulosPorCategoria();
    contarArticulosEnSeccion();

};



