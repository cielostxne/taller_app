<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$nombreUsuario = isset($_SESSION['usuario_nombre']) ? htmlspecialchars($_SESSION['usuario_nombre'], ENT_QUOTES, 'UTF-8') : '';
?>


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
                <a class="navbar-item" href="<?= URL_PATH ?>/articulo/deportes">Deportes</a>
                <a class="navbar-item" href="<?= URL_PATH ?>/articulo/negocios">Negocios</a>
                <a class="navbar-item" href="<?= URL_PATH ?>/articulo/noticias">Noticias</a>
                <a class="navbar-item" href="<?= URL_PATH ?>/page/noticias_regionales">Regionales</a>
                <a class="navbar-item" href="<?= URL_PATH ?>/page/avisos">Avisos</a>
                <div class="buttons">
                    <a class="button " href="<?= URL_PATH ?>/page/contacto">Contacto</a>
                </div>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <?php if (isset($_SESSION['usuario_id'])): ?>
                            <span class="navbar-item"><strong>Bienvenido, <?= $nombreUsuario; ?></strong></span>
                            <a class="button is-danger" href="<?= URL_PATH ?>/logout">Logout</a>
                        <?php else: ?>
                            <a class="button is-primary" href="<?= URL_PATH ?>/page/registro"><strong>Registro</strong></a>
                            <a class="button is-light" href="<?= URL_PATH ?>/page/login">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


    </div>

    <!-- Reloj a la derecha en desktop -->
    <div class="navbar-item reloj-desktop">
        <div id="fechaHoraDesktop" class="reloj-cabecera">domingo, 20 de abril de 2025 - 17:02:13</div>
    </div>

    
    <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?>
        <section class="formulario-flotante" id="formulario">
            <button class="btn-cerrar" onclick="cerrarFormulario()">
                <i class="fas fa-times"></i>Q
            </button>
            <form id="formArticulo">Q
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
    <?php endif; ?>



</nav>