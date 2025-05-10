<?php


class Articulo {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para guardar un artículo
    public function guardar($titulo, $id_categoria, $contenido, $id_usuario) {
        $sql = "INSERT INTO articulos (titulo, id_categoria, contenido, id_usuario) VALUES (:titulo, :id_categoria, :contenido, :id_usuario)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo' => $titulo,
            ':id_categoria' => $id_categoria,
            ':contenido' => $contenido,
            ':id_usuario' => $id_usuario
        ]);
    }

    // Método para obtener artículos por categoría
    public function obtenerPorCategoria($id_categoria) {
        $sql = "SELECT titulo, contenido FROM articulos WHERE id_categoria = :id_categoria ORDER BY id_articulos DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_categoria' => $id_categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}