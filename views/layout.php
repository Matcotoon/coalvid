<?php
    session_start();
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COALVID</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="icon" type="image/x-icon" href="../icono/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a data-aos="fade-left" href="https://api.whatsapp.com/send?phone=593967872275&text=Hola,%20quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios" class="float" target="blank">
    <span data-aos="fade-left" class="text">Chatea con nosotros</span>
    <i data-aos="fade-left" class="fa fa-whatsapp my-float"></i>
    </a>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                <img src="../build/img/logo.svg" alt="Logotipo de Coalvid">
            </a>

            <div class="mobile-menu">
                <img src="../build/img/barras.svg" alt="icono menu responsive">
            </div>
            <div class="derecha">
                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Proyectos</a>
                    <a href="/producto">Productos</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <a href="/galeria">Galeria</a>
                    <?php if($auth):  ?>
                        <a href="/logout">Cerrar Sesion</a>
                    <?php endif;  ?>
                </nav>
            </div>
            </div> <!--.barra-->
            <?php if ($inicio) { ?>
            <h1>Diseño que transforma, calidad que perdura</h1>
            <?php } ?>
        </div>
    </header>
    

    <?php echo $contenido ?>


    <footer class="footer seccion">
            <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Proyectos</a>
                    <a href="/producto">Productos</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <a href="/galeria">Galeria</a>
                    <a href="https://www.facebook.com/share/bRimv2PrQyUvuwer/" target="blank"><img src="../build/img/facebook.svg" alt=""></a>
                    <a href="https://www.instagram.com/coalvidaluminioyvidrio?igsh=OHYxd2RrdjVpN3Mw" target="blank"><img src="../build/img/instagram.svg" alt=""></a>
                    <a href="https://www.tiktok.com/@coalvidaluminioyvidrio?_t=8qLc8U31xyf&_r=1" target="blank"><img src="../build/img/tiktok.svg" alt=""></a>
                    <?php if($auth):  ?>
                        <a href="/logout">Cerrar Sesion</a>
                    <?php endif;  ?>
                </nav>
                
                <p class="copyright">Todos los derechos reservados <?php echo date ('Y') ?> &copy;</p>
                <p class="credito">Desarrollado por: DIV</p>
            </div>
    </footer>    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
         AOS.init();
    </script>           
    <script src="../build/js/bundle.min.js"></script>
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>