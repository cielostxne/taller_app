<?php
require_once __DIR__ . '/../config/Database.php'; // Aseguramos la conexión

class Usuario {
    private $db;
    public $nombre;
    public $email;
    public $password;

    public function __construct($nombre = null, $email = null, $password = null) {
    $this->db = Database::getInstance()->getConnection();
    if ($nombre && $email && $password) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}

    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES (:nombre, :correo, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $this->nombre,
            ':correo' => $this->email,
            ':password' => $this->password
        ]);
    }

    public function obtenerUsuarios() {
        $stmt = $this->db->query("SELECT nombre, correo FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

