<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Contacto.php';
require_once __DIR__ . '/../config/conexion.php';

class ContactoController extends Controller {
    public function enviar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contacto = new Contacto(
                htmlspecialchars($_POST['nombre']),
                filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                htmlspecialchars($_POST['mensaje'])
            );

            if ($contacto->guardar()) {
                header("Location: http://elfaroinfinityfreeapp.free.nf/public/page/contactoExitoso");
                exit;
            } else {
                echo json_encode(["status" => "error", "message" => "Error al enviar el mensaje"]);
                exit;
            }
        }
    }
}


$contactoController = new ContactoController();
$contactoController->enviar();
