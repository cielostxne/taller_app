<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = htmlspecialchars($_POST['email']);
  $nombre = htmlspecialchars($_POST['nombre']);
  $password = htmlspecialchars($_POST['password']);

  echo "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'><title>Registro</title>
        <link rel='stylesheet' href='../../css/bulma.min.css'>
        <link rel='stylesheet' href='../../css/styles.css'>
        </head><body>
        <section class='section'>
        <div class='container'>
        <h2 class='title'>Registro Exitoso</h2>
        <p class='subtitle'>Gracias por registrarte, <strong>$nombre</strong>. ¡Te damos la bienvenida a El Faro!</p>
        <a href='../../index.php' class='button is-link mt-4'>Volver al inicio</a>
        </div>
        </section>
        </body></html>";
}
?>
