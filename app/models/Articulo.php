<?php
class Articulo {
    public $titulo;
    public $categoria;
    public $contenido;
    public $id_usuario;

    public function __construct($titulo, $categoria, $contenido, $id_usuario) {
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->contenido = $contenido;
        $this->id_usuario = $id_usuario;
    }

    // Método para guardar un artículo
    public static function guardar($conn, $titulo, $categoria, $contenido, $id_usuario) {
        $stmt = $conn->prepare("INSERT INTO articulos (titulo, id_categoria, contenido, id_usuario) VALUES (:titulo, :id_categoria, :contenido, :id_usuario)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':id_categoria', $categoria);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }

    // **Nuevo método para obtener artículos por categoría**
    public static function obtenerPorCategoria($conn, $id_categoria) {
        $stmt = $conn->prepare("SELECT titulo, contenido FROM articulos WHERE id_categoria = :id_categoria ORDER BY id_articulos DESC");
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
