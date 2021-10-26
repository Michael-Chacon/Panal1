<?php 
require_once 'model/rendimiento.php';

 class RendimientoController
 {

	public function guardar() 	
	{
		if (isset($_POST) && !empty($_POST)) {
			$fecha = $_POST['fecha'];
			$calificacion = $_POST['calificacion'];
			$id = $_POST['id'];

			$rendimiento = new Rendimiento();
			$rendimiento->setFecha($fecha);
			$rendimiento->setCalificacion($calificacion);
			$rendimiento->setColmena($id);
			$respuesta = $rendimiento->save_rendimiento();

			if ($respuesta) {
				$_SESSION['rendimiento'] = 'exito';
			}else{
				$_SESSION['rendimiento'] ='fallo';
			}
			header("Location:" .base_url. 'home/colmena&id_col='.$id);
		}
	}



 }//fin de  la clase

 ?>