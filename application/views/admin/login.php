<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('./assets/css/login.css') ?>">

	<title>Inciar Sesión</title>
</head>
<body class="hold-transition login-page">

<?php if ($mnsg = $this->session->flashdata('mnsg')): ?>
	<div class="alert alert-success">
		<span><?= $mnsg ?></span>
	</div>
<?php endif; ?>

<div class="login-box">
	<div class="login-logo">
		<b>Iniciar Sesión</b>
	</div>

	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Bienvenido, ingresa ya</p>
			<?php
			echo form_open('login/validation',array('method'=>'POST'));
			?>
				<div class="input-group mb-3">

					<input type="email" name="email" class="form-control" id="correo" placeholder="Correo" required/>

					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<?= form_error('email')?>
				<div class="input-group mb-3">
					<input type="password" name="pass" class="form-control" id="pass" placeholder="Contraseña" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<?= form_error('pass')?>
				<div class="row">
					<div class="col-8">
						<a href="<?= $registro['url'] ?>" class="text-center"> Registrarme</a>
					</div>

					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
					</div>
				</div>
				<div>
					<span style="color: #990000"><?= isset($msg) ? $msg : '' ?></span>
				</div>
			</form>



		</div>

	</div>
</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
