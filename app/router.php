<?php

class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        // Si no se pasa ningún parámetro, ir a page/home
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            $url = ['page', 'home'];
        }

        // ✅ Manejo especial para logout
        if ($url[0] === 'logout') {
            require_once __DIR__ . '/controllers/LogoutController.php';
            exit;
        }

        // ✅ Redirección especial para noticias_regionales (está en PageController)
        if ($url[0] === 'noticias_regionales') {
            $this->controller = 'PageController';
            $this->method = 'noticias_regionales';
        } else {
            // Nombre del controlador (primera parte de la URL)
            $this->controller = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'PageController';

            // Nombre del método (segunda parte de la URL)
            $this->method = !empty($url[1]) ? $url[1] : 'home';
        }

        // Ruta del archivo del controlador
        $controllerFile = __DIR__ . '/controllers/' . $this->controller . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            die("Controlador '{$this->controller}' no encontrado en $controllerFile");
        }
    }

    public function run()
    {
        $controller = new $this->controller();
        $method = $this->method;

        if (method_exists($controller, $method)) {
            $controller->$method();
        } else {
            die("Método '$method' no encontrado en el controlador '{$this->controller}'");
        }
    }
}
