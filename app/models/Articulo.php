<?php
class Articulo {
  public $titulo;
  public $categoria;
  public $contenido;

  public function __construct($titulo, $categoria, $contenido) {
    $this->titulo = $titulo;
    $this->categoria = $categoria;
    $this->contenido = $contenido;
  }
}
