<?php require_once 'view/layout/menu.php';?>
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

							    <span class=" <?php echo $datos_colmena->estado ?>">●</span>
							    <br>
							    <p><small class="text-perfil">Apiario: </small><?=$_SESSION['apiario_actual']->id;?></p>
							  </div>
							</div>
				    	</div>
				    	<?php if ($_SESSION['user']->rol == 'Administrador' || $_SESSION['user']->rol == 'Trabajador'): ?>
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
				    <?php endif;?>

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

								<a type="button"  class="link-primary <?=$_SESSION['user']->rol == 'Invitado' ? "bloqueado" : false;?>" data-bs-toggle="modal" data-bs-target="#modalAlimentador">
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
				<!-- alerta de alimentador -->
				 <?php echo Utiles::general_alerts('alimentador', 'Alimentador registrado con éxito.', 'Algo salio mal con el registro del alimentador.') ?>
				      	<?php Utiles::borrar_error('alimentador');?>

				      <!-- alerta de bitacora -->
				      <?php echo Utiles::general_alerts('bitacora', 'Bitacora registrada con éxito.', 'Algo salio mal con el registro de la Bitcora.') ?>
				      	<?php Utiles::borrar_error('bitacora');?>

				      <!-- alerta de cajas -->
				       <?php echo Utiles::general_alerts('cajas', 'Número de cajas actualizadas con éxito.', 'Algo salio mal con el registro de las cajas.') ?>
				      	<?php Utiles::borrar_error('cajas');?>

				      <!-- alerta de estado -->
				       <?php echo Utiles::general_alerts('estado', 'Estado actualizado con exito.', 'Algo salio mal al actualizar el estado.') ?>
				      	<?php Utiles::borrar_error('estado');?>

				       <!-- alerta de tarea -->
						<?php echo Utiles::general_alerts('tarea', 'Tarea registrada con éxito.', 'Algo salio mal con el registro de la tarea.') ?>
				      	<?php Utiles::borrar_error('tarea');?>

				           <!-- alerta de RENDIMIENTO -->
				      <?php echo Utiles::general_alerts('rendimiento', 'Rendimiento registrado con exito.', 'Algo salio mal con el registro del rendimiento.') ?>
				      	<?php Utiles::borrar_error('rendimiento');?>

				<div class="card grafica shadow  bg-body rounded">
				  <div class="card-body">

				    <h5 class="card-title  text-center">Rendimiento</h5>
				    <div id="chartdiv" class="grafica ">
                  </div>
                   <script src="<?=base_url?>amcharts4/amcharts4/core.js"></script>
                <script src="<?=base_url?>amcharts4/amcharts4/charts.js"></script>
                <script src="<?=base_url?>amcharts4/amcharts4/themes/animated.js"></script>
						<script type="text/javascript">
							am4core.useTheme(am4themes_animated);

							var chart = am4core.create("chartdiv", am4charts.XYChart);


							chart.data = [
							<?php if (isset($grafica)):
    while ($datos = $grafica->fetchObject()): ?>
											{
											    "Fecha": "<?=$datos->fecha?>",
											    "Calificacion": <?=$datos->calificacion?>
											},
										<?php endwhile;
endif;?>
							];

							chart.padding(40, 40, 40, 40);
							chart.maskBullets = false; // allow bullets to go out of plot area

							var label = chart.plotContainer.createChild(am4core.Label);
							label.text = "ULTIMAS 7 REVISIONES";
							label.y = 5;
							label.x = am4core.percent(100);
							label.horizontalCenter = "right";
							label.zIndex = 100;
							label.fillOpacity = 0.7;

							// category axis
							var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
							categoryAxis.renderer.grid.template.location = 0;
							categoryAxis.dataFields.category = "Fecha";
							categoryAxis.renderer.minGridDistance = 60;
							categoryAxis.renderer.grid.template.disabled = true;
							categoryAxis.renderer.line.disabled = true;

							// value axis
							var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
							// we set fixed min/max and strictMinMax to true, as otherwise value axis will adjust min/max while dragging and it won't look smooth
							valueAxis.min = 0;
							valueAxis.max = 10;
							valueAxis.strictMinMax = true;
							valueAxis.renderer.line.disabled = true;
							valueAxis.renderer.minWidth = 40;

							// series
							var series = chart.series.push(new am4charts.ColumnSeries());
							series.dataFields.categoryX = "Fecha";
							series.dataFields.valueY = "Calificacion";
							series.tooltip.pointerOrientation = "vertical";
							series.tooltip.dy = -8;

							// label bullet
							var labelBullet = new am4charts.LabelBullet();
							series.bullets.push(labelBullet);
							labelBullet.label.text = "{valueY.value.formatNumber('#.')}";
							labelBullet.strokeOpacity = 0;
							labelBullet.stroke = am4core.color("#dadada");
							labelBullet.dy = - 20;

							// series bullet
							var bullet = series.bullets.push(new am4charts.CircleBullet());
							bullet.stroke = am4core.color("#ffffff");
							bullet.strokeWidth = 3;
							bullet.defaultState.properties.opacity = 0;

							// resize cursor when over
							bullet.cursorOverStyle = am4core.MouseCursorStyle.verticalResize;
							bullet.draggable = true;
							bullet.circle.radius = 8;

							// create hover state
							var hoverState = bullet.states.create("hover");
							hoverState.properties.opacity = 1; // visible when hovered

							// while dragging
							bullet.events.on("drag", function (event) {
							    handleDrag(event);
							});

							bullet.events.on("dragstop", function (event) {
							    handleDrag(event);
							    var dataItem = event.target.dataItem;
							    dataItem.column.isHover = false;
							    event.target.isHover = false;
							});

							function handleDrag(event) {
							    var dataItem = event.target.dataItem;
							    // convert coordinate to value
							    var value = valueAxis.yToValue(event.target.pixelY);
							    // set new value
							    dataItem.valueY = value;
							    // make column hover
							    dataItem.column.isHover = true;
							    // hide tooltip not to interrupt
							    dataItem.column.hideTooltip(0);
							    // make bullet hovered (as it might hide if mouse moves away)
							    event.target.isHover = true;
							}

							// column template
							var columnTemplate = series.columns.template;
							columnTemplate.column.cornerRadiusTopLeft = 8;
							columnTemplate.column.cornerRadiusTopRight = 8;
							columnTemplate.fillOpacity = 0.8;
							columnTemplate.tooltipText = "Kg";
							columnTemplate.tooltipY = 0; // otherwise will point to middle of the column
							columnTemplate.strokeOpacity = 0;

							// hover state
							var columnHoverState = columnTemplate.column.states.create("hover");
							columnHoverState.properties.fillOpacity = 1;
							// you can change any property on hover state and it will be animated
							columnHoverState.properties.cornerRadiusTopLeft = 35;
							columnHoverState.properties.cornerRadiusTopRight = 35;

							// show bullet when hovered
							columnTemplate.events.on("over", function (event) {
							    var dataItem = event.target.dataItem;
							    var itemBullet = dataItem.bullets.getKey(bullet.uid);
							    itemBullet.isHover = true;
							})

							// hide bullet when mouse is out
							columnTemplate.events.on("out", function (event) {
							    var dataItem = event.target.dataItem;
							    var itemBullet = dataItem.bullets.getKey(bullet.uid);
							    // hide it later for touch devices to see it longer
							    itemBullet.isHover = false;
							})


							// start dragging bullet even if we hit on column not just a bullet, this will make it more friendly for touch devices
							columnTemplate.events.on("down", function (event) {
							    var dataItem = event.target.dataItem;
							    var itemBullet = dataItem.bullets.getKey(bullet.uid);
							    itemBullet.dragStart(event.pointer);
							})

							// when columns position changes, adjust minX/maxX of bullets so that we could only drag vertically
							columnTemplate.events.on("positionchanged", function (event) {
							    var dataItem = event.target.dataItem;
							    var itemBullet = dataItem.bullets.getKey(bullet.uid);

							    var column = dataItem.column;
							    itemBullet.minX = column.pixelX + column.pixelWidth / 2;
							    itemBullet.maxX = itemBullet.minX;
							    itemBullet.minY = 0;
							    itemBullet.maxY = chart.seriesContainer.pixelHeight;
							})

							// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
							columnTemplate.adapter.add("fill", function (fill, target) {
							    return chart.colors.getIndex(target.dataItem.index).saturate(0.3);
							});

							bullet.adapter.add("fill", function (fill, target) {
							    return chart.colors.getIndex(target.dataItem.index).saturate(0.3);
							});
						</script>
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
      	<form  action="<?=base_url?>Rendimiento/guardar" method="post">
      		<input type="text" hidden name="id" id="" value="<?=$datos_colmena->id?>">
      		<div class="form-floating mb-3">
				<input type="date" class="form-control" id="fecha" placeholder="Fecha" required name="fecha" max="2021-08-02">
				<label for="fecha">Fecha</label>
			</div>
			<select class="form-select" aria-label="Default select example" required name="calificacion">
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
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-primary">Registrar</button>
	      </div>
      	</form>
    </div>
  </div>
</div>
	<!-- fon del  modal de rendimiento -->
	<!-- fin de la cabecera -->

	<div class="container-fluid mt-5">
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

					   <?php if (isset($alimento)):
    while ($alimentacion = $alimento->fetchObject()):
        $limite = $alimentacion->fecha;
        $fin = date("Y-m-d", strtotime($limite . "+ 4 days"));
        $hoy = date("Y-m-d");?>
													  		<?php if ($fin >= $hoy): ?>
													  			 <div href="#" class="list-group-item  mb-3 shadow rounded  bg-dark bg-gradient text-white">
														  	<?php else: ?>
										  		<div href="#" class="list-group-item  mb-3 shadow bg-body rounded ">
										  	<?php endif;?>
					    <p class="mb-1 lead"><?=$alimentacion->bitacora?></p>
					    <hr class="<?=$alimentacion->calificacion?>">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong><?=$alimentacion->user?></strong></small>
					      <small class="text-muted"><strong><?=$alimentacion->fecha?> <?=$alimentacion->hora?></strong></small>
					    </div>
					  </div>
					  <?php endwhile;
endif;?>
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
					  <?php if (isset($revision)):
    while ($rev = $revision->fetchObject()):
        $limit = $rev->fecha;
        $end = date("Y-m-d", strtotime($limit . "+ 4 days"));
        $today = date("Y-m-d");?>
										<?php if ($end >= $today): ?>
												<div href="#" class="list-group-item  mb-3 shadow rounded  bg-dark bg-gradient text-white">
										<?php else: ?>
									<div href="#" class="list-group-item  mb-3 shadow bg-body rounded ">
									<?php endif;?>
					    <p class="mb-1 lead"><?=$rev->bitacora?></p>
					    <hr class="<?=$rev->calificacion?>">
					    <div class="d-flex w-100 justify-content-between">
					    <small class="text-muted"><strong><?=$rev->user?></strong></small>
					      <small class="text-muted"><strong><?=$rev->fecha?> _ <?=$rev->hora?></strong></small>
					    </div>
					  </div>
					  <?php endwhile;
endif;?>
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
						      	<form action="<?=base_url?>Tarea/registrar" method="post">
						      		<input type="text" hidden name="id" id="" value="<?=$datos_colmena->id?>">
								      <div class="modal-body">
								        	<div class="form-floating mb-3">
											  <textarea class="form-control" placeholder="Leave a comment here" id="tarea" required name="tarea" style=" min-height: 100px; height: 150px"></textarea>
											  <label for="tarea">Tarea</label>
											</div>
											<div class="form-floating">
											  <input type="date" class="form-control" id="fecha_tarea" placeholder="Fecha" required name="fecha">
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
					  <?php if (isset($pendientes)):
    while ($tareas = $pendientes->fetchObject()): ?>
									  <div href="#" class="list-group-item  mb-5 shadow bg-body rounded ">
									    <p class="mb-1 lead"> <?=$tareas->tarea?> </p>
									    <hr>
									    <div class="d-flex w-100 justify-content-between">
									    <small class="text-muted"><strong><?=$tareas->user?></strong></small>
									    <small class="text-muted"><strong>
									    	<div class="dropdown">
												  <button class="btn  dropdown-toggle btn-outline-success btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
												    <span class="material-icons">update</span>
												  </button>
												  <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
												    <li class="update_estado">
												    	<form action="<?=base_url?>Tarea/actualizar_tarea"  method="post">
												    		<div class="mb-1">
												    			<input type="number" hidden name="colmena" value="<?=$datos_colmena->id?>">
												    			<input type="number" hidden name="tarea" value="<?=$tareas->id?>">
													    		<label for="exampleInputEmail1" class="form-label fw-light text-white">Estado:</label>
													    		<select class="form-select fw-light" aria-label="Default select example" name="estado" required>
																  <option value="pendiente">Pendiente</option>
																  <option value="finalizada">Finalizada</option>
																</select>
																<button type="submit" class="btn btn-info mt-3">Actualizar</button>
															</div>
												    	</form>
												    </li>
												  </ul>
												</div>
									    </strong></small>
									      <small class="text-muted"><strong><?=$tareas->fecha?></strong></small>
									    </div>
									  </div>
									<?php endwhile;
endif;?>
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
			      		<form action="<?=base_url?>Bitacora/guardar_bitacora" method="post">
							<div class="form-floating mb-3">
								<input type="text" hidden name="id" id="" value="<?=$datos_colmena->id?>">
							  <textarea class="form-control" placeholder="¿Qué paso?" id="bitacora" style="min-height:100px; height: 100px" required name="bitacora"></textarea>
							  <label for="bitacora">Bitácora</label>
							</div>

							<select class="form-select form-select-sm mb-3" aria-label="Default select example" required name="actividad">
							  <option selected>Actividad</option>
							  <option value="alimentacion">Alimentación</option>
							  <option value="revision">Revisión</option>
							</select>

							<select class="form-select form-select-sm mb-3" aria-label="Default select example" required name="calificacion">
							  <option selected>Calificación</option>
							  <option value="bien">Bien</option>
							  <option value="regular">Regular</option>
							  <option value="mal">Mal</option>
							</select>
							<div class="form-floating">
								 <input type="date" class="form-control" id="fecha_tarea" placeholder="Fecha" required name="fecha">
								<label for="fecha_tarea">Fecha de la visita:</label>
							</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
					        <button type="submit" class="btn btn-success btn-sm">Registrar</button>
					      </div>
			      		</form>
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