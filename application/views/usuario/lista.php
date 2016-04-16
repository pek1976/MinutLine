
<input type="button" value="Agregar Usuario" class="button-submit" onclick="window.location.href='<?php echo site_url('usuario/crear')?>'"/> 

<?php
if($isOk === true){
	echo "<h3>{$msg}</h3>";
}elseif($isOk === false){
	echo "<h3><font class='error'>{$msg}</font></h3>";
}
?>
<table>
	<tr>
		<td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>MAIL</td>
		<td>OPCIONES</td>
	</tr>
<?php
	foreach ($data as $row)
	{
            echo '<tr class="odd">';
	    echo '<td>'.$row->nombre.'</td>';
            echo '<td>'.$row->apellido.'</td>';
	    echo '<td>'.$row->email.'</td>';
            echo '<td>';
	    echo '<a href="'.site_url('usuario/editar/id/'.$row->id).'">Editar</a>';
	    echo ' | ';
	    echo '<a href="'.site_url('usuario/eliminar/id/'.$row->id).'">Eliminar</a>';
	    echo '</td>';
	    echo '</tr>';
	}
?>
</table>