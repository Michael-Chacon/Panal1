<div class="row login">
		<div class="col-md-5 col-lg-6 division1">
		</div>

		<div class=".col-xs-12 col-sm-12 col-md-7 col-lg-6 division2">
			<div class="row justify-content-center ">
				<div class=" col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h1 class="titulo_login text-center text_login">Bienvenido al panal</h1>
					<h5 class="subtitulo_login text-center">¿Eres nuevo? <span class="registro_login text_login">Regístrate aquí.</span></h5>
					<?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'contraseña'): ?>
						<div class="alert alert-danger alert-dismissible fade show bg-danger alerta_login text-white text-center" role="alert">
						  <strong>Error.</strong>  La contraseñas es incorrecta.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php elseif (isset($_SESSION['login']) && $_SESSION['login'] == 'usuario'): ?>
						<div class="alert alert-danger alert-dismissible fade show bg-danger alerta_login text-white text-center" role="alert">
						  <strong>Error.</strong>  El usuario es incorrecto.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?php else: ?>
					<div class="alert alert-warning alert-dismissible fade show bg-warning alerta_login text-center" role="alert">
					  <strong>Hola!</strong> Ingresa los datos correctos por favor.
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php endif ?>
					<?php Utiles::borrar_error('login'); ?>
					<h4 class="text-center log text_login">Login</h4>
					<form action="<?=base_url?>Login/validar_usuario" method="POST">
							<div class="form-floating mb-4">
							  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="usuario" required>
							  <label for="floatingInput">Usuario:</label>
							</div>
							<div class="form-floating mb-5">
							  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
							  <label for="floatingPassword">Contraseña:</label>
							</div>
							<div class="row botones_login">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<button class="btn btn-warning btn-lg" type="submit" name="action">Ingresar</button>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 hidden-xs">		
								 <div class="barra"> <p  class="text-center"><span class="material-icons key">fingerprint</span></p></div>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
</div>
	<footer class="footer">
		
	</footer>