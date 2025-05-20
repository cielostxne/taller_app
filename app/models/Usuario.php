<?php
require_once __DIR__ . '/../config/Database.php'; // Aseguramos la conexión

class Usuario {
    private $db;
    public $nombre;
    public $email;
    public $password;
    public $rol;

    public function __construct($nombre = null, $email = null, $password = null, $rol = 'usuario') {
        $this->db = Database::getInstance()->getConnection();
        
        if ($nombre && $email && $password) {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->password = $password;
            $this->rol = $rol; // Se asigna el rol con 'usuario' como valor predeterminado
        }
    }

    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, correo, password, rol) VALUES (:nombre, :correo, :password, :rol)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $this->nombre,
            ':correo' => $this->email,
            ':password' => $this->password,
            ':rol' => $this->rol
        ]);
    }

    public function obtenerUsuarios() {
        try {
            $stmt = $this->db->prepare("SELECT id_usuario, nombre, correo, rol FROM usuarios");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener usuarios: " . $e->getMessage();
            return [];
        }
    }

    public function obtenerRol($email) {
        try {
            $stmt = $this->db->prepare("SELECT rol FROM usuarios WHERE correo = :correo");
            $stmt->execute([':correo' => $email]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado ? $resultado['rol'] : null;
        } catch (PDOException $e) {
            echo "Error al obtener rol: " . $e->getMessage();
            return null;
        }
    }


    // Login Section
    public function autenticar($email, $password) {
        $stmt = $this->db->prepare("SELECT id_usuario,nombre, password, rol FROM usuarios WHERE correo = :correo");
        $stmt->execute([':correo' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario; // Devuelve el usuario autenticado
        }

        return false; // Falla la autenticación
    }

   

    public function obtenerIdPorCorreo($email) {
        $stmt = $this->db->prepare("SELECT id_usuario FROM usuarios WHERE correo = :correo");
        $stmt->execute([':correo' => $email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado['id_usuario'] : null;
    }



}
