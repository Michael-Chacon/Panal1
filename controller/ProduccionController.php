<?php 
require_once 'model/produccion.php';

class ProduccionController
{

	#guardar la produccion  
	public function guardar()
	{
		if (isset($_POST) && !empty($_POST)) {
			$cantidad    = isset($_POST['cantidad']) ? strip_tags($_POST['cantidad']) : false;
			$fecha = isset($_POST['fecha']) ? strip_tags($_POST['fecha']) : false;

			$miel_p = new Produccion();
			$miel_p->setProduc($cantidad);
			$miel_p->setFecha($fecha);
			$respuesta = $miel_p->save();
			
				if ($respuesta) {
				$_SESSION['new_produccion'] = 'exito';
			}else{
				$_SESSION['new_produccion'] ='fallo';
			}
			header("Location:" .base_url. 'Apiario/home&id_api='.$_SESSION['apiario_actual']->id);
		}
	}



}#fin de la clase



 ?>