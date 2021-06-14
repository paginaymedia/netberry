<table class="table">
	<tr>
		<th>Tarea</th>
		<th>Categorías</th>
		<th>Acciones</th>
	</tr>
<?php 
$classes = array(
'php' => 'success',
'css' => 'info',
'javascript' => 'warning'
);
foreach ($tareas as $tarea){ ?>
	<tr>
		<td><?php echo $tarea->nombreTarea; ?></td>
		<td><?php
		foreach ($tarea->categorias as $categoria){
			$clase = strtolower($categoria->nombreCategoria);
			echo '<span class="btn btn-' . $classes[$clase] .'"> ' . $categoria->nombreCategoria . '</span>';
		};?>
		</td>
		<td><button class="btn btn-danger borrarTarea" title="eliminar tarea" onclick="eliminarTarea(<?php echo $tarea->tareaId; ?>,'<?php echo $tarea->nombreTarea; ?>')" type="button">X</button></td>
	</tr>

<?php }; ?>