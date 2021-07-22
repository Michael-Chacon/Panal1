<?php 
require_once 'model/colmena.php';

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

		}

		
		require_once 'view/colmena/colmena.php';
	}



} #fin de la clase
	

 ?>