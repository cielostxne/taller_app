<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Contacto.php';
require_once __DIR__ . '/../config/conexion.php';

class ContactoController extends Controller
{
    public function enviar()
    {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars($_POST['nombre']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $mensaje = htmlspecialchars($_POST['mensaje']);

            // Guardar en la base de datos usando el modelo Contacto
            if (Contacto::guardar($conn, $nombre, $email, $mensaje)) {
                header("Location: http://elfaroinfinityfreeapp.free.nf/public/page/contactoExitoso");
                exit;
            } else {
                echo "Error al enviar el mensaje.";
                exit;
            }
        }
    }
}

// **Ejecutar el método automáticamente**
$contactoController = new ContactoController();
$contactoController->enviar();