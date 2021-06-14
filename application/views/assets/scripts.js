jQuery(document).ready(function($){
	//al tener el documento listo cargamos la tabla
	jQuery.ajax({
		method: 'GET',
		url: 'index.php/gettable',
		datatype: 'html',
		cache: false,
		success: function(_html){
			$('#tareasContainer').html(_html)
		},
		error: function(){
			Swal.fire({
				title: 'Error',
				text: 'Error obteniendo la lista de tareas',
				icon: 'error'
			})
		}
	})
	
	$('#addButton').click(function(){
		if ($('#nuevaTareaInput').val() == ''){
			swal.fire({
				title: 'Error',
				text: 'Debes introducir un nombre de tarea',
				icon: 'error'
			})
			return false;
		}
		jQuery.ajax({
			method: 'POST',
			url: 'index.php/insertartarea',
			cache: false,
			datatype: 'html',
			data: {
				form : $('#nuevaTareaForm').serialize()
			},
			success: function(_html){
				$('#tareasContainer').html(_html)
				Swal.fire({
					title: 'Bien',
					text: 'La tarea se ha añadido con éxito',
					icon: 'success'
			})
			},
			error: function(){
				Swal.fire({
					title: 'Error',
					text: 'Error insertando tarea',
					icon: 'error'
				})	
			}
			
		})
	})	
	
	
})

function eliminarTarea(id,tarea){
	swal.fire({
		title: 'Borrar tarea',
		text: '¿Desea borrar la tarea: ' + tarea + '?',
		icon: 'question',
		showCancelButton: true
	}).then((result) => {
		if (result.isConfirmed) {
			jQuery.ajax({
				method: 'POST',
				cache: false,
				url: 'index.php/borrartarea',
				datatype: 'html',
				data: {
					tareaId: id
				},
				success: function(_html){
					$('#tareasContainer').html(_html)
					Swal.fire({
						title: 'Bien',
						text: 'La tarea se ha eliminado con éxito',
						icon: 'success'
					})
				},
				error: function(){
					Swal.fire({
						title: 'Error',
						text: 'Error insertando tarea',
						icon: 'error'
					})	
				}
			})
		}
	})
}