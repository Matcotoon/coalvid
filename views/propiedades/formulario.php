<fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id ="titulo" name= "propiedad[titulo]" placeholder= "Titulo Propiedad" value= "<?php echo s($propiedad->titulo); ?>">

            <label for="arquitecto">Arquitecto:</label>
            <input type="text" id ="arquitecto" name= "propiedad[arquitecto]" placeholder= "Arquitecto Propiedad" value= "<?php echo s($propiedad->arquitecto); ?>">

            <label for="aluminio">Aluminio:</label>
            <input type="text" id ="aluminio" name= "propiedad[aluminio]" placeholder= "Color Aluminio" value= "<?php echo s($propiedad->aluminio); ?>">

            <label for="ventanas">Perfil Ventanas:</label>
            <input type="text" id ="ventanas" name= "propiedad[ventanas]" placeholder= "Perfil de aluminio utilizado en ventanas" value= "<?php echo s($propiedad->ventanas); ?>">

            <label for="puertas">Perfil Puertas:</label>
            <input type="text" id ="puertas" name= "propiedad[puertas]" placeholder= "Perfil de aluminio utilizado en puertas" value= "<?php echo s($propiedad->puertas); ?>">

            <label for="vidrio">Vidrio:</label>
            <input type="text" id ="vidrio" name= "propiedad[vidrio]" placeholder= "Tipo Vidrio" value= "<?php echo s($propiedad->vidrio); ?>">

            <label for="descripcion">Descripcion del proyecto:</label>
            <textarea  id="descripcion" name="propiedad[descripcion]" ><?php echo s($propiedad->descripcion); ?></textarea> 


            <label for="">Imagen 1:</label>
            <input type="file" id ="imagen1" accept= "image/jpeg, image/png" name= "propiedad[imagen1]">

            <?php if($propiedad->imagen1){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen1?>" class="imagen-small">
            
            <?php  }?>

            <label for="">Imagen 2:</label>
            <input type="file" id ="imagen2" accept= "image/jpeg, image/png" name= "propiedad[imagen2]">

            <?php if($propiedad->imagen2){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen2?>" class="imagen-small">
            
            <?php  }?>
            <label for="">Imagen 3:</label>
            <input type="file" id ="imagen3" accept= "image/jpeg, image/png" name= "propiedad[imagen3]">

            <?php if($propiedad->imagen3){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen3?>" class="imagen-small">
            
            <?php  }?>
            <label for="">Imagen 4:</label>
            <input type="file" id ="imagen4" accept= "image/jpeg, image/png" name= "propiedad[imagen4]">

            <?php if($propiedad->imagen4){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen4?>" class="imagen-small">
            
            <?php  }?>
            <label for="">Imagen 5:</label>
            <input type="file" id ="imagen5" accept= "image/jpeg, image/png" name= "propiedad[imagen5]">

            <?php if($propiedad->imagen5){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen5?>" class="imagen-small">
            
            <?php  }?>
            <label for="">Imagen 6:</label>
            <input type="file" id ="imagen6" accept= "image/jpeg, image/png" name= "propiedad[imagen6]">

            <?php if($propiedad->imagen6){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen6?>" class="imagen-small">
            
            <?php  }?>

            <label for="">Video:</label>
            <input type="file" name= "video" accept= "video/mp4, video/ogv, video/webm">

            <?php if($propiedad->video){ ?>
                <video src="/videos/<?php echo $propiedad->video?>" class="imagen-small" controls></video>   
            <?php  }?>          

        </fieldset>

        <fieldset>
            <legend>Informacion del proyecto</legend>

            
        <label for="vendedor">Usuario</label>
        <select name="propiedad[vendedorId]" id="vendedor">
            <option selected value="">--Seleccione un usuario--</option>
                <?php foreach($vendedores as $vendedor){?>
                    <option
                    <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : '';?> 
                    value="<?php  echo s($vendedor->id);?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
                <?php  }?>    
        </select>
</fieldset>         
        </select>
</fieldset>