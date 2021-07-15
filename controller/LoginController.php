<?php 
require_once 'model/usuario.php';

class LoginController
{
	public function login()
	{
		require_once 'view/login/login.php';
	}

	public function  validar_usuario()
	{
		$usuario = $_POST['usuario'];
		$pass = $_POST['password'];

		$user =  new Login();
		$user->setUsuario($usuario);
		$user->setPassword($pass);
		$resultado = $user->validar();

		// var_dump($resultado);
		if ($resultado ==  'contraseña') {
			$_SESSION['login'] = 'contraseña';
			// var_dump($_SESSION['login']);
			// exit();
			header('Location: ' . base_url);

		}elseif ($resultado == 'usuario') {
			$_SESSION['login'] = 'usuario';
			// var_dump($_SESSION['login']);
			// exit();
			header('Location: ' . base_url);
		}else{
			var_dump($resultado);
		}
	}

}
 ?>