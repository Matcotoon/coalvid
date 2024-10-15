<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php foreach($propiedades as $propiedad) { ?>
        <div class="swiper-slide">
            <div class="anuncio">
                <img src="/imagenes/<?php echo $propiedad->imagen1?>" alt="Anuncio 1" loading="lazy">
                <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo?></h3>
                    <p>Arquitecto: <span class="precio"> <?php echo $propiedad->arquitecto?>  </span> </p>
                    <p>Aluminio: <span class="precio"> <?php echo $propiedad->aluminio?>  </span> </p>
                    <p>Puertas: <span class="precio"> <?php echo $propiedad->puertas?>  </span> </p>
                    <p>Ventanas: <span class="precio"> <?php echo $propiedad->ventanas?>  </span> </p>
                    <p>Vidrio: <span class="precio"> <?php echo $propiedad->vidrio?>  </span> </p>
                    <a href="/propiedad?id=<?php echo $propiedad->id?>" class="boton-azul-block">
                        Ver Proyecto
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
        </div><!--.swiper-slide-->
        <?php } ?>
    </div><!--.swiper-wrapper-->