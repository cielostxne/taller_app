<?php

class PageController extends Controller
{
    public function home()
    {
        $this->render('home', [], 'site');
    }
    public function deportes()
    {

        $this->render('deportes', [], 'site');
    }
    public function noticias()
    {

        $this->render('noticias', [], 'site');
    }
    public function negocios()
    {

        $this->render('negocios', [], 'site');
    }
    public function contacto()
    {

        $this->render('contacto', [], 'site');
    }
    public function avisos()
    {

        $this->render('avisos', [], 'site');
    }
    public function registro()
    {

        $this->render('registro', [], 'site');
    }
    public function registroExitoso()
    {
        $this->render('registroExitoso', [], 'site');
    }
    public function listaUsuarios()
    {
        $this->render('listaUsuarios', [], 'site');
    }
}

