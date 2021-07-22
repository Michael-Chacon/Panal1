<?php if(isset($_SESSION['apiario_actual'])): ?>
		<div class="container-fluid">
		<!-- manu  2 -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#"><?=$_SESSION['user']->nombre;?></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarText">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="<?=base_url?>Apiario/home&id_api=<?=$_SESSION['apiario_actual']->id;?>">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="almacen.html">Almacén</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=base_url?>Apiario/Usuarios">Usuarios</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Pricing</a>
		        </li>
		      </ul>
		      <span class="navbar-text">
		       <a  href="<?=base_url?>Login/logout" class="btn btn-outline-warning" type="button"><i class="material-icons">power_settings_new</i></a>
		      </span>
		    </div>
		  </div>
		</nav>
	</div>
			<!--fin del menu  -->
<?php endif; ?>
	