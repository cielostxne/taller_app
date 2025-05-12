<?php
class Controller
{
protected function render(string $path, array $parameters = [], string $layout = 'site')
{
    // Hace que $articulos, $usuario, etc. estén disponibles en la vista
    extract($parameters);

    // Output buffering para capturar la vista
    ob_start();
    require __DIR__ . "/../views/{$path}.view.php";
    $content = ob_get_clean();

    // Luego incluye el layout, que usará $content
    require __DIR__ . "/../views/layouts/{$layout}.layout.php";
}

}
