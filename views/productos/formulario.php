<fieldset>
<legend>Informacion General</legend>

<label for="titulo">Titulo:</label>
<input type="text" id ="titulo" name= "producto[titulo]" placeholder= "Titulo Producto" value= "<?php echo s($producto->titulo); ?>">

<label for="vidrio">Vidrio:</label>
<input type="text" id ="vidrio" name= "producto[vidrio]" placeholder= "Tipo de vidrio" value= "<?php echo s($producto->vidrio); ?>">

<label for="acero">Acero:</label>
<input type="text" id ="acero" name= "producto[acero]" placeholder= "Material de los accesorios" value= "<?php echo s($producto->acero); ?>">

<label for="descripcion">Descripcion del proyecto:</label>
<textarea  id="descripcion" name="producto[descripcion]" ><?php echo s($producto->descripcion); ?></textarea> 


<label for="">Imagen 1:</label>
<input type="file" id ="imagen1" accept= "image/jpeg, image/png" name= "producto[imagen1]">

<?php if($producto->imagen1){ ?>
    <img src="/imagenes/<?php echo $producto->imagen1?>" class="imagen-small">

<?php  }?>

<label for="">Imagen 2:</label>
<input type="file" id ="imagen2" accept= "image/jpeg, image/png" name= "producto[imagen2]">

<?php if($producto->imagen2){ ?>
    <img src="/imagenes/<?php echo $producto->imagen2?>" class="imagen-small">
    <?php } ?>

    <label for="">Imagen 3:</label>
<input type="file" id ="imagen3" accept= "image/jpeg, image/png" name= "producto[imagen3]">

<?php if($producto->imagen3){ ?>
    <img src="/imagenes/<?php echo $producto->imagen3?>" class="imagen-small">
    <?php } ?>
    <label for="">Imagen 4:</label>
<input type="file" id ="imagen4" accept= "image/jpeg, image/png" name= "producto[imagen4]">

<?php if($producto->imagen4){ ?>
    <img src="/imagenes/<?php echo $producto->imagen4?>" class="imagen-small">
    <?php } ?>

    <label for="">Imagen 5:</label>
<input type="file" id ="imagen5" accept= "image/jpeg, image/png" name= "producto[imagen5]">

<?php if($producto->imagen5){ ?>
    <img src="/imagenes/<?php echo $producto->imagen5?>" class="imagen-small">
    <?php } ?>
    <label for="">Imagen 6:</label>
<input type="file" id ="imagen6" accept= "image/jpeg, image/png" name= "producto[imagen6]">

<?php if($producto->imagen6){ ?>
    <img src="/imagenes/<?php echo $producto->imagen6?>" class="imagen-small">
    <?php } ?>
</fieldset>