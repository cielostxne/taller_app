<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand is-flex is-align-items-center is-justify-content-space-between">

        <a class="navbar-item" href="<?= URL_PATH ?>">
            <img src="<?= URL_PATH ?>/assets/imagenes/logo.jpg" alt="Logo" class="logo">
        </a>

        <!-- Reloj centrado solo en mobile -->
        <div class="navbar-item reloj-mobile">
            <div id="fechaHora" class="reloj-cabecera">domingo, 20 de abril de 2025 - 17:02:13</div>
        </div>


        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>


    </div>



    <div id="navbarMenu" class="navbar-menu">

        <div class="navbar-start">
            <a class="navbar-item" href="<?= URL_PATH ?>/page/deportes">Deportes</a>
            <a class="navbar-item " href="<?= URL_PATH ?>/page/negocios">Negocios</a>
            <a class="navbar-item " href="<?= URL_PATH ?>/page/noticias">Noticias</a>
            <a class="navbar-item" href="<?= URL_PATH ?>/page/contacto">Contacto</a>
            <a class="navbar-item" href="<?= URL_PATH ?>/page/avisos">Avisos</a>
            <a class="navbar-item" href="<?= URL_PATH ?>/page/registro">Registro</a>
            <a class="navbar-item" href="<?= URL_PATH ?>/page/listaUsuarios">Usuarios</a>
        </div>

    </div>

    <!-- Reloj a la derecha en desktop -->
    <div class="navbar-item reloj-desktop">
        <div id="fechaHoraDesktop" class="reloj-cabecera">domingo, 20 de abril de 2025 - 17:02:13</div>
    </div>


    
    <section class="formulario-flotante" id="formulario">
        <button class="btn-cerrar" onclick="cerrarFormulario()">
            <i class="fas fa-times"></i>
        </button>
        <form id="formArticulo">
            <h3>Nuevo artículo</h3>
            <input type="text" id="tituloArticulo" placeholder="Título" required>
            <textarea id="contenidoArticulo" placeholder="Descripción" required></textarea>
            <select id="categoriaArticulo" required>
                <option value="">Selecciona una categoría</option>
                <option value="Deportes">Deportes</option>
                <option value="Noticias">Noticias</option>
                <option value="Negocios">Negocios</option>
            </select>
            <button type="submit">Agregar</button>

        </form>

    </section>

    <button class="btn-flotante" onclick="toggleFormulario()">
        <i class="fas fa-plus"></i>
    </button>


</nav>