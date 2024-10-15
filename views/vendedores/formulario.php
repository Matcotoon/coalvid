<fieldset>
            <legend>Informacion General</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" id ="nombre" name= "vendedor[nombre]" placeholder= "Nombre Usuario" value= "<?php echo s($vendedor->nombre); ?>">

            <label for="apellido">Apellido:</label>
            <input type="text" id ="apellido" name= "vendedor[apellido]" placeholder= "Apellido Usuario" value= "<?php echo s($vendedor->apellido); ?>">

</fieldset>
