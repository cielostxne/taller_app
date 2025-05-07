<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/conexion.php';

class LoginController extends Controller
{
    public function autenticar()
    {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // Obtener usuario desde la base de datos
            $usuario = Usuario::obtenerPorCorreo($conn, $email);

            if ($usuario && password_verify($password, $usuario->password)) {
                // Iniciar sesión
                session_start();
                $_SESSION['usuario_nombre'] = $usuario->nombre;
                $_SESSION['usuario_correo'] = $usuario->email;

                // Redirigir al usuario autenticado
                header("Location: http://elfaroinfinityfreeapp.free.nf/public/");
                exit;
            } else {
                echo "Correo o contraseña incorrectos.";
                exit;
            }
        }
    }
}

// **Ejecutar el método automáticamente**
$loginController = new LoginController();
$loginController->autenticar();