<?php 
//pasamos atributos propios de un form comun, mas la validacion!
$atributos = array('class' => 'jNice');
//generamos el tag form
echo form_open('ROL/procesarCrear', $atributos); 
?>
<h3>Crear Rol</h3>
	<fieldset>
		<p>
			<label>Nombre:</label><input type="text" class="text-long" name="nombre"/>
		</p>
		<input type="submit" value="Crear" />
	</fieldset>
</form>