<?php

namespace Model;

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'arquitecto', 'aluminio', 'puertas', 'ventanas', 'vidrio', 'imagen1', 'imagen2', 'imagen3', 'imagen4', 'imagen5', 'imagen6', 'video', 'descripcion', 'vendedorId'];

     
    public $id;
    public $titulo;
    public $arquitecto;
    public $aluminio;
    public $puertas;
    public $ventanas;
    public $vidrio;
    public $imagen1;
    public $imagen2;
    public $imagen3;
    public $imagen4;
    public $imagen5;
    public $imagen6;
    public $video;
    public $descripcion;
    public $creado;
    public $vendedorId;
    


    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> titulo = $args['titulo'] ?? '';
        $this -> arquitecto = $args['arquitecto'] ?? '';
        $this -> aluminio = $args['aluminio'] ?? '';
        $this -> puertas = $args['puertas'] ?? '';
        $this -> ventanas = $args['ventanas'] ?? '';
        $this -> vidrio = $args['vidrio'] ?? '';
        $this -> imagen1 = $args['imagen1'] ?? '';
        $this -> imagen2 = $args['imagen2'] ?? '';
        $this -> imagen3 = $args['imagen3'] ?? '';
        $this -> imagen4 = $args['imagen4'] ?? '';
        $this -> imagen5 = $args['imagen5'] ?? '';
        $this -> imagen6 = $args['imagen6'] ?? '';
        $this -> video = $args['video'] ?? '';
        $this -> descripcion = $args['descripcion'] ?? '';
        $this -> creado = date('Y/m/d');
        $this -> vendedorId = $args['vendedorId'] ?? '';
        
    }

    public function validar(){
        if (!$this->titulo){
            self::$errores[] = "Debes agregar un titulo";
        }
        if (!$this->arquitecto){
            self::$errores[] = "Debes agregar un arquitecto";
        }
        if (!$this->aluminio){
            self::$errores[] = "Debes agregar un tipo de aluminio";
        }
        if (!$this->puertas){
            self::$errores[] = "Debes agregar el perfil utilizado en puertas";
        }
        if (!$this->ventanas){
            self::$errores[] = "Debes agregar el perfil utilizado en ventanas";
        }
        if (!$this->vidrio){
            self::$errores[] = "Debes agregar un tipo de vidrio";
        }

        if (!$this->vendedorId){
            self::$errores[] = "Debes elegir un usuario";
        }

        if(!$this->imagen1){
            self::$errores[] = 'La imagen 1 es obligatoria';
        }
        if(!$this->imagen2){
            self::$errores[] = 'La imagen 2 es obligatoria';
        }
        if(!$this->imagen3){
            self::$errores[] = 'La imagen 3 es obligatoria';
        }
        if(!$this->imagen4){
            self::$errores[] = 'La imagen 4 es obligatoria';
        }
        if(!$this->imagen5){
            self::$errores[] = 'La imagen 5 es obligatoria';
        }
        if(!$this->imagen6){
            self::$errores[] = 'La imagen 6 es obligatoria';
        }
        if(!$this->video){
            self::$errores[] = 'El video es obligatorio';
        }
        if(!$this->descripcion){
            self::$errores[] = 'La descripcion es obligatoria';
        }
        
        return self::$errores;
    }

    
}