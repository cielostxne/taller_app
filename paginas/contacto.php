<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto | El Faro</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  <link rel="icon" href="../imagenes/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>

<body>
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
        <a class="navbar-item is-active" href="../paginas/contacto.php">Contacto</a>
        <a class="navbar-item" href="../paginas/avisos.php">Avisos</a>
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

  <section class="seccion hero hero-gradient">
    <!-- FORMULARIO DE CONTACTO -->
    <section class="section">
      <div class="container container-contacto">
        <h2 class="title">Formulario de Contacto</h2>
        <form action="/app/controllers/ContactoController.php" method="POST">

          <div class="field">
            <label class="label" for="nombre">Nombre</label>
            <div class="control">
              <input class="input" type="text" id="nombre" name="nombre" required>
            </div>
          </div>

          <div class="field">
            <label class="label" for="email">Correo</label>
            <div class="control">
              <input class="input" type="email" id="email" name="email" required>
            </div>
          </div>

          <div class="field">
            <label class="label" for="mensaje">Mensaje</label>
            <div class="control">
              <textarea class="textarea" id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
          </div>

          <div class="control mt-4 control-btn">
            <button type="submit" class="button is-link is-fullwidth">Enviar</button>
          </div>

        </form>
      </div>
    </section>


  </section>
  </section>

  <?php include('../app/views/partials/footer.php'); ?>

  <script src="../main.js"></script>
</body>

</html>