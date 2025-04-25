<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avisos | El Faro</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/2cb25f2c39.js"></script>
  <link rel="icon" href="../imagenes/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>

<body>
  <!-- MENU DE NAVEGACION -->
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand is-flex is-align-items-center is-justify-content-space-between">

      <a class="navbar-item" href="../index.php">
        <img src="../imagenes/logo.jpg" alt="Logo" class="logo">
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
        <a class="navbar-item" href="../paginas/deportes_page.php">Deportes</a>
        <a class="navbar-item " href="../paginas/negocios_page.php">Negocios</a>
        <a class="navbar-item " href="../paginas/noticias_page.php">Noticias</a>
        <a class="navbar-item" href="../paginas/contacto.php">Contacto</a>
        <a class="navbar-item is-active" href="../paginas/avisos.php">Avisos</a>
        <a class="navbar-item" href="../paginas/registro.php">Registro</a>
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

  <section class="seccion">
    <br><br>
    <h2 class="title">Avisos</h2>
    <div class="contenedor-articulos">



      <!-- Artículos estáticos originales -->
      <article class="is-one-third box">
        <h3 class="title is-4">¡Próximamente contaremos con nuestra propia App!</h3>
        <button class="button">
          <p><span class="subtitle">Categoría:</span> Avisos</p>
        </button>
        <p>Estamos desarrollando una aplicación móvil para que vivas toda la experiencia de El Faro desde la palma de tu mano. Noticias, notificaciones en tiempo real y acceso a contenido exclusivo, todo en una sola app. ¡Espérala pronto!</p>
      </article>

      <article class="is-one-third box">
        <h3 class="title is-4">¿Te imaginas un juego que te ayude a estudiar?</h3>
        <button class="button">
          <p><span class="subtitle">Categoría:</span> Avisos</p>
        </button>
        <p>El Faro se une a StudyPals en una colaboración sin precedentes. Prepárate para descubrir un juego que no solo entretiene, sino que también potencia tu productividad. ¡Estudiar nunca fue tan divertido!</p>
      </article>

      <article class="is-one-third box">
        <h3 class="title is-4">Convocatoria abierta: ¡Forma parte de El Faro!</h3>
        <button class="button">
          <p><span class="subtitle">Categoría:</span> Avisos</p>
        </button>
        <p>¿Te apasiona escribir, crear contenido o cubrir eventos? Únete a nuestro equipo de colaboradores y sé parte de una comunidad que busca informar, entretener y transformar. Postulaciones abiertas todo abril.</p>
      </article>

      <div id="contenedorArticulosNoticias"></div>
    </div>

    <a href="../index.html" class="button">Volver al Menú</a>
  </section>

  <?php include('../app/views/partials/footer.php'); ?>

  <script src="../main.js"></script>
</body>
</html>