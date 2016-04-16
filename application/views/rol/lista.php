

<?php
if($isOk === true){
	echo "<h3>{$msg}</h3>";
}elseif($isOk === false){
	echo "<h3><font class='error'>{$msg}</font></h3>";
}
?>
<table>
	<tr>
		<td>ID</td>
		<td>NOMBRE</td>
		<td>OPCIONES</td>
	</tr>
<?php
	foreach ($data as $row)
	{
            echo '<tr class="odd">';
	    echo '<td>'.$row->id.'</td>';
	    echo '<td>'.$row->nombre.'</td>';            
            echo '<td>';
	    echo '<a href="'.site_url('rol/editar/id/'.$row->id).'">Editar</a>';
	    echo ' | ';
	    echo '<a href="'.site_url('rol/eliminar/id/'.$row->id).'">Eliminar</a>';
	    echo '</td>';
	    echo '</tr>';
	}
?>
</table>