<?php


namespace Controllers;
use MVC\Router;
use Model\Producto;

// Importar Intervention Image
use Intervention\Image\ImageManagerStatic as Image;

class ProductoController{
    public static function producto(Router $router){

        $productos = Producto::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('productos/productos',[
            'productos' => $productos,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){

        $productos = new Producto;
        // Arreglo con mensajes de errores
        $errores = Producto::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Crea una nueva instancia */
            $producto = new Producto($_POST['producto']);
    
            // Generar un nombre único
            $nombreImagen1 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen2 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen3 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen4 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen5 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen6 = md5( uniqid( rand(), true ) ) . ".jpg";


            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['producto']['tmp_name']['imagen1']) {
                $image1 = Image::make($_FILES['producto']['tmp_name']['imagen1'])->fit(800,600);
                $producto->setImagen1($nombreImagen1);
            }
            if($_FILES['producto']['tmp_name']['imagen2']) {
                $image2 = Image::make($_FILES['producto']['tmp_name']['imagen2'])->fit(800,600);
                $producto->setImagen2($nombreImagen2);
            }
            if($_FILES['producto']['tmp_name']['imagen3']) {
                $image3 = Image::make($_FILES['producto']['tmp_name']['imagen3'])->fit(800,600);
                $producto->setImagen3($nombreImagen3);
            }
            if($_FILES['producto']['tmp_name']['imagen4']) {
                $image4 = Image::make($_FILES['producto']['tmp_name']['imagen4'])->fit(800,600);
                $producto->setImagen4($nombreImagen4);
            }
            if($_FILES['producto']['tmp_name']['imagen5']) {
                $image5 = Image::make($_FILES['producto']['tmp_name']['imagen5'])->fit(800,600);
                $producto->setImagen5($nombreImagen5);
            }
            if($_FILES['producto']['tmp_name']['imagen6']) {
                $image6 = Image::make($_FILES['producto']['tmp_name']['imagen6'])->fit(800,600);
                $producto->setImagen6($nombreImagen6);
            }
            
            // Validar
            $errores = $producto->validar();
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
                $producto->guardar();
    
               
            }

        }

        $router -> render('productos/crear',[
            'producto' => $producto,
            'errores'=> $errores
        ]);
    }
    public static function actualizar(Router $router){

        $id = validarORedireccionar('/productos');

        $producto = Producto::find($id);

        $errores = Producto::getErrores();

        //Metodo POST para actualizar

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['producto'];
    
            $producto->sincronizar($args);
    
    
            // Validación
            $errores = $producto->validar();

    
            // Generar un nombre único
            $nombreImagen1 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen2 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen3 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen4 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen5 = md5( uniqid( rand(), true ) ) . ".jpg";
            $nombreImagen6 = md5( uniqid( rand(), true ) ) . ".jpg";


            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['producto']['tmp_name']['imagen1']) {
                $image1 = Image::make($_FILES['producto']['tmp_name']['imagen1'])->fit(800,600);
                $producto->setImagen1($nombreImagen1);
            }
            if($_FILES['producto']['tmp_name']['imagen2']) {
                $image2 = Image::make($_FILES['producto']['tmp_name']['imagen2'])->fit(800,600);
                $producto->setImagen2($nombreImagen2);
            }
            if($_FILES['producto']['tmp_name']['imagen3']) {
                $image3 = Image::make($_FILES['producto']['tmp_name']['imagen3'])->fit(800,600);
                $producto->setImagen3($nombreImagen3);
            }
            if($_FILES['producto']['tmp_name']['imagen4']) {
                $image4 = Image::make($_FILES['producto']['tmp_name']['imagen4'])->fit(800,600);
                $producto->setImagen4($nombreImagen4);
            }
            if($_FILES['producto']['tmp_name']['imagen5']) {
                $image5 = Image::make($_FILES['producto']['tmp_name']['imagen5'])->fit(800,600);
                $producto->setImagen5($nombreImagen5);
            }
            if($_FILES['producto']['tmp_name']['imagen6']) {
                $image6 = Image::make($_FILES['producto']['tmp_name']['imagen6'])->fit(800,600);
                $producto->setImagen6($nombreImagen6);
            }
                
            if(empty($errores)) {
            
                // Almacenar la imagen
                if($_FILES['producto']['tmp_name']['imagen1']) {
                    $image1->save(CARPETA_IMAGENES . $nombreImagen1);
                }
                if($_FILES['producto']['tmp_name']['imagen2']) {
                    $image2->save(CARPETA_IMAGENES . $nombreImagen2);
                }
                if($_FILES['producto']['tmp_name']['imagen3']) {
                    $image3->save(CARPETA_IMAGENES . $nombreImagen3);
                }
                if($_FILES['producto']['tmp_name']['imagen4']) {
                    $image4->save(CARPETA_IMAGENES . $nombreImagen4);
                }
                if($_FILES['producto']['tmp_name']['imagen5']) {
                    $image5->save(CARPETA_IMAGENES . $nombreImagen5);
                }
                if($_FILES['producto']['tmp_name']['imagen6']) {
                    $image6->save(CARPETA_IMAGENES . $nombreImagen6);
                }
                // Guarda en la base de datos
                $producto->guardar();
    
               
            }

        }

        $router->render('/productos/actualizar', [
            'producto' => $producto,
            'errores' => $errores
        ]);
    }

    // Función para eliminar un producto
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                $tipo = $_POST['tipo'];
                
                if(validarTipoContenido($tipo)){
                    $producto = Producto::find($id);
                    $producto->eliminar();
                }
                
            }
        }
    }
}
