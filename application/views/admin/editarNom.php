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

	<title>Editar nómina</title>
</head>
<body>
<?= $navbar ?>

<div class="containerE">
	<div class="botonespace">
		<a href="<?= base_url('nomina/nomina/'.$emp)?>">
			<button class="Btn">
				Atrás
			</button>
		</a>
	</div>


	<form class="form form1" action="<?= base_url('nomina/updateN') ?>" method="post" onsubmit="return comprobarActualizarNom()" >
		<h1 class="titule">Editar Nómina</h1>

		<input type="hidden" name="idNom" value="<?= $nom['idNom'] ?>">

		<label>
			<input type="date" class="inputE" name="fechaCom" value="<?= $nom['fechaCom'] ?>" required>
			<span>Fecha Comienzo</span>
		</label>

		<label>
			<input type="date" class="inputE" name="fechaFin" value="<?= $nom['fechaFin'] ?>" required>
			<span>Fecha Fin</span>
		</label>

		<label>
			<input type="number" class="inputE" name="pago" value="<?= $nom['pago'] ?>" required>
			<span>Pago</span>
		</label>

		<input type="hidden" name="idEmp" value="<?= $nom['idEmp'] ?>">


		<button class="submit" type="submit">Editar</button>
	</form>
</div>
<script src="<?= base_url('./assets/js/validaciones.js') ?>"></script>
<?= $footer ?>
</body>


