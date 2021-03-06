<?php require_once 'view/layout/menu.php'; ?>
	<!-- -->
	
		
			<div class="container-sm">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#newuser">
			  Nuevo usuario
			</button>

			<!-- Modal -->
			<div class="modal fade" id="newuser" tabindex="-1" aria-labelledby="user" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="user">Registrar nuevo usuario</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <form action="<?=base_url?>Login/new_user" method="post">
				      <div class="modal-body">
				        	<div class="form-floating mb-3">
							  <input type="text" class="form-control" id="nombre" placeholder="Nombre-Apellido" required name="nombre">
							  <label for="nombre">Nombre y Apellido:</label>
							</div>
							<div class="form-floating mb-3">
							  <input type="text" class="form-control" id="floatingPassword" placeholder="Password" required name="pass">
							  <label for="floatingPassword">Password:</label>
							</div>
							<select class="form-select" aria-label="Default select example" name="rol">
							  <option selected>Rol:</option>
							  <option value="Trabajador">Trabajador</option>
							  <option value="Administrador">Administrador</option>
							  <option value="Invitado">Invitado</option>
							</select>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
				        <button type="submit" class="btn btn-success btn-sm">Registrar</button>
				      </div>
			      </form>
			    </div>
			  </div>
			</div>
			<!--  -->
				       <?php if(isset($_SESSION['registro_user']) && $_SESSION['registro_user'] == 'exito'): ?>
				      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <strong>Bien!</strong> usuario registrado con ??xito.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				      	<?php elseif (isset($_SESSION['registro_user']) && $_SESSION['registro_user'] == 'fallo'): ?>
				      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <strong>Error,</strong> no se registr??  el usuario. 
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
				      <?php endif; ?>
				      <?php Utiles::borrar_error('registro_user'); ?>
			<div class="row">
				  	<?php if(isset($all_users)):
				  		while($usuario = $all_users->fetchObject()): ?>
				  			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3  mb-3 bg-dark text-white perfil">
							<div class="d-flex align-items-center shadow">
							  <div class="flex-shrink-0">
							    <img src="<?=base_url?>images/404d.png" alt="..." class="foto_perfil2 rounded-circle">
							  </div>
							  <div class="flex-grow-1 ms-2">
							   <h5><?=$usuario->nombre?></h5>
							   <span class="<?=$usuario->rol?>">???</span><?=$usuario->rol?>
							  </div>
							<span class="material-icons">more_vert</span>
							</div>
						</div>
				   
				<?php endwhile;
				endif; ?>
		</div>
	</div>	