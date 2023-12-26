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

	<title>Inicio</title>
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

	<div class="espacioB">
		<a href="<?= base_url('empleado/nuevoEmp') ?>">
			<button class="buttonAg">Agregar</button>
		</a>
	</div>
	<div class="container">
		<table class="miyazaki" id="datat">
				<h1 class="titulo">Empleados</h1>
			<thead>
				<tr>
					<th>Identificación</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Área</th>
					<th>Cargo</th>
					<th>Correo</th>
					<th colspan="3">Acciones</th>
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
					<td><a href="<?= base_url('nomina/nomina/'.$item->idEmp) ?>"><button class="button1"><span>Nómina</span></button></a></td>
					<td><a href="<?= base_url('empleado/actualizarEmp/' .$item->idEmp) ?>"><button class="button1 button2"><span>Actualizar</span></button></a></td>
					<td><a id="inactivarBtn"  href="<?= base_url('empleado/inactivarEmp/' .$item->idEmp) ?>"><button class="button3 button1" onclick="return comprobarInactivar()" ><span>Inactivar</span></button></a></td>
				</tr>
			<?php endforeach; ?>
			<?php }else{?>
				<tr>
					<td colspan="8">Aún no hay empelados registrados en el sistema</td>
				</tr>
			<?php }?>
			</tbody>
		</table>

		<div class="espacioI">
		<a href="<?= base_url('empleado/empleadosInac') ?>">
			<button class="buttonI"><span>Empleados inactivos</span>
			</button>
		</a>
		</div>
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
</body>
</html>

