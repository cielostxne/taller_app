<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/php_errors.log'); // Guarda errores en un archivo de log


// Incluir archivos sin depender de APP
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/conexion.php';


class RegistroController extends Controller
{
    public function guardar()
    {
        global $conn; // Accede a la instancia de conexión existente

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitizar entrada del usuario
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $nombre = htmlspecialchars($_POST['nombre']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Crear instancia de usuario
            $usuario = new Usuario($nombre, $email, $password);

            // Preparar la consulta de inserción
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (:nombre, :correo, :password)");
            $stmt->bindParam(':nombre', $usuario->nombre);
            $stmt->bindParam(':correo', $usuario->email);
            $stmt->bindParam(':password', $usuario->password);

            if ($stmt->execute()) {
                // Redirigir al usuario a la página de éxito
                header("Location: http://elfaroinfinityfreeapp.free.nf/public/page/registroExitoso");
                exit;
            } else {
                echo "Error al registrar usuario.";
                exit;
            }
        }
    }
}

// **Ejecutar el método automáticamente**
$registroController = new RegistroController();
$registroController->guardar();
