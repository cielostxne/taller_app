
<?php
require_once __DIR__ . '/../config/Database.php'; //

class Contacto {
    private $db;
    public $nombre;
    public $email;
    public $mensaje;
    public $fecha_envio;

    public function __construct($nombre, $email, $mensaje) {
        $this->db = Database::getInstance()->getConnection();
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
        $this->fecha_envio = date("Y-m-d H:i:s"); 
    }

    public function guardar() {
        $sql = "INSERT INTO contacto (nombre, email, mensaje, fecha_envio) VALUES (:nombre, :email, :mensaje, :fecha_envio)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $this->nombre,
            ':email' => $this->email,
            ':mensaje' => $this->mensaje,
            ':fecha_envio' => $this->fecha_envio
        ]);
    }
}