<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url?>helpers/estilos.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
	</style>
</head>
<body>
<?php if(isset($_SESSION['apiario_actual'])): ?>
		<div class="container-fluid">
		<!-- manu  2 -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">User name</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarText">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="almacen.html">Almacén</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="usuarios.html">Usuarios</a>
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
	