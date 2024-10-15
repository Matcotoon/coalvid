<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
// Importar Intervention Image
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){

        $propiedades = Propiedad::all();

        $vendedores = Vendedor::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;


        $router->render('propiedades/admin',[
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear(Router $router){

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $propiedad = new Propiedad($_POST['propiedad']);
    
            // Generar un nombre único
            $nombreImagen1 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen2 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen3 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen4 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen5 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen6 = md5( uniqid( rand(), true ) ) . ".jpg";
             //Asignar nuevo nombre al video
            $nuevoNombre = uniqid( "video-", true ) . '.' ."mp4";

            $nombreVideo = $_FILES['video']['name'];
            $tmpVideo = $_FILES['video']['tmp_name'];
            $error = $_FILES['video']['error'];

            if ($error === 0) {
            $video_ex = pathinfo($nombreVideo, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array("mp4", 'webm', 'ogv', 'flv');

            if(in_array($video_ex_lc, $allowed_exs)){

            //debuguear($nuevoNombre);

            $video_upload_path = CARPETA_VIDEOS . $nuevoNombre;            
            move_uploaded_file($tmpVideo, $video_upload_path);

            //debuguear($nuevoNombre);
            
            

            //Crear carpeta para guardar videos
            if(!is_dir(CARPETA_VIDEOS)) {
                mkdir(CARPETA_VIDEOS);
            }
        }
    }

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen1']) {
                $image1 = Image::make($_FILES['propiedad']['tmp_name']['imagen1'])->fit(800,600);
                $propiedad->setImagen1($nombreImagen1);
            }
            if($_FILES['propiedad']['tmp_name']['imagen2']) {
                $image2 = Image::make($_FILES['propiedad']['tmp_name']['imagen2'])->fit(800,600);
                $propiedad->setImagen2($nombreImagen2);
            }
            if($_FILES['propiedad']['tmp_name']['imagen3']) {
                $image3 = Image::make($_FILES['propiedad']['tmp_name']['imagen3'])->fit(800,600);
                $propiedad->setImagen3($nombreImagen3);
            }
            if($_FILES['propiedad']['tmp_name']['imagen4']) {
                $image4 = Image::make($_FILES['propiedad']['tmp_name']['imagen4'])->fit(800,600);
                $propiedad->setImagen4($nombreImagen4);
            }
            if($_FILES['propiedad']['tmp_name']['imagen5']) {
                $image5 = Image::make($_FILES['propiedad']['tmp_name']['imagen5'])->fit(800,600);
                $propiedad->setImagen5($nombreImagen5);
            }
            if($_FILES['propiedad']['tmp_name']['imagen6']) {
                $image6 = Image::make($_FILES['propiedad']['tmp_name']['imagen6'])->fit(800,600);
                $propiedad->setImagen6($nombreImagen6);
            }
            if($nuevoNombre){
                $propiedad->setVideo($nuevoNombre);
            }
            
            // Validar
            $errores = $propiedad->validar();
            //debuguear($propiedad);
    
            if(empty($errores)) {
            
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                // Guarda la imagen en el servidor
                $image1->save(CARPETA_IMAGENES . $nombreImagen1);
                $image2->save(CARPETA_IMAGENES . $nombreImagen2);
                $image3->save(CARPETA_IMAGENES . $nombreImagen3);
                $image4->save(CARPETA_IMAGENES . $nombreImagen4);
                $image5->save(CARPETA_IMAGENES . $nombreImagen5);
                $image6->save(CARPETA_IMAGENES . $nombreImagen6);
                
    
                // Guarda en la base de datos
                $propiedad->guardar();
    
               
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
        
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();

        //Metodo post para actualizar

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
    
            // Validación
            $errores = $propiedad->validar();
    
            // Subida de archivos
            // Generar un nombre único
            $nombreImagen1 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen2 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen3 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen4 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen5 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen6 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nuevoNombre = uniqid( "video-", true ) . '.' ."mp4";

            $nombreVideo = $_FILES['video']['name'];
            $tmpVideo = $_FILES['video']['tmp_name'];
            $error = $_FILES['video']['error'];

            if ($error === 0) {
            $video_ex = pathinfo($nombreVideo, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array("mp4", 'webm', 'ogv', 'flv');

            if(in_array($video_ex_lc, $allowed_exs)){

            //debuguear($nuevoNombre);

            $video_upload_path = CARPETA_VIDEOS . $nuevoNombre;            
            move_uploaded_file($tmpVideo, $video_upload_path);

            //debuguear($nuevoNombre);
            
            //Crear carpeta para guardar videos
            if(!is_dir(CARPETA_VIDEOS)) {
                mkdir(CARPETA_VIDEOS);
            }
        }
    }
    
    
            if($_FILES['propiedad']['tmp_name']['imagen1']) {
                $image1 = Image::make($_FILES['propiedad']['tmp_name']['imagen1'])->fit(800,600);
                $propiedad->setImagen1($nombreImagen1);
            }
            if($_FILES['propiedad']['tmp_name']['imagen2']) {
                $image2 = Image::make($_FILES['propiedad']['tmp_name']['imagen2'])->fit(800,600);
                $propiedad->setImagen2($nombreImagen2);
            }
            if($_FILES['propiedad']['tmp_name']['imagen3']) {
                $image3 = Image::make($_FILES['propiedad']['tmp_name']['imagen3'])->fit(800,600);
                $propiedad->setImagen3($nombreImagen3);
            }
            if($_FILES['propiedad']['tmp_name']['imagen4']) {
                $image4 = Image::make($_FILES['propiedad']['tmp_name']['imagen4'])->fit(800,600);
                $propiedad->setImagen4($nombreImagen4);
            }
            if($_FILES['propiedad']['tmp_name']['imagen5']) {
                $image5 = Image::make($_FILES['propiedad']['tmp_name']['imagen5'])->fit(800,600);
                $propiedad->setImagen5($nombreImagen5);
            }
            if($_FILES['propiedad']['tmp_name']['imagen6']) {
                $image6 = Image::make($_FILES['propiedad']['tmp_name']['imagen6'])->fit(800,600);
                $propiedad->setImagen6($nombreImagen6);
            }
            if($nuevoNombre){
                $propiedad->setVideo($nuevoNombre);
            }
            
            if(empty($errores)) {
                // Almacenar la imagen
                if($_FILES['propiedad']['tmp_name']['imagen1']) {
                    $image1->save(CARPETA_IMAGENES . $nombreImagen1);
                }
                if($_FILES['propiedad']['tmp_name']['imagen2']) {
                    $image2->save(CARPETA_IMAGENES . $nombreImagen2);
                }
                if($_FILES['propiedad']['tmp_name']['imagen3']) {
                    $image3->save(CARPETA_IMAGENES . $nombreImagen3);
                }
                if($_FILES['propiedad']['tmp_name']['imagen4']) {
                    $image4->save(CARPETA_IMAGENES . $nombreImagen4);
                }
                if($_FILES['propiedad']['tmp_name']['imagen5']) {
                    $image5->save(CARPETA_IMAGENES . $nombreImagen5);
                }
                if($_FILES['propiedad']['tmp_name']['imagen6']) {
                    $image6->save(CARPETA_IMAGENES . $nombreImagen6);
                }
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                $tipo = $_POST['tipo'];
                
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
                
            }
        }
    }
}