<?php 
//pasamos atributos propios de un form comun, mas la validacion!
$atributos = array('class' => 'jNice');
//generamos el tag form
echo form_open('rol/procesarEditar', $atributos); 
?>
<h3>Editar Rol</h3>
	<fieldset>
		<p>
			<label>Ingrese Rol:</label>                        
                        <select name="rol">
                            <option value="3">Basico</option>
                            <option value="2">Avanzado</option>
                            <option value="1">Experto</option>                            
                         </select> 
		</p>
		<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
		<input type="submit" value="Editar" />
	</fieldset>
</form>