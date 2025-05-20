<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Articulo.php';
require_once __DIR__ . '/../models/Categoria.php';

class ArticuloController extends Controller {
    private $articulo;

    public function __construct() {
        $this->articulo = new Articulo(); // Instancia
    }

    public function guardar() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = htmlspecialchars($_POST['titulo']);
            $id_categoria = $_POST['id_categoria'];
            $contenido = htmlspecialchars($_POST['contenido']);
            $id_usuario = $_POST['id_usuario'];

            if ($this->articulo->guardar($titulo, $id_categoria, $contenido, $id_usuario)) {
                echo json_encode(["status" => "success", "message" => "Artículo guardado correctamente"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error al guardar el artículo"]);
            }
            exit;
        }
    }

    public function obtenerArticulosPorCategoria($id_categoria) {
        header('Content-Type: application/json');

        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);

        if ($articulos) {
            echo json_encode(["status" => "success", "data" => $articulos]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se encontraron artículos"]);
        }
        exit;
    }

    public function noticias() {
        $id_categoria = 4;
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);
        $this->render('noticias', ['articulos' => $articulos], 'site');
    }

    public function deportes() {
        $id_categoria = 1;
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);
        $this->render('deportes', ['articulos' => $articulos], 'site');

    }

    public function negocios() {
        $id_categoria = 3;
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);
        $this->render('negocios', ['articulos' => $articulos], 'site');

    }
    private function cargarVista($vista, $datos) {
        extract($datos);
        require __DIR__ . "/../views/$vista";
    }
}
