<main class="contenedor seccion">
        <h1><?php echo $producto->titulo?></h1>
        <div class="fotos">
            <a href="/imagenes/<?php echo $producto->imagen1?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $producto->imagen1?>" alt="Imagen del producto" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $producto->imagen2?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $producto->imagen2?>" alt="Imagen del producto" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $producto->imagen3?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $producto->imagen3?>" alt="Imagen del producto" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $producto->imagen4?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $producto->imagen4?>" alt="Imagen del  producto" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $producto->imagen5?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $producto->imagen5?>" alt="Imagen del producto" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $producto->imagen6?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $producto->imagen6?>" alt="Imagen del producto" loading="lazy">
            </a>
        </div>
        <h2>Informacion del Producto</h2>
        <div class="descripcion-anuncio">
        <p><?php echo $producto->descripcion?></p>
        </div>
    </main>