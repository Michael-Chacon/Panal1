<?php 
require_once 'model/usuario.php';
require_once 'model/apiario.php';

class LoginController
{
	#llamar la vista del login
	public function login()
	{
		require_once 'view/login/login.php';
	}

	#llamar a todos los apirios
	public function apiarios()
	{
		Utiles::is_user();
		$apairios =  new Apiarios();
		$result = $apairios->getAll();
			require_once 'view/apiario/apiarios.php';
	}

	#cerrar la sesion
	public function logout()
	{	
		if (isset($_SESSION['user'])) 
		{
			unset($_SESSION['user']);
		}

		if (isset($_SESSION['apiario_actual']))
		{
			unset($_SESSION['apiario_actual']);
		}
		
		header('Location:' . base_url);
	}

	#iniciar sesion
	public function  validar_usuario()
	{
		$usuario = $_POST['usuario'];
		$pass = $_POST['password'];

		$user =  new Login();
		$user->setUsuario($usuario);
		$user->setPassword($pass);
		$resultado = $user->validar();

		if ($resultado ==  'contraseña') {
			$_SESSION['login'] = 'contraseña';
			header('Location: ' . base_url);
		}elseif ($resultado == 'usuario') {
			$_SESSION['login'] = 'usuario';
			header('Location: ' . base_url);
		}else{
			$_SESSION['user'] = $resultado;
			header("Location:" .base_url. 'Login/apiarios');
		}
	}

}//fin de la clase 
 ?>