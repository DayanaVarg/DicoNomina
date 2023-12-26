<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url('./assets/css/registro.css') ?>">
	<title>Registro</title>
</head>
<body class="register-page">
	<div class="register-box">
		<div class="register-logo">
			<b>Registrarse</b>
		</div>
		<div class="cardTienda">
			<div class="card-body register-card-body">
				<p class="login-box-msg">Haz parte de nosotros</p>
				<form action="<?= base_url('registro/create')?>" method="post" onsubmit="return comprobarCodigo()">

					<div class="form-row mb-3">
						<div class="input-group col-md-6">

							<select type="text" name="tipoIde" class="form-control"  required>
								<option value="">Tipo de Documento</option>
								<option value="CC">CC</option>
								<option value="CE">CE</option>
							</select>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fa fa-address-card" aria-hidden="true" />
								</div>
							</div>
						</div>
						<div class="input-group col-md-6">
							<input type="text" name="identificacion" class="form-control" placeholder="Identificación" required/>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fa fa-address-card" aria-hidden="true" />
								</div>
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="input-group col-md-6">
							<input type="text" name="nombre" class="form-control"  placeholder="Nombre" required />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user" />
								</div>
							</div>
						</div>

						<div class="input-group col-md-6">
							<input type="text" name="apellido" class="form-control"  placeholder="Apellido" required />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user" />
								</div>
							</div>
						</div>
					</div>


					<div class="input-group mb-3 ">
						<input type="email" name="correo" class="form-control"  placeholder="Correo" required/>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"/>
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="input-group col-md-6">
							<input type="password" class="form-control" id="cod" placeholder="Código de acceso" required />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock" />
								</div>
							</div>
						</div>

						<div class="input-group col-md-6">
							<input type="password" name="clave" class="form-control"   placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
							title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y tener al menos 8 caracteres." required />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock" />
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-7">
							<p class="mb-0">
								<a href="<?= base_url('login')?>" >Ya tengo una cuenta</a>
							</p>
						</div>
						<div class="col-5">
							<button type="submit" class='btn btn-secondary btn-block'>Registrar</button>
						</div>
					</div>
					<span style="color: red" id="mensajeError"></span>
				</form>

			</div>
		</div>
	</div>
	<script src="<?= base_url('./assets/js/validaciones.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
