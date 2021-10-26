<?php 
require_once 'model/colmena.php';
require_once 'model/bitacora.php';
require_once 'model/tarea.php';
require_once 'model/rendimiento.php';

class HomeController
{

	#llamar a la vista de las colmenas
	public function colmena()
	{
		if (isset($_GET['id_col'])) {
			$id_colmena = $_GET['id_col'];
			$colmena = new Colmena();
			$colmena->setId($id_colmena);
			$datos_colmena = $colmena->obtener_colmena();

			#obtener bitacora
			$actividad =  new Bitacora();
			$actividad->setId($id_colmena);
			$revision = $actividad->get_revision();
			$alimento = $actividad->get_alimentacion();

			#obtener todas la tareas
			$tareas = new Tarea();
			$tareas->setId($id_colmena);
			$pendientes = $tareas->get_tareas();

			#datos para la grafia de rendimiento
			$rendimiento = new Rendimiento();
			$rendimiento->setColmena($id_colmena);
			$grafica = $rendimiento->grafica();
			// var_dump($grafica);
			// exit;
		}

		
		require_once 'view/colmena/colmena.php';
	}



} #fin de la clase
	

 ?>