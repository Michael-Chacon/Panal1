<?php require_once 'view/layout/menu.php'; ?>
<div class="container-fluid loco">
			<!-- inicio componente datos  -->
			<div class="row">
			<div class="col-md-3 mb-3">
				<div class="card shadow  bg-body rounded" >
				  <div class="card-body">
				    <div class="row">

				    	<div class="col-8">
				    		<div class="d-flex align-items-center">
							  <div class="flex-shrink-0 ">
							    <img src="<?=base_url?>images/nature.svg" alt="..." class="rounded perfil_apiario">
							  </div>
							  <div class="flex-grow-1 ms-4">
							    Colmena: <strong class="titulo-apiario"><?=$datos_colmena->numero?></strong>

							    <span class=" <?php echo $datos_colmena->estado?>">●</span>
							    <br>
							    <p><small class="text-perfil">Apiario: </small><?=$_SESSION['apiario_actual']->id;?></p>
							  </div>
							</div>
				    	</div>

				    	<div class="col-4 ">
				    		<div class="dropdown">
							  <button class="btn dropdown-toggle" type="button" id="manu" data-bs-toggle="dropdown" aria-expanded="false">
							    <span class="material-icons">more_vert</span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="manu">
							    <li>
						    		<div class="btn" data-bs-toggle="modal" data-bs-target="#updateApiario">
						    			<span class="material-icons">edit</span> Editar
									</div>
							    </li>
							    <li>
							    	<li><hr class="dropdown-divider"></li>
							    	<!-- Button trigger modal -->
									<button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalra">
									 <span class="material-icons">content_paste</span> Bitácora 
									</button>
							    </li>
							    <li><hr class="dropdown-divider"></li>
							    <li>
									<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalrendimiento">
										<span class="material-icons">trending_up</span> Rendimiento
									</button>
							    </li>
							      <li><hr class="dropdown-divider"></li>
							    <li>
									<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalestado">
										<span class="material-icons">unfold_less</span> Estado
									</button>
							    </li>
							  </ul>
							</div>
							<!-- end dropdown -->
				    	</div>

				    </div>
				    <hr class="hr_perfil">
				    <div class="row text-center">
				    		<div class="col-3">
				    			<h4 class="cifra"><?=$datos_colmena->cajas?></h4>
				    			<p class="text-perfil">cajas</p>
				    		</div>
				    		<div class="col-5">
				    			<h4 class="cifra"><?=$datos_colmena->tamaño?></h4>
				    			<p class="text-perfil">Tamaño cajas</p>
				    		</div>
				    		<div class="col-4">
				    			<h4 class="cifra"><?=$datos_colmena->alimentador?></h4>
				    			 <!-- Button trigger modal -->
								<a type="button" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalAlimentador">
				    			<p class="text-perfil">Alimentador</p>
								</a>
				    		</div>
				    </div>
				    <!-- inicio modal alimentador -->

					<!-- Modal -->
					<div class="modal fade" id="modalAlimentador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Alimentador?</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					      	<form action="<?=base_url?>Colmena/update_alimentador" method="post">
					      		<div class="form-check">
								  <input class="form-check-input" type="radio" name="alimento" id="si" required value="Si">
								  <label class="form-check-label" for="si">
								    Si
								  </label>
								</div>
								<input type="text" hidden name="id" id="" value="<?=$datos_colmena->id?>">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="alimento" id="no" required value="No">
								  <label class="form-check-label" for="no">
								    No
								  </label>
								</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
						        <button type="submit" class="btn btn-success btn-sm" name='ali'>Registrar</button>
					      	</form>
					      </div>
					    </div>
					  </div>
					</div>
				    <!-- fin de modal alimentador -->
				    <hr class="hr_perfil">
				    <p class="text-center text-perfil">Propiedade de: Alexis, Carolina y Miguel</p>
				  </div>
				</div>
			</div>
			<!-- Modal -->
		<div class="modal fade" id="updateApiario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Actualizar número de cajas</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <form action="<?=base_url?>Colmena/update_cajas" method="post">
		      	<input type="text" hidden name="id" id="" value="<?=$datos_colmena->id?>">
			      <div class="modal-body">
			      	<div class="form-floating mb-3">
					  <input type="number" class="form-control" id="update_box" placeholder="Numero de cajas" name="caja_col">
					  <label for="update_box">Actializar el número de cajas:</label>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
			<!-- FIN componente datos  -->

			<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			<div class="col-md-9 mb-3">
				 <?php if(isset($_SESSION['alimentador']) && $_SESSION['alimentador'] == 'exito'): ?>
				      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <strong>Bien!</strong> alimentador actualizado con éxito.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				      	<?php elseif (isset($_SESSION['alimentador']) && $_SESSION['alimentador'] == 'fallo'): ?>
				      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <strong>Error,</strong> no se registró  la actualizacion del alimentador. 
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
				      <?php endif; ?>
				      <?php Utiles::borrar_error('alimentador'); ?>

				      <!-- alerta de cajas -->
				       <?php if(isset($_SESSION['cajas']) && $_SESSION['cajas'] == 'exito'): ?>
				      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <strong>Bien!</strong>  Número de cajas actualizado con éxito.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				      	<?php elseif (isset($_SESSION['cajas']) && $_SESSION['cajas'] == 'fallo'): ?>
				      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <strong>Error,</strong> no se registró  la actualizacion del número de cajas. 
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
				      <?php endif; ?>
				      <?php Utiles::borrar_error('cajas'); ?>

				      <!-- alerta de estado -->
				       <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'exito'): ?>
				      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <strong>Bien!</strong> estado actualizado con éxito.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				      	<?php elseif (isset($_SESSION['estado']) && $_SESSION['estado'] == 'fallo'): ?>
				      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <strong>Error,</strong> no se registró  la actualizacion del estado. 
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
				      <?php endif; ?>
				      <?php Utiles::borrar_error('estado'); ?>
				<div class="card grafica shadow  bg-body rounded">
				  <div class="card-body">
					
				    <h5 class="card-title titulo_rendi">Rendimiento</h5>
				    <br>
						grafica
				  </div>
				</div>
			</div>
		</div>				
		</div>	

	<!-- inicio modal de rendimiento   -->
<!-- Modal -->
<div class="modal fade" id="modalrendimiento" tabindex="-1" aria-labelledby="examplerendimiento" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examplerendimiento">Rendimiento de la colmena</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form>	
      		<div class="form-floating mb-3">
				<input type="date" class="form-control" id="fecha" placeholder="Fecha" name="fecha">
				<label for="fecha">Fecha</label>
			</div>
			<select class="form-select" aria-label="Default select example">
			  <option selected>Calificación </option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			  <option value="9">9</option>
			  <option value="10">10</option>
			</select>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
	<!-- fon del  modal de rendimiento -->
	<!-- fin de la cabecera -->

	<div class="container-fluid">
		<div class="row justify-content-center">

			<div class="col-md-6 vitacora">
				<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <button class="nav-link active bg-primary text-white" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Alimentacion</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link bg-info text-white" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Revisíon</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link bg-success text-white" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tareas </button>
				  </li>
				</ul>
			</div>	

				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				  	<!--  -->
				  	<div class="col-xs-12 col-sm-6 col-md-5">
					<div class="list-group">

					  <a href="#" class="list-group-item list-group-item active mb-2" aria-current="true">
					    <h3 class="text-center">Alimentacio</h3>
					    <hr>
					  </a>

					  <div href="#" class="list-group-item  mb-3 shadow bg-body rounded alimento">
					    <p class="mb-1 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, fuga Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, accusamus!.</p>
					    <hr class="regular">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong>Miguel Chacón</strong></small>
					     <small class="text-muted"><strong>8/05/2021</strong></small>
					    </div>
					  </div>
					    <div href="#" class="list-group-item  mb-3 shadow bg-body rounded revicion">
					    <p class="mb-1">Some placeholder content in div paragraph.</p>
					    <hr class="mal">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong>Michael Chacón</strong></small>
					      <small class="text-muted"><strong>1/07/2021</strong></small>
					    </div>
					  </div>	
					</div>
				</div>
				  	<!--  -->
				  </div>
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				  	<!--  -->
				  	<div class="row">
				  	<div class="col-md-3">
				  	</div>
				  	<div class="col-xs-12 col-sm-6 col-md-5 col  align-self-center">
					<div class="list-group">

					  <a href="#" class="list-group-item list-group-item  mb-2 bg-info text-white" aria-current="true">
					    <h3 class="text-center">Revisión</h3>
					    <hr>
					  </a>

					  <div href="#" class="list-group-item  mb-3 shadow bg-body rounded revicion">
					    <p class="mb-1">Some placeholder content in div paragraph.</p>
					    <hr class="mal">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong>Michael Chacón</strong></small>
					      <small class="text-muted"><strong>1/07/2021</strong></small>
					    </div>
					  </div>

					  <div href="#" class="list-group-item  mb-3 shadow bg-body rounded alimento">
					    <p class="mb-1 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, fuga Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, accusamus!.</p>
					    <hr class="regular">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong>Miguel Chacón</strong></small>
					     <small class="text-muted"><strong>8/05/2021</strong></small>
					    </div>
					  </div>
					</div>
				</div>
				</div>
				  	<!--  -->
				  </div>
				  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				  		<div class="row">
				  	<div class="col-md-6">
				  	</div>
				  	<div class="col-xs-12 col-sm-6 col-md-5 col  align-self-center">
					<div class="list-group">

					  <a href="#" class="list-group-item list-group-item  mb-2 bg-success text-white " aria-current="true">
					    <h3 class="text-center">Tareas</h3>
					    <hr>
					  </a>
					  <!-- modal tarea -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-warning mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modaltarea">
							<span class="material-icons">add</span>
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modaltarea" tabindex="-1" aria-labelledby="exampletarea" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampletarea">Registrar tarea</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      	<form action="">
								      <div class="modal-body">
								        	<div class="form-floating mb-3">
											  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style=" min-height: 100px; height: 150px"></textarea>
											  <label for="floatingTextarea2">Tarea</label>
											</div>
											<div class="form-floating">
											  <input type="date" class="form-control" id="fecha_tarea" placeholder="Password">
											  <label for="fecha_tarea">Fecha de ejecución:</label>
											</div>
								      </div>
								      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-primary">Registrar</button>
								      </div>
						      </form>
						    </div>
						  </div>
						</div>
					  <!-- fin del  modal de tareas -->

					  <div href="#" class="list-group-item  mb-3 shadow bg-body rounded revicion">
					    <p class="mb-1">Some placeholder content in div paragraph.</p>
					    <hr class="mal">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong>Maria Ines</strong></small>
					    <small class="text-muted"><strong>
					    	<div class="dropdown">
								  <button class="btn  dropdown-toggle btn-outline-success btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								    <span class="material-icons">update</span>
								  </button>
								  <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
								    <li class="update_estado">
								    	<form action="">
								    		<div class="mb-1">
									    		<label for="exampleInputEmail1" class="form-label fw-light text-white">Estado:</label>
									    		<select class="form-select fw-light" aria-label="Default select example">
												  <option value="1">Pendiente</option>
												  <option value="2">Finalizada</option>
												</select>
												<button type="submit" class="btn btn-info mt-3">Actualizar</button>
											</div>
								    	</form>
								    </li>
								  </ul>
								</div>
					    </strong></small>
					      <small class="text-muted"><strong>1/07/2021</strong></small>
					    </div>
					  </div>

					  <div href="#" class="list-group-item  mb-3 shadow bg-body rounded alimento">
					    <p class="mb-1 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, fuga Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, accusamus!.</p>
					    <hr class="regular">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong>Saul Solano</strong></small>
					     <small class="text-muted"><strong>8/05/2021</strong></small>
					    </div>
					  </div>
					</div>
				</div>
				</div>
				  </div>
				</div>
			</div>
	</div>
		<!-- inicio modal  alimentacion y revicion -->
			
			<!-- Modal -->
			<div class="modal fade" id="modalra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Registrar bitácora de visita a la colmena</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      		<form action="">
							<div class="form-floating mb-3">
							
							  <textarea class="form-control" placeholder="¿Qué paso?" id="bitacora" style="min-height:100px; height: 100px" name="bitacora"></textarea>
							  <label for="bitacora">Bitácora</label>
							</div>

							<select class="form-select form-select-sm mb-3" aria-label="Default select example" name="actividad">
							  <option selected>Actividad</option>
							  <option value="1">Alimentación</option>
							  <option value="2">Revisión </option>
							</select>

							<select class="form-select form-select-sm" aria-label="Default select example" name="calificacion">
							  <option selected>Calificación</option>
							  <option value="bien">Bien</option>
							  <option value="regular">Regular</option>
							  <option value="mal">Mal</option>
							</select>
			      		</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
			        <button type="button" class="btn btn-success btn-sm">Registrar</button>
			      </div>
			    </div>
			  </div>
			</div>
		<!-- fin del modal  alimentacion y revicion -->
		<!-- Modal estado-->
					<div class="modal fade" id="modalestado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Estado de la colmena</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					      	<form action="<?=base_url?>Colmena/update_estado" method="post">
					      		<input type="text" hidden name="id" id="" value="<?=$datos_colmena->id?>">
					      		<div class="form-check">
								  <input class="form-check-input" type="radio" name="estado_col" id="viva" value="viva">
								  <label class="form-check-label" for="viva">
								    Viva
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="estado_col" id="muerta"  value="muerta">
								  <label class="form-check-label" for="muerta">
								    Muerta
								  </label>
								</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
					        <button type="submit" class="btn btn-success btn-sm">Registrar</button>
					      	</form>
					      </div>
					    </div>
					  </div>
					</div>
				    <!-- fin de modal estado -->