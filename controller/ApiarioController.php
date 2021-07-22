<?php 
require_once 'model/apiario.php';
require_once 'model/usuario.php';
require_once 'model/colmena.php';
require_once 'model/produccion.php';


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
		}
		else
		{
			header("Location:" .base_url. 'Login/apiarios');
		}

		#listar todas las colmens de un apiario
		$colmenas = new Colmena();
		$all_colmenas = $colmenas->getAll();
		$total = $colmenas->total_colmenas();

		#calcular el total de mier producida
		$produccion = new Produccion();
		$miel = $produccion->total_miel();
		#datos para la grafica
		$chart = $produccion->grafica();

		#llamar a la vista home
		require_once 'view/home/home.php';
	}


	#listar todos los usuarios
	public function usuarios()
	{
		$usuarios = new Login();
		$all_users = $usuarios->getAll();
		require_once 'view/usuarios/usuarios.php';
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