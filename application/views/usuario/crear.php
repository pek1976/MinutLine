<?php 
//pasamos atributos propios de un form comun, mas la validacion!
$atributos = array('class' => 'jNice');
//generamos el tag form


echo form_open('usuario/procesarCrear', $atributos); 
?>



<h3>Crear Usuario</h3>
	<fieldset>
<?php if (validation_errors()): ?>
<div class="alert alert-error">
    <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
            
		<p>
			<label>Nombre:</label><input type="text" class="text-long" name="nombre"/>
		</p>
                <p>
			<label>Apellido:</label><input type="text" class="text-long" name="apellido"/>
		</p>
                <p>
			<label>Email:</label><input type="text" class="text-long" name="email"/>
		</p>
                <p>
                    <label>Password:</label><input type="password" class="text-long" name="password"/>
		</p>
                <p>
                    <label>Repita Password:</label><input type="password" class="text-long" name="passwordx"/>
		</p>
                
		<input type="submit" value="Crear" />
	</fieldset>
</form>


