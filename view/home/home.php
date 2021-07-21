<div class="container-fluid loco">
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
							    <strong class="titulo-apiario"><?= $_SESSION['apiario_actual']->nombre;?></strong>
							    <br>
							    <p><small class="text-perfil">Vereda: </small><?= $_SESSION['apiario_actual']->vereda;?></p>
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
						    	<div  type="button" class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#crearcolmena">
					    				<span class="material-icons">add</span>Nueva colmena 
								</div>
							    </li>
							    	<li><hr class="dropdown-divider"></li>
							    <li>
							    	<!-- Button trigger modal -->
									<button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#produccion">
									 <span class="material-icons">bar_chart</span> Produccion
									</button>
							    </li>
							  </ul>
							</div>
							<!-- end dropdown -->
				    		
				    	</div>

				    </div>
				    <hr class="hr_perfil">
				    <div class="row text-center">
				    		<div class="col-4">
				    			<h4 class="cifra">11</h4>
				    			<p class="text-perfil">Colmenas</p>
				    		</div>
				    		<div class="col-4">
				    			<h4 class="cifra">30%</h4>
				    			<p class="text-perfil">Rendimiento</p>
				    		</div>
				    		<div class="col-4">
				    			<h4 class="cifra">200</h4>
				    			<p class="text-perfil">Kg</p>
				    		</div>
				    </div>
				    <hr class="hr_perfil">
				    <p class="text-center text-perfil">Propiedade de: Alexis, Carolina y Miguel</p>
				  </div>
				</div>
			</div>
			<div class="col-md-9 mb-3">
				<div class="card grafica shadow  bg-body rounded">
				  <div class="card-body">
				    <h5 class="card-title text-center">Producción</h5>
						grafica
				  </div>
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-3 mb-3 ">
				<div class="card shadow  bg-body rounded">
				  <div class="card-body">
				 		<div class="d-flex align-items-center bg-white">
						  <div class="flex-shrink-0">
						    <span class="numero">1</span>
						  </div>
						  <div class="flex-grow-1 ms-3 text-center">
							    <div class="contenedo_caja">
							    	<h2>2</h2>
							    	<p class="text-perfil">cajas</p>
							    </div>
						  </div>
						   <div class="flex-grow-2 ms-1 text-center">
							    <div class="spinner-grow spinner-grow-sm text-success" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
						  </div>
						</div>
				    <a href="vitacora_colmena.html" class=" stretched-link"></a>
				  </div>
				</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-3 mb-3 ">
				<div class="card shadow  bg-body rounded">
				  <div class="card-body">
				 		<div class="d-flex align-items-center bg-white">
						  <div class="flex-shrink-0">
						    <span class="numero">2</span>
						  </div>
						  <div class="flex-grow-1 ms-3 text-center">
							    <div class="contenedo_caja">
							    	<h2>2</h2>
							    	<p class="text-perfil">cajas</p>
							    </div>
						  </div>
						   <div class="flex-grow-2 ms-1 text-center">
							    <div class="spinner-grow spinner-grow-sm text-success" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
						  </div>
						</div>
				    <a href="vitacora_colmena.html" class=" stretched-link"></a>
				  </div>
				</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-3 mb-3">
				<div class="card shadow  bg-body rounded">
				  <div class="card-body">
				 		<div class="d-flex align-items-center bg-white">
						  <div class="flex-shrink-0">
						    <span class="numero">3</span>
						  </div>

						  <div class="flex-grow-1 ms-3 text-center">
							    <div class="contenedo_caja">
							    	<h2>1</h2>
							    	<p class="text-perfil">cajas</p>
							    </div>
						  </div>
						 <div class="flex-grow-2 ms-1 text-center">
							    <div class="spinner-grow  spinner-grow-sm text-success" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
						  </div>
						</div>
				    <a href="vitacora_colmena.html" class=" stretched-link"></a>
				  </div>
				</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-3 mb-3 ">
				<div class="card shadow  bg-body rounded">
				  <div class="card-body">
				 		<div class="d-flex align-items-center ">
						  <div class="flex-shrink-0">
						    <span class="numero">4</span>
						  </div>
						  <div class="flex-grow-1 ms-3 text-center">
							    <div class="contenedo_caja">
							    	<h2>3</h2>
							    	<p class="text-perfil">cajas</p>
							    </div>
						  </div>
						   <span class="punto_malo">●</span>
						</div>
				    <a href="vitacora_colmena.html" class=" stretched-link"></a>
				  </div>
				</div>
		</div>
		</div>			
		</div>	
		
<!-- Modal -->
<div class="modal fade" id="produccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        	<form action="" method="post">
		      <div class="modal-body">
		        		<div class="form-floating mb-3">
						  <input type="number" class="form-control" id="cantidad" placeholder="Cantidad de miel" name="cantidad">
						  <label for="cantidad">Cantidad de miel "kg":</label>
						</div>
						<div class="form-floating mb-3">
						  <input type="date" class="form-control" id="fecha" placeholder="Cantidad de miel" name="fecha">
						  <label for="fecha">Fecha:</label>
						</div>
		      </div>
		      <div class="modal-footer">
			        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
			        <button type="submit" class="btn btn-sm btn-success">Registrar</button>
		      </div>
        	</form>
    </div>
  </div>
</div>

		<!-- Modal -->
		<div class="modal fade" id="crearcolmena" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Registrar nueva colmena</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		     <form action="" method="post">
			     	 <div class="modal-body">
				      	<div class="form-floating mb-3">
						  <input type="number" class="form-control" id="numero" placeholder="Numero de la colmena" name="numero">
						  <label for="numero">Numero de la colmena:</label>
						</div>
				      	<div class="form-floating mb-3">
						  <input type="number" class="form-control" id="cajas" placeholder="Numero de cajas" name="cajas">
						  <label for="cajas">Numero de cajas:</label>
						</div>
						<div class="form-floating mb-3">
						  <input type="text" class="form-control" id="tamaño" placeholder="Tamaño de las cajas" name="tamaño">
						  <label for="tamaño">Tamaño de las cajas:</label>
						</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
			        <button type="submit" class="btn btn-sm btn-success">Registrar</button>
		      </div>
		     </form>
		    </div>
		  </div>
		</div>