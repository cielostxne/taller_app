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
    public function noticias_regionales ()
    {
        
        $this->render('noticias_regionales',[], 'site');
    }
    public function contacto()
    {

        $this->render('contacto', [], 'site');
    }
    public function contactoExitoso()
    {

        $this->render('contactoExitoso', [], 'site');
    }
    public function avisos()
    {

        $this->render('avisos', [], 'site');
    }
    public function registro()
    {

        $this->render('registro', [], 'site');
    }
    public function login()
    {
        $this->render('login', [], 'site');
    }
    public function registroExitoso()
    {
        $this->render('registroExitoso', [], 'site');
    }
public function listaUsuarios()
    {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerUsuarios();

        $this->render('listaUsuarios', ['usuarios' => $usuarios], 'site');
    }

}

