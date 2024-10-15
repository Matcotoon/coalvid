


<main class= "contenedor seccion">
<h1>Administrador de Productos Coalvid</h1>
    <?php
    if($resultado){
        $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje) { ?>

            <p class= "alerta exito"><?php echo s($mensaje) ?> </p>

           <?php }
        }
    ?>

    <a href="/productos/crear" class ="boton boton-verde ">Nuevo Producto</a>
    <a href="/admin" class ="boton boton-amarillo ">Proyectos</a>

    <h1>Productos</h1>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen 1</th>
                <th>Imagen 2</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar los resultados -->
        <?php foreach($productos as $producto): ?>
            <tr>
                <td><?php echo $producto->id?></td>
                <td><?php echo $producto->titulo?></td>
                <td> <img src="/imagenes/<?php echo $producto->imagen1; ?>" class="imagen-tabla"></td>
                <td> <img src="/imagenes/<?php echo $producto->imagen2; ?>" class="imagen-tabla"></td>
                <td>
                    <form method="POST" CLASS="w-100" action="/productos/eliminar">

                    <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                    <input type="hidden" name="tipo" value="producto">
                    <input type="submit" class="boton-rojo-block" value="Eliminar Producto">

                    </form>
                    <a href="../productos/actualizar?id=<?php echo $producto->id?>" class="boton-amarillo-block">Actualizar Producto</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    </main>