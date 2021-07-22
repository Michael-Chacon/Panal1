<?php 
require_once 'model/colmena.php';

class ColmenaController
{

	#guardar las  colmenas 
	public function guardar()
	{
		if (isset($_POST)) {
			$numero    = isset($_POST['numero']) ? strip_tags($_POST['numero']) : false;
			$cajas = isset($_POST['cajas']) ? strip_tags($_POST['cajas']) : false;
			$tamaño    = isset($_POST['tamaño']) ? strip_tags($_POST['tamaño']) : false;

			$colmenas =  new Colmena();
			$colmenas->setNumero($numero);
			$colmenas->setCajas($cajas);
			$colmenas->setTamaño($tamaño);
			$estado = $colmenas->save();

			if ($estado) {
				$_SESSION['new_colmena'] = 'exito';
			}else{
				$_SESSION['new_colmena'] ='fallo';
			}
			header("Location:" .base_url. 'Apiario/home&id_api='.$_SESSION['apiario_actual']->id);
		}
	}


	#update alimentador
	public function update_alimentador()
	{
		$id = $_POST['id'];
		$alimentador = $_POST['alimento'];
		$upeat = new Colmena();
		$upeat->setId($id);
		$upeat->setAlimentador($alimentador);
		$estado = $upeat->update_eat();

		if ($estado) {
				$_SESSION['alimentador'] = 'exito';
			}else{
				$_SESSION['alimentador'] ='fallo';
			}
		header("Location:" .base_url. 'home/colmena&id_col='.$id);
	}


	#update estado
	public function update_estado()
	{
		$id = $_POST['id'];
		$estado = $_POST['estado_col'];
		$status = new Colmena();
		$status->setId($id);
		$status->setEstado($estado);
		$state = $status->update_status();

		if ($state) {
				$_SESSION['estado'] = 'exito';
			}else{
				$_SESSION['estado'] ='fallo';
			}
		header("Location:" .base_url. 'home/colmena&id_col='.$id);
	}


	#update cajas
	public function update_cajas()
	{
		$id = $_POST['id'];
		$caja = $_POST['caja_col'];
		$box = new Colmena();
		$box->setId($id);
		$box->setCajas($caja);
		$cajas = $box->update_box();

		if ($cajas) {
				$_SESSION['cajas'] = 'exito';
			}else{
				$_SESSION['cajas'] ='fallo';
			}
		header("Location:" .base_url. 'home/colmena&id_col='.$id);
	}



}//fin de la clase

 ?>