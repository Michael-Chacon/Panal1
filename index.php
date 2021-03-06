<?php 
session_start();

require_once 'autoload.php';
require_once 'helpers/database.php';
require_once 'helpers/constantes.php';
require_once 'helpers/util.php';
require_once 'view/layout/header.php';

$db = new 	Database();


function show_error()
{
	$error404 =  new ErrorController();
	$error404->error();
}


if (isset($_GET['controlador'])) 
{
	$nombre_controlador = $_GET['controlador'] .'Controller';
}
elseif (!isset($_GET['controlador']) && !isset($_GET['metodo'])) 
{
	$nombre_controlador = controller_df;
}
else 
{
	show_error();
}


if (class_exists($nombre_controlador)) {
	$controlador =  new $nombre_controlador();

	if (isset($_GET['metodo']) && method_exists($controlador, $_GET['metodo'])) {
		$metodo = $_GET['metodo'];
		$controlador->$metodo();
	}
	elseif (!isset($_GET['controlador']) && !isset($_GET['metodo'])) 
	{
		$metodo_definido  = metodo_df;
		$controlador->$metodo_definido();
	}
	else
	{
		show_error();
	}
}
else {
	show_error();
}


require_once 'view/layout/footer.php';



 ?>