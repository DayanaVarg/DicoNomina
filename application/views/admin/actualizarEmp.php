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

	<title>Actualizar empleado</title>
</head>
<body>
<?= $navbar ?>

<div class="containerE">
	<div class="botonespace">
		<a href="<?= base_url('dashboard')?>">
			<button class="Btn">
				Atrás
			</button>
		</a>
	</div>


	<form class="form" action="<?= base_url('empleado/update/') ?>" method="post" onsubmit="return comprobarActualizarEmp()">
		<h1 class="titule">Actualizar Empleado</h1>
		<div class="flex">
			<label>
				<select class="input input1 doc" name="tipoIde" required>
					<option class="option" value="<?= $emp['tipoIde'] ?>"><?= $emp['tipoIde'] ?></option>
					<option class="option" value="TI">TI</option>
					<option class="option" value="CC">CC</option>
					<option class="option" alue="CE">CE</option>
				</select>
				<span>Tipo de documento</span>
			</label>

			<label>
				<input type="text" class="input" name="ide" value="<?= $emp['identificacion'] ?>" required>
				<span>Número de documento</span>
			</label>
		</div>

		<div class="flex">
			<label>
				<input type="text" class="input"  name="nombre"  value="<?= $emp['nombre'] ?>" required>
				<span>Nombre</span>
			</label>

			<label>
				<input type="text" class="input" name="apellido" value="<?= $emp['apellido'] ?>" required>
				<span>Apellido</span>
			</label>
		</div>
		<label>
			<input type="email" class="inputE" name="correo" value="<?= $emp['correo'] ?>" required>
			<span>Correo Electrónico</span>
		</label>

		<div class="flex">

			<label>
				<input type="text" class="input" name="cargo" value="<?= $emp['cargo'] ?>" required>
				<span>Cargo</span>
			</label>
			<label>
				<input type="text" class="input" name="area" value="<?= $emp['area'] ?>" required >
				<span>Área</span>
			</label>
		</div>
		<input type="hidden" name="idEmp" value="<?= $emp['idEmp'] ?>" required>

		<button class="submit" type="submit">Actualizar</button>
		<?php if($msg = $this->session->flashdata('msg')): ?>
			<span><?= $msg ?></span>
		<?php endif; ?>

	</form>
</div>
<script src="<?= base_url('./assets/js/validaciones.js') ?>"></script>
<?= $footer ?>
</body>

