<?php 
require_once 'model/apiario.php';


class ApiarioController
{

	#obtener datos del apiario y llamar la vista home
	public function home()
	{
		Utiles::is_user();
		$id_apiario = $_GET['id_api'];
		$apiario_info =  new Apiarios();
		$apiario_info->setId($id_apiario);
		$informacion_apairio = $apiario_info->getOne();
		if ($informacion_apairio) 
		{
			$_SESSION['apiario_actual'] = $informacion_apairio->fetchObject();
			require_once 'view/home/home.php';
		}
		else
		{
			header("Location:" .base_url. 'Login/apiarios');
		}
	}

	#registrar los apiarios
	public function registrar()
	{
		Utiles::is_user();
		if (isset($_POST) && !empty($_POST)) {
			$nombre    = isset($_POST['nombre']) ? strip_tags($_POST['nombre']) : false;
			$municipio = isset($_POST['municipio']) ? strip_tags($_POST['municipio']) : false;
			$vereda    = isset($_POST['vereda']) ? strip_tags($_POST['vereda']) : false;
			$finca     = isset($_POST['finca']) ? strip_tags($_POST['finca']) : false;

			$usuario = new Apiarios();
			$usuario->setNombre($nombre);
			$usuario->setMunicipio($municipio);
			$usuario->setVereda($vereda);
			$usuario->setFinca($finca);
			$resultado = $usuario->guardar();

			if ($resultado) {
				$_SESSION['new_apiario'] = 'exito';
			}else{
				$_SESSION['new_apiario'] ='fallo';
			}
			header("Location:" .base_url. 'Login/apiarios');
		}
	}// fin del metodo




} //fin de la clase 

 ?>