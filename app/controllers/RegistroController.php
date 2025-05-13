<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/php_errors.log');

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../core/controller.php';

class RegistroController extends Controller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars($_POST['nombre']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $usuario = new Usuario($nombre, $email, $password);

            if ($usuario->guardar()) {
                header("Location: http://elfaroinfinityfreeapp.free.nf/public/page/registroExitoso");
                exit;
            } else {
                echo json_encode(["status" => "error", "message" => "Error al registrar usuario"]);
                exit;
            }
        }
    }

    public function listar() {
    $usuarios = $this->usuarioModel->obtenerUsuarios();
    $this->cargarVista('listaUsuarios.view.php', ['usuarios' => $usuarios]);
    }

    private function cargarVista($vista, $datos) {
    extract($datos); // Extrae las variables para que estén disponibles en la vista
    require __DIR__ . "/../views/$vista";
    }


}

$registroController = new RegistroController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registroController->guardar();
}