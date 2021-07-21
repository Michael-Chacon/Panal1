<div class="container-fluid">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#crearApiario">
			<span class="material-icons">emoji_nature</span>Crear Apiario
		</button>
		  <span class="navbar-text">
		       <a  href="<?=base_url?>Login/logout" class="btn btn-outline-warning" type="button"><i class="material-icons">power_settings_new</i></a>
		      </span>

		     	 <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
				  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
				    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
				  </symbol>
				  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
				    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
				  </symbol>
				</svg>

		      <?php if(isset($_SESSION['new_apiario']) && $_SESSION['new_apiario'] == 'exito'): ?>
		      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
				  <strong>Bien!</strong> apiario registrado con éxito.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		      	<?php elseif (isset($_SESSION['new_apiario']) && $_SESSION['new_apiario'] == 'fallo'): ?>
		      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
			      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					  <strong>Error,</strong> no se registró  el apiario. 
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
		      <?php endif; ?>
		      <?php Utiles::borrar_error('new_apiario'); ?>
		<!-- Modal -->
		<div class="modal fade" id="crearApiario" tabindex="-1" aria-labelledby="modalapi" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalapi">Crear apiario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      		<form action="<?=base_url?>Apiario/registrar" method="post">
		      			<div class="modal-body">
				      			<div class="form-floating mb-3">
							  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
							  <label for="nombre">Nombre apiario:</label>
							</div>
				      		<div class="form-floating mb-3">
							  <input type="text" class="form-control" id="municipio" placeholder="Municipio" name="municipio">
							  <label for="municipio">Municipio:</label>
							</div>
							<div class="form-floating mb-3">
							  <input type="text" class="form-control" id="vereda" placeholder="Vereda" name="vereda">
							  <label for="vereda">Vereda:</label>
							</div>
							<div class="form-floating mb-3">
							  <input type="text" class="form-control" id="finca" placeholder="Finca" name="finca">
							  <label for="finca">Finca:</label>
							</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
				        <button type="submit" class="btn btn-success">Registrar apiario</button>
		      		</form>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="row">
			<?php if(isset($result)):
			while($apiarios = $result->fetchObject()): ?>
			<div class="col-md-4">
				<div class="card shadow" >
				  <div class="card-body">
				    <h4 class="card-title text-center"><?=$apiarios->nombre;?></h4>
				    <hr>
				    <div class="row mb-3">
				    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
				    		<h5 class="titulo_apiario"><?=$apiarios->municipio;?></h5>
				    		<p class="sub_apiario">Municipio</p>
				    	</div>
				    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
				    		<h5 class="titulo_apiario"><?=$apiarios->vereda;?></h5>
				    		<p class="sub_apiario">Vereda</p>
				    	</div>
				    </div>
				      <div class="row">
				    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
				    		<h5 class="titulo_apiario"><?=$apiarios->finca;?></h5>
				    		<p class="sub_apiario">Finca</p>
				    	</div>
				    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
				    		<a href="<?=base_url?>Apiario/home&id_api=<?=$apiarios->id;?>" class="stretched-link">Another link</a>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
		<?php endwhile;
		endif; ?>
		</div>
</div>