<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/Articulo.php';
require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../config/conexion.php';

header('Content-Type: application/json'); // Define que la respuesta es JSON

class ArticuloController extends Controller
{
    public function guardar()
    {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = htmlspecialchars($_POST['titulo']);
            $nombre_categoria = $_POST['categoria'];
            $contenido = htmlspecialchars($_POST['contenido']);
            $id_usuario = $_POST['id_usuario'];

            $categoria = Categoria::obtenerPorNombre($conn, $nombre_categoria);

            if (!$categoria) {
                echo json_encode(["status" => "error", "message" => "Categoría inválida"]);
                exit;
            }
            $id_categoria = $categoria->id;

            $articulo = new Articulo($titulo, $id_categoria, $contenido, $id_usuario);
            // Guardar el artículo usando el método del modelo
            if (Articulo::guardar($conn, $articulo->titulo, $articulo->categoria, $articulo->contenido, $articulo->id_usuario)) {
                echo json_encode(["status" => "success", "message" => "Artículo guardado correctamente"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error al guardar el artículo"]);
            }


            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Método inválido"]);
            exit;
        }
    }

    public function obtenerArticulosPorCategoria($id_categoria)
    {
        global $conn;

        $articulos = Articulo::obtenerPorCategoria($conn, $id_categoria);

        if ($articulos) {
            echo json_encode(["status" => "success", "data" => $articulos]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se encontraron artículos"]);
        }
        exit;
    }


}

$articuloController = new ArticuloController();
$articuloController->guardar();