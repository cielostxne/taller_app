<?php
session_start();
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/Database.php';

class LoginController {
    private $maxIntentos = 3;


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // **Protección CSRF**
            if (!isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die(json_encode(["status" => "error", "message" => "Token CSRF inválido"]));
            }

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // **Verificar intentos de login**
            $_SESSION['login_intentos'] = $_SESSION['login_intentos'] ?? 0;

            if ($_SESSION['login_intentos'] >= $this->maxIntentos) {
                die(json_encode(["status" => "error", "message" => "Demasiados intentos fallidos. Intenta más tarde."]));
            }

            // **Instanciar el modelo de usuario y autenticar**
            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->autenticar($email, $password);

            if ($usuario) {
                // **Configurar sesión**
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_rol'] = $usuario['rol'];
                $_SESSION['inicio_sesion'] = time();
                $_SESSION['expira_sesion'] = time() + 86400; // 1 día

                // **Redirección según el rol**
                switch ($usuario['rol']) {
                    case 'admin':
                        header("Location: /public");
                        exit;
                    case 'espectador':
                        header("Location: /view");
                        exit;
                    case 'usuario':
                    default:
                        header("Location: /public");
                        exit;
                }

            } else {
                $_SESSION['login_intentos'] += 1;
                die(json_encode(["status" => "error", "message" => "Correo o contraseña incorrectos"]));
            }
        }
    }
}

// **Instancia del LoginController**
$loginController = new LoginController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->login();
}


?>