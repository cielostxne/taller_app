<?php

require_once APP . '/core/controller.php';
require_once APP . '/models/usuario.php';
require_once APP . '/config/conexion.php';

class RegistroController extends Controller
{
    public function index()
    {
        $this->render('registro', [], 'main');
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            global $conn;

            $email = htmlspecialchars($_POST['email']);
            $nombre = htmlspecialchars($_POST['nombre']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $usuario = new Usuario($nombre, $email, $password);

            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (:nombre, :correo, :password)");
            $stmt->bindParam(':nombre', $usuario->nombre);
            $stmt->bindParam(':correo', $usuario->email);
            $stmt->bindParam(':password', $usuario->password);
            $stmt->execute();

            $this->render('registro_exitoso', ['nombre' => $nombre], 'main');
        }
    }
}
