<?php 
require_once 'model/tarea.php';


class Utiles
{
	public static function borrar_error($error)
	{
		if (isset($_SESSION[$error])) {
			unset($_SESSION[$error]);
		}
	}

public static function is_user()
{
	if (!isset($_SESSION['user'])) {
		header("Location:" . base_url);
	}
}

public static function allTareas()
{
	$tarea = new Tarea();
	$todas = $tarea->tareas();
	return $todas->tareas;
}

public static function general_alerts($alert, $bien, $mal)
{
	$alerta = '';
	if (isset($_SESSION[$alert]) && $_SESSION[$alert] == 'exito') 
	{
		$alerta = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='check-circle-fill'/></svg>
								<strong>Bien!</strong> " . $bien .
								"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";
	}
	elseif (isset($_SESSION[$alert]) && $_SESSION[$alert] == 'fallo') 
	{
		$alerta = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='exclamation-triangle-fill'/></svg>
								<strong>Error!</strong> " . $mal .
								"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>"; 
	}
	return $alerta;
}

}//FIN DE LA CLASE

 ?>