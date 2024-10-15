<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Producto;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $productos = Producto::get(3);
        $inicio = true;
        $router -> render('paginas/index',[

            'propiedades' => $propiedades,
            'inicio' => $inicio,
            'productos' => $productos
        ]);
    }
    public static function nosotros(Router $router){
        
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();


        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarORedireccionar('propiedades');

        //Buscar la propiedad por su id
        
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad

        ]);
    }

    public static function servicios(Router $router){

        $productos = Producto::all();

        $router->render('paginas/servicios',[
            'productos' => $productos
        ]);
    }

    public static function producto(Router $router){

        $id = validarORedireccionar('servicios');

        //Buscar el producto por su ID
        $producto = Producto::find($id);

        $router->render('paginas/producto',[
            'producto' => $producto
        ]);
    }


    public static function blog(Router $router){
        $router -> render('paginas/blog');
    }
    public static function galeria(Router $router){
        $router -> render('paginas/galeria');
    }
    public static function pruebavideo(Router $router){
        $router -> render('paginas/pruebavideo');
    }
    public static function upload(Router $router){
        $router -> render('paginas/upload');
    }
    public static function entrada1(Router $router){
        $router -> render('paginas/entrada1');
    }
    public static function entrada2(Router $router){
        $router -> render('paginas/entrada2');
    }
    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] ==='POST'){

            $respuestas = $_POST['contacto'];

            //Crear una instancia de php mailer
            $mail = new PHPMailer();

            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST']; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;         
            $mail->Username = $_ENV['EMAIL_USER']; // Tu dirección de Gmail
            $mail->Password = $_ENV['EMAIL_PASS'];       // Tu contraseña de Gmail o App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Habilitar TLS
            $mail->Port = $_ENV['EMAIL_PORT'];  // Puerto TCP que usa Gmail para SMTP (TLS)

            //configurar el contenido del mail
            $mail->addAddress('coalvidaluminiovidrio@gmail.com');//direccion donde se van a recibir 
            $mail->setFrom('contacto@coalvidaluminiovidrio.com', 'Admin');
    
            $mail->Subject = 'Contacto Pagina Web';//este es el mensaje que nos avisara de una nuevo email en mailtrap
    
            //habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Apellido: ' . $respuestas['apellido'] . '</p>';
            

            //Enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p> Eligio ser contactado por telefono </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha de Contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora de Contacto: ' . $respuestas['hora'] . '</p>';

            }else{
                //Es email agregamos el campo de email
                $contenido .= '<p> Eligio ser contactado por email </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '</html>';
    
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin utilizar html';
        
            //enviar el mail
            //*send se encarga de enviar el mail y retorna true o false
            if($mail->send()){ 
                $mensaje = "Formulario enviado correctamente";
            }else{
                $mensaje = "El formulario no se pudo enviar";
            }

        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

    public static function error (Router $router){
        $router->render('paginas/error',[
            'titulo' => 'Pagina no encontrada'
        ]);
    }
}

