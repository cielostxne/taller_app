<?php

class PageController extends Controller
{
    public function home()
    {
        //echo "home";
        //require_once __DIR__ . '/../views/home.view.php';
        $this->render('home',[],'site');
    }
    public function deportes()
    {
        //echo "deportes";
        //require_once __DIR__ . '/../views/deportes.view.php';
        $this->render('deportes',[],'site');
    }
    public function noticias()
    {
        //echo "noticias";
        //require_once __DIR__ . '/../views/noticias.view.php';
        $this->render('noticias',[],'site');
    }
    public function negocios()
    {
        //echo "noticias";
        //require_once __DIR__ . '/../views/negocios.view.php';
        $this->render('negocios',[],'site');
    }
    public function contacto()
    {
        //echo "contacto";
        //require_once __DIR__ . '/../views/contacto.view.php';
        $this->render('contacto',[],'site');
    }
    public function avisos()
    {
        //echo "avisos";
        //require_once __DIR__ . '/../views/avisos.view.php';
        $this->render('avisos',[],'site');
    }
    public function registro()
    {
        //echo "registro";
        //require_once __DIR__ . '/../views/registro.view.php';
        $this->render('registro',[],'site');
    }
}
