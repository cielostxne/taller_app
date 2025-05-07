<?php
class Categoria {
    public $id;
    public $nombre;
    public $descripcion;

    public function __construct($id, $nombre, $descripcion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    // Método para guardar una nueva categoría
    public static function guardar($conn, $nombre, $descripcion) {
        $stmt = $conn->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return $stmt->execute();
    }

    // Método para obtener todas las categorías
    public static function obtenerTodas($conn) {
        $stmt = $conn->query("SELECT * FROM categorias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener una categoría por ID
    public static function obtenerPorId($conn, $id) {
        $stmt = $conn->prepare("SELECT * FROM categorias WHERE Id_categorias = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoria) {
            return new Categoria($categoria['Id_categorias'], $categoria['nombre'], $categoria['descripcion']);
        } else {
            return null;
        }
    }
    public static function obtenerPorNombre($conn, $nombre) {
        $stmt = $conn->prepare("SELECT * FROM categorias WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoria) {
            return new Categoria($categoria['Id_categorias'], $categoria['nombre'], $categoria['descripcion']);
        } else {
            return null;
        }
    }

}