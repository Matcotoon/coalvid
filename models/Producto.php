<?php

namespace Model;

class Producto extends ActiveRecord {

    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'titulo', 'imagen1', 'imagen2', 'imagen3', 'imagen4', 'imagen5', 'imagen6', 'vidrio', 'acero', 'descripcion'];

     
    public $id;
    public $titulo;
    public $imagen1;
    public $imagen2;
    public $imagen3;
    public $imagen4;
    public $imagen5;
    public $imagen6;
    public $vidrio;
    public $acero;
    public $descripcion;
    
    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> titulo = $args['titulo'] ?? '';
        $this -> imagen1 = $args['imagen1'] ?? '';
        $this -> imagen2 = $args['imagen2'] ?? '';
        $this -> imagen3 = $args['imagen3'] ?? '';
        $this -> imagen4 = $args['imagen4'] ?? '';
        $this -> imagen5 = $args['imagen5'] ?? '';
        $this -> imagen6 = $args['imagen6'] ?? '';
        $this -> vidrio = $args['vidrio'] ?? '';
        $this -> acero = $args['acero'] ?? '';
        $this -> descripcion = $args['descripcion'] ?? '';
    }

    public function validar(){
        if (!$this->titulo){
            self::$errores[] = "Debes agregar un titulo";
        }
        if (!$this->imagen1){
            self::$errores[] = "La imagen 1 es obligatoria";
        }
        if (!$this->imagen2){
            self::$errores[] = "La imagen 2 es obligatoria";
        }
        if (!$this->imagen3){
            self::$errores[] = "La imagen 3 es obligatoria";
        }
        if (!$this->imagen4){
            self::$errores[] = "La imagen 4 es obligatoria";
        }
        if (!$this->imagen5){
            self::$errores[] = "La imagen 5 es obligatoria";
        }
        if (!$this->imagen6){
            self::$errores[] = "La imagen 6 es obligatoria";
        }
        if (!$this->vidrio){
            self::$errores[] = "El tipo de vidrio es obligatorio";
        }
        if (!$this->acero){
            self::$errores[] = "El material de los accesorios es obligatorio";
        }
        if (!$this->descripcion){
            self::$errores[] = "La descripcion del producto es obligatoria";
        }
        return self::$errores;
    }

    
}