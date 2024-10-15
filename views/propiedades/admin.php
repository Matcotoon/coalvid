<main class = "contenedor seccion">
    <h1>Administrador de Proyectos Coalvid</h1>
    <?php
    if($resultado){
        $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje) { ?>

            <p class= "alerta exito"><?php echo s($mensaje) ?> </p>

           <?php }
        }
    ?>
    <a href="/propiedades/crear" class ="boton boton-verde ">Nuevo Proyecto</a>
    <!-- <a href="/vendedores/crear" class ="boton boton-amarillo ">Nuevo Administrador</a> -->
    <a href="/productos" class ="boton boton-amarillo ">Productos</a>

    <h1>Proyectos</h1>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Imagen Referencia 1</th>
                <th>Imagen Referencia 2</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- MOSTRAR LOS RESULTADOS -->

        <tbody>
            <?php foreach($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad->titulo;?></td>
                <td><img src="../imagenes/<?php echo $propiedad->imagen1; ?>" class="imagen-tabla"></td>
                <td><img src="../imagenes/<?php echo $propiedad->imagen2; ?>" class="imagen-tabla"></td>
                <td>
                    <form method="POST" CLASS="w-100" action="/propiedades/eliminar">

                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Eliminar Proyecto">

                    </form>
                    <a href="../propiedades/actualizar?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Actualizar Proyecto</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h1>Usuarios Administradores</h1>

<table class="propiedades">
<thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Acciones</th>
    </tr>
</thead>

<!-- MOSTRAR LOS RESULTADOS -->

<tbody>
    <?php foreach($vendedores as $vendedor): ?>
    <tr>
        <td><?php echo $vendedor->nombre;?></td>
        <td><?php echo $vendedor->apellido;?></td>
        <td>
            <form method="POST" CLASS="w-100" action="/vendedores/eliminar">

                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                <input type="hidden" name="tipo" value="vendedor">
                <input type="submit" class="boton-rojo-block" value="Eliminar Usuario">

            </form>
            <a href="/vendedores/actualizar?id=<?php echo $vendedor->id?>" class="boton-amarillo-block">Actualizar Usuario</a>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</main>