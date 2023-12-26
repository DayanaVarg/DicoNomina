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

	<title>Nómina Empleado</title>
</head>
<body>
<?= $navbar ?>
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
<div class="espacioB">
	<a href="<?= base_url('nomina/registrarNom/'.$idEmp) ?>">
		<button class="buttonAg">Nueva</button>
	</a>
</div>
<div class="container">

	<table class="miyazaki" id="datat">
		<h1 class="titulo tituloN">Nóminas del empleado</h1>
		<thead>
		<tr>
			<th>Identificación</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th>Pago</th>
			<th colspan="2">Acciones</th>
		</tr>
		</thead>

		<tbody>
		<?php if ($nom){ ?>
		<?php foreach ($nom as $item): ?>
		<tr>
			<td><?= $item->identificacion ?></td>
			<td><?= $item->nombre ?></td>
			<td><?= $item->apellido ?></td>
			<td><?= $item->fechaCom ?></td>
			<td><?= $item->fechaFin ?></td>
			<td>$<?= $item->pago ?></td>
			<td><a href="<?= base_url('nomina/editarNom/'.$item->idNom.'/'.$item->idEmp) ?>"><button class="button1 button2"><span>Editar</span></button></a></td>
			<td><a id="eliminarBtn" href="<?= base_url('nomina/dropNom/'.$item->idNom.'/'.$item->idEmp) ?>"><button class="button3 button1" onclick="return comprobarEliminar()"><span>Eliminar</span></button></a></td>
		</tr>
		<?php endforeach; ?>
		<?php }else{?>
		<tr>
			<td colspan="8">El empleado aún no cuenta con registros de nómina</td>
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
</body>
</html>


