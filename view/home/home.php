<?php require_once 'view/layout/menu.php'; ?>
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
				    			<h4 class="cifra"><?=$total->total;?></h4>
				    			<p class="text-perfil">Colmenas</p>
				    		</div>
				    		<div class="col-4">
				    			<h4 class="cifra">30%</h4>
				    			<p class="text-perfil">Rendimiento</p>
				    		</div>
				    		<div class="col-4">
				    			<h4 class="cifra"><?=$miel->total_miel?></h4>
				    			<p class="text-perfil">Kg</p>
				    		</div>
				    </div>
				    <hr class="hr_perfil">
				    <p class="text-center text-perfil">Propiedade de: Alexis, Carolina y Miguel</p>
				  </div>
				</div>
			</div>
			<div class="col-md-9 mb-3">
				 <?php if(isset($_SESSION['new_produccion']) && $_SESSION['new_produccion'] == 'exito'): ?>
				      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <strong>Bien!</strong> producción registrada con éxito.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				      	<?php elseif (isset($_SESSION['new_produccion']) && $_SESSION['new_produccion'] == 'fallo'): ?>
				      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <strong>Error,</strong> no se registró  la producción. 
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
				      <?php endif; ?>
				      <?php Utiles::borrar_error('new_produccion'); ?>

				<div class="card grafica shadow  bg-body rounded">
				  <div class="card-body">
				    <h5 class="card-title text-center">Producción</h5>
				     <div id="chartdiv" class="grafica "> 
                  </div>
                <script src="<?=base_url?>amcharts4/amcharts4/core.js"></script>
                <script src="<?=base_url?>amcharts4/amcharts4/charts.js"></script>
                <script src="<?=base_url?>amcharts4/amcharts4/themes/animated.js"></script>
						<script type="text/javascript">
							am4core.useTheme(am4themes_animated);

							var chart = am4core.create("chartdiv", am4charts.XYChart);


							chart.data = [
							<?php if(isset($chart)):
							while($datos = $chart->fetchObject()): ?>
							{
							    "Fecha": "<?=$datos->fecha?>",
							    "Cantidad": <?=$datos->peso?>
							},
						<?php endwhile;
						endif; ?>
							];

							chart.padding(40, 40, 40, 40);
							chart.maskBullets = false; // allow bullets to go out of plot area

							var label = chart.plotContainer.createChild(am4core.Label);
							label.text = "ULTIMAS 5 PRODUCCIONES";
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
							valueAxis.max = 250;
							valueAxis.strictMinMax = true;
							valueAxis.renderer.line.disabled = true;
							valueAxis.renderer.minWidth = 40;

							// series
							var series = chart.series.push(new am4charts.ColumnSeries());
							series.dataFields.categoryX = "Fecha";
							series.dataFields.valueY = "Cantidad";
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

		<div class="row">
			 <?php if(isset($_SESSION['new_colmena']) && $_SESSION['new_colmena'] == 'exito'): ?>
				      	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				      	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <strong>Bien!</strong> colmena registrada con éxito.
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				      	<?php elseif (isset($_SESSION['new_colmena']) && $_SESSION['new_colmena'] == 'fallo'): ?>
				      		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					      	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <strong>Error,</strong> no se registró  la colmena. 
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
				      <?php endif; ?>
				      <?php Utiles::borrar_error('new_colmena'); ?>

				      <?php if(isset($all_colmenas)):
				      while($colmenas = $all_colmenas->fetchObject()): ?>
			<div class="col-xs-6 col-sm-6 col-md-3 mb-3 ">
				<div class="card shadow  bg-body rounded">
				  <div class="card-body">
				 		<div class="d-flex align-items-center bg-white">
						  <div class="flex-shrink-0">
						    <span class="numero"><?=$colmenas->numero?></span>
						  </div>
						  <div class="flex-grow-1 ms-3 text-center">
							    <div class="contenedo_caja">
							    	<h2><?=$colmenas->cajas?></h2>
							    	<p class="text-perfil">cajas</p>
							    </div>
						  </div>
						  <?php if($colmenas->alimentador == 'Si'): ?>
						   <div class="flex-grow-2 ms-1 text-center">
							    <div class="spinner-grow spinner-grow-sm text-success" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
						  </div>
						<?php endif; ?>
						<?php if ($colmenas->estado == 'muerta'): ?>
							   <span class="muerta">●</span>
						<?php endif ?>
						</div>
				    <a href="<?=base_url?>Home/colmena&id_col=<?=$colmenas->id?>" class=" stretched-link"></a>
				  </div>
				</div>
		</div>
	<?php endwhile;
	endif; ?>
		</div>			
		</div>	
		
<!-- Modal -->
<div class="modal fade" id="produccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Producción</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        	<form action="<?=base_url?>Produccion/guardar" method="post">
		      <div class="modal-body">
		        		<div class="form-floating mb-3">
						  <input type="number" class="form-control" id="cantidad" placeholder="Cantidad de miel" required name="cantidad">
						  <label for="cantidad">Cantidad de miel "kg":</label>
						</div>
						<div class="form-floating mb-3">
						  <input type="date" class="form-control" id="fecha" placeholder="Cantidad de miel" required name="fecha">
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
		     <form action="<?=base_url?>Colmena/guardar" method="post">
			     	 <div class="modal-body">
				      	<div class="form-floating mb-3">
						  <input type="number" class="form-control" id="numero" placeholder="Numero de la colmena" required name="numero">
						  <label for="numero">Numero de la colmena:</label>
						</div>
				      	<div class="form-floating mb-3">
						  <input type="number" class="form-control" id="cajas" placeholder="Numero de cajas" required name="cajas">
						  <label for="cajas">Numero de cajas:</label>
						</div>
						<div class="form-floating mb-3">
							<select class="form-select" aria-label="Default select example" required name="tamaño">
							  <option selected></option>
							  <option value="Pequeña">Pequeña</option>
							  <option value="Grande">Grande</option>
							</select>
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