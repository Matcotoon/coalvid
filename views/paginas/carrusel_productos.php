<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php foreach($productos as $producto) { ?>
        <div class="swiper-slide">
            <div class="anuncio">
                <img src="/imagenes/<?php echo $producto->imagen1?>" alt="Anuncio 1" loading="lazy">
                <div class="contenido-anuncio">
                    <h3><?php echo $producto->titulo?></h3>
                    <p>Caracteristicas</p>
                    <p>Vidrio: <span class="precio"> <?php echo $producto->vidrio?>  </span> </p>
                    <p>Accesorios: <span class="precio"> <?php echo $producto->acero?>  </span> </p>
                    <a href="/producto?id=<?php echo $producto->id?>" class="boton-azul-block">
                        Ver Producto
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
        </div><!--.swiper-slide-->
        <?php } ?>
    </div><!--.swiper-wrapper-->