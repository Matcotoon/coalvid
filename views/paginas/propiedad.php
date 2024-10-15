<main class="contenedor seccion">
        <h1><?php echo $propiedad->titulo?></h1>
        <div class="video">
        <video width="100%" src="/videos/<?php echo $propiedad->video?>" autoplay muted loop></video>
        </div>
        <h2>Galeria del Proyecto</h2>
        <div class="fotos">
            <a href="/imagenes/<?php echo $propiedad->imagen1?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $propiedad->imagen1?>" alt="Imagen de la propiedad" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $propiedad->imagen2?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $propiedad->imagen2?>" alt="Imagen de la propiedad" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $propiedad->imagen3?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $propiedad->imagen3?>" alt="Imagen de la propiedad" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $propiedad->imagen4?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $propiedad->imagen4?>" alt="Imagen de la propiedad" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $propiedad->imagen5?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $propiedad->imagen5?>" alt="Imagen de la propiedad" loading="lazy">
            </a>
            <a href="/imagenes/<?php echo $propiedad->imagen6?>" data-lightbox="models">
                <img src="/imagenes/<?php echo $propiedad->imagen6?>" alt="Imagen de la propiedad" loading="lazy">
            </a>
        </div>
        <h2>Informacion del Proyecto</h2>
        <div class="resumen-anuncio">
        <p>Arquitecto: <span class="precio"> <?php echo $propiedad->arquitecto?>  </span> </p>
        <p>Aluminio: <span class="precio"> <?php echo $propiedad->aluminio?>  </span> </p>
        <p>Puertas: <span class="precio"> <?php echo $propiedad->puertas?>  </span> </p>
        <p>Ventanas: <span class="precio"> <?php echo $propiedad->ventanas?>  </span> </p>
        <p>Vidrio: <span class="precio"> <?php echo $propiedad->vidrio?>  </span> </p>
        
        </div>
        <h2>Caracteristicas del Proyecto</h2>
        <div class="descripcion-anuncio">
        <p class="precio"><?php echo $propiedad->descripcion?></p>
           
        </div>
    </main>