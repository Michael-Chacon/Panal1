	<div class="container-fluid">
		<div class="row justify-content-center">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
			<img src="<?=base_url?>images/404b.png" class="img-fluid error" alt="...">
		</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 error_texto">
			<h1 class="text-center titulo">La página no ha sido encontrada </h1>
			<p class="text-center"><img src="<?=base_url?>images/errorw.png" class="img-fluid" alt="..."></p>
			<div class="d-grid gap-2">
				<?php if(isset($_SESSION['user'])): ?>
			  <a href="<?=base_url?>Login/apiarios" class="btn btn-warning btn-lg" type="button">Regresar</a>
			  <?php elseif(!isset($_SESSION['user'])): ?>
			  	<a href="<?=base_url?>" class="btn btn-warning btn-lg" type="button">Regresar</a>
			<?php endif; ?>
			</div>
		</div>
	</div>
	</div>