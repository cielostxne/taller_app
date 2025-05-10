<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Articulo.php';
require_once __DIR__ . '/../models/Categoria.php';

header('Content-Type: application/json'); // Define que la respuesta es JSON

class ArticuloController extends Controller {
    private $articulo;

    public function __construct() {
        $this->articulo = new Articulo(); // Instancia
    }

    public function guardar() {
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
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);

        if ($articulos) {
            echo json_encode(["status" => "success", "data" => $articulos]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se encontraron artículos"]);
        }
        exit;
    }

    // Método para cargar noticias en la vista
    public function noticias() {
        $id_categoria = 4;
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);
        $this->cargarVista('noticias.view.php', ['articulos' => $articulos]);
    }

    public function deportes() {
        $id_categoria = 1;
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);
        $this->cargarVista('deportes.view.php', ['articulos' => $articulos]);
    }

    public function negocios() {
        $id_categoria = 3;
        $articulos = $this->articulo->obtenerPorCategoria($id_categoria);
        $this->cargarVista('negocios.view.php', ['articulos' => $articulos]);
    }

    private function cargarVista($vista, $datos) {
        extract($datos); // Extrae los datos para que estén disponibles en la vista
        require __DIR__ . "/../views/$vista";
    }

}

$articuloController = new ArticuloController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articuloController->guardar();
}