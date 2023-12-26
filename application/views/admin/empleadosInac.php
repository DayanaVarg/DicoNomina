<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('./assets/css/navbar.css') ?>">
	<link rel="stylesheet" href="<?= base_url('./assets/css/dashboard.css') ?>">
	<link rel="stylesheet" href="<?= base_url('./assets/css/footer.css') ?>">

	<title>Empleados Inactivos</title>
</head>
<body>
	<?= $navbar ?>
	<?php if (isset($error)): ?>
	<div class="alert alert-danger" >
		<span><?= $error ?></span>
	</div >
	<?php endif;?>


	<?php if ($msg = $this->session->flashdata('msg')): ?>
		<div class="alert alert-success">
			<span><?= $msg ?></span>
		</div>
	<?php endif; ?>

	<div class="espacioA">
		<a href="<?= base_url('dashboard') ?>">
			<button class="buttonAt">Atrás</button>
		</a>
	</div>

	<div class="container">
		<table class="miyazaki" id="datat">
				<h1 class="titulo tituloN">Empleados Inactivos</h1>
			<thead>
				<tr>
					<th>Identificación</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Área</th>
					<th>Cargo</th>
					<th>Correo</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>
			<?php if ($data){ ?>
			<?php foreach ($data as $item): ?>
				<tr>
					<td><?= $item->identificacion ?></td>
					<td><?= $item->nombre ?></td>
					<td><?= $item->apellido ?></td>
					<td><?= $item->area ?></td>
					<td><?= $item->cargo ?></td>
					<td><?= $item->correo ?></td>
					<td><a id="activarBtn"  href="<?= base_url('empleado/activarEmp/' .$item->idEmp) ?>"><button class="button1" onclick="return comprobarActivar()" ><span>Activar</span></button></a></td>
				</tr>
			<?php endforeach; ?>
			<?php }else{?>
				<tr>
					<td colspan="8">No hay empleados inactivos</td>
				</tr>
			<?php }?>
			</tbody>
		</table>
	</div>

	<?= $footer ?>
	<script>
		var datat=document.querySelector("#datat");
		var dataTable=new DataTable("#datat",{
			labels: {
				placeholder: "Busca por un campo...",
				noRows: "No se encontraron registros",
				perPage: "Motrar {select} registros por página",
				info: "Mostrando {start} a {end} de {rows} registros",
			},

		} ) ;
	</script>
	<script src="<?= base_url('./assets/js/validaciones.js') ?>"></script>
<script>
	function comprobarActivar() {
		// Mensaje de confirmación
		var mensaje = "¿Está seguro que desea activar al empleado?";
		var eleccion = confirm(mensaje);

		// Verificar la elección del usuario
		if (eleccion) {
			var link = document.getElementById("activarBtn").getAttribute("href");
			window.location.href = link;
			return true;
		} else {
			return false;
		}
	}
</script>
</body>
</html>

