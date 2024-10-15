<?php

namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido'];

    public $id;
    public $nombre;
    public $apellido;


    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> nombre = $args['nombre'] ?? '';
        $this -> apellido = $args['apellido'] ?? '';
    
    }

    public function validar(){
        if (!$this->nombre){
            self::$errores[] = "Debes agregar un nombre";
        }
        if (!$this->apellido){
            self::$errores[] = "Debes agregar un apellido";
        }

        return self::$errores;
    }

}