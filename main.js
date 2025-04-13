
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

// Script: Guardar artículos

const form = document.getElementById('formArticulo');

form.addEventListener('submit', function (e) {
    e.preventDefault();

    const titulo = document.getElementById('tituloArticulo').value.trim();
    const contenido = document.getElementById('contenidoArticulo').value.trim();
    const categoria = document.getElementById('categoriaArticulo').value;

    if (titulo && contenido && categoria) {
        const articulo = { titulo, contenido, categoria };
        const articulos = JSON.parse(localStorage.getItem('articulos')) || [];
        articulos.push(articulo);
        localStorage.setItem('articulos', JSON.stringify(articulos));

        alert('Artículo guardado correctamente.');
        form.reset();
    }
});