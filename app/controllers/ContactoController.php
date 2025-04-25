<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = htmlspecialchars($_POST['nombre']);
  $email = htmlspecialchars($_POST['email']);
  $mensaje = htmlspecialchars($_POST['mensaje']);
  
  // Por ahora, solo mostramos los datos
  echo "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'><title>Registro</title>
  <link rel='stylesheet' href='../../css/bulma.min.css'>
  <link rel='stylesheet' href='../../css/styles.css'>
  </head><body>
  <section class='section'>
  <div class='container'>
  <h2 class='title'>Registro Exitoso</h2>
  <p class='subtitle'>Gracias tu mensaje, <strong>$nombre</strong>. Te responderemos pronto a <strong>$email</strong></p>
  <a href='../../index.php' class='button is-link mt-4'>Volver al inicio</a>
  </div>
  </section>
  </body></html>";
}
?>
