<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Prueba técnica Netberry</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="application/views/assets/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Gestor de tareas</h1>
		</div>
		<form id="nuevaTareaForm" method="POST" action="/" >
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="input-group">
						<input type="text" class="form-control" name="nuevaTarea" id="nuevaTareaInput" placeholder="Nueva tarea..." />
					</div>
				</div>
				<div class="col-md-1 col-sm-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="phpCheckBox" name="php" />
							<label class="form-check-label" for="phpCheckBox">PHP</label>
						</div>	
				</div>
				<div class="col-md-2 col-sm-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="JavascripCheckBox" name="javascript" />
							<label class="form-check-label" for="javascriptCheckBox">Javascript</label>
						</div>	
				</div>
				<div class="col-md-1 col-sm-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="CssCheckBox" name="css" />
							<label class="form-check-label" for="javascriptCheckBox">CSS</label>
						</div>
				</div>
				<div class="col-md-2 col-sm-12">
							<button id="addButton" type="button" class="btn btn-info">Añadir</button>
				</div>
		
			</div>
		</form>
	</div>
	<div class="row">
		<div id="tareasContainer"></div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="application/views/assets/scripts.js"></script>
</body>
</html>