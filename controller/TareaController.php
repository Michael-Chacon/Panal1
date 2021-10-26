<?php 
require_once 'model/tarea.php';
class TareaController
{


	#gueardar tarea
	public function registrar()
	{
		if (isset($_POST) && !empty($_POST)) {
			$tareaC    = isset($_POST['tarea']) ? strip_tags($_POST['tarea']) : false;
			$fecha = isset($_POST['fecha']) ? strip_tags($_POST['fecha']) : false;
			$id = $_POST['id'];

			$tarea = new Tarea();
			$tarea->setId($id);
			$tarea->setTarea($tareaC);
			$tarea->setFecha($fecha);
			$estado = $tarea->guardar();

			if ($estado) {
				$_SESSION['tarea'] = 'exito';
			}else{
				$_SESSION['tarea'] ='fallo';
			}
		header("Location:" .base_url. 'home/colmena&id_col='.$id);
		}
	}

	public function actualizar_tarea()
	{
		$id_tarea = $_POST['tarea'];
		$id = $_POST['colmena'];
		$estado_tarea = isset($_POST['estado']) ? strip_tags($_POST['estado']) : false;
		// var_dump($id);
		// exit;
		$estado = new Tarea();
		$estado->setId($id_tarea);
		$estado->setEstado($estado_tarea);
		$resultado = $estado->update_tarea();

		if ($resultado) {
				$_SESSION['tareaUp'] = 'exito';
			}else{
				$_SESSION['tareaUp'] ='fallo';
			}
		header("Location:" .base_url. 'home/colmena&id_col='.$id);

	}
}

 ?>