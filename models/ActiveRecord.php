<?php


namespace Model;


class ActiveRecord{
    //Base de datos
    protected static $db;
    protected static $columnasDB = [];

    protected static $tabla = '';

    //Errores
    protected static $errores =[];

   

    //Definir la conexion a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    

    public function guardar(){
        if(!is_null($this->id)){
            //Actualizar
            $this -> actualizar();
        }else{
            //Creando un nuevo registro
            $this-> crear();
        }
    }

    public function crear(){

        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        //Insertar en la base de datos
        $query =  "INSERT INTO " . static::$tabla  . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";  
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        // debuguear($query);
        // exit;
        
        $resultado = self::$db->query($query);


        //Mensaje de exito
        if($resultado){
            //Redireccionar al usuario
            header('Location: /admin?resultado=1');
           }
    }

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();


        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query ="UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        //debuguear($valores);

        if($resultado) {
            //Redireccionar al usuario
            header("Location: /admin?resultado=2");
        }
    }

    //Eliminar un registro
    public function eliminar(){

        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen1();
            $this->borrarImagen2();
            $this->borrarImagen3();
            $this->borrarImagen4();
            $this->borrarImagen5();
            $this->borrarImagen6();
            $this->borrarVideo();
            header('Location: /admin?resultado=3');
        } 
    }

    //Identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
           $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
        
    }
    //Subida de archivos
    public function setImagen1($imagen1){

        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this -> borrarImagen1();
        }
        //Asignar al atributo de imagen el nombre d ela imagen
        if($imagen1){
            $this->imagen1 = $imagen1;
        }
    }

    public function setImagen2($imagen2){

        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this -> borrarImagen2();
        }
        //Asignar al atributo de imagen el nombre d ela imagen
        if($imagen2){
            $this->imagen2 = $imagen2;
        }
    }
    public function setImagen3($imagen3){

        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this -> borrarImagen3();
        }
        //Asignar al atributo de imagen el nombre d ela imagen
        if($imagen3){
            $this->imagen3 = $imagen3;
        }
    }
    public function setImagen4($imagen4){

        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this -> borrarImagen4();
        }
        //Asignar al atributo de imagen el nombre d ela imagen
        if($imagen4){
            $this->imagen4 = $imagen4;
        }
    }
    public function setImagen5($imagen5){

        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this -> borrarImagen5();
        }
        //Asignar al atributo de imagen el nombre d ela imagen
        if($imagen5){
            $this->imagen5 = $imagen5;
        }
    }
    public function setImagen6($imagen6){

        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this -> borrarImagen6();
        }
        //Asignar al atributo de imagen el nombre d ela imagen
        if($imagen6){
            $this->imagen6 = $imagen6;
        }
    }
    public function setVideo($nuevoNombre){

        if(!is_null($this->id)){
            $this -> borrarVideo();
        }
        if($nuevoNombre){
            $this->video = $nuevoNombre;
        }
    }
    

    //Elimina el archivo
    public function borrarImagen1(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen1);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen1);
        }
    }

    public function borrarImagen2(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen2);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen2);
        }
    }
    public function borrarImagen3(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen3);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen3);
        }
    }
    public function borrarImagen4(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen4);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen4);
        }
    }
    public function borrarImagen5(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen5);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen5);
        }
    }
    public function borrarImagen6(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen6);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen6);
        }
    }
    public function borrarVideo(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_VIDEOS . $this->video);
        if($existeArchivo){
            unlink(CARPETA_VIDEOS . $this->video);
        }
    }

    //Validacion 

    public static function getErrores(){

        return static::$errores;
    }
    
    public function validar(){

        static::$errores = []; 
        return static::$errores;
    }

    //Lista todas los registros
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;


        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;


        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Busca una propiedad por su id
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado -> fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria

        $resultado -> free();

        //Retornar los resultados

        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto -> $key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario

    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this -> $key = $value; 
            }
        }
    }
}