<?php
class Contacto {
    public $nombre;
    public $email;
    public $mensaje;
    public $fecha_envio;

    public function __construct($nombre, $email, $mensaje, $fecha_envio) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
        $this->fecha_envio = $fecha_envio;
    }

    public static function guardar($conn, $nombre, $email, $mensaje) {
        $fecha_envio = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual
        $stmt = $conn->prepare("INSERT INTO contacto (nombre, email, mensaje, fecha_envio) VALUES (:nombre, :email, :mensaje, :fecha_envio)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->bindParam(':fecha_envio', $fecha_envio);

        return $stmt->execute(); // Devuelve true si la inserción es exitosa
    }
}