<?php 

class Login
{
	private $id;
	private $usuario;
	private $password;
	public $db;

	public function __construct()
	{
		$this->db = Database::conectar();
	}

	// metodos get

	public function getUsuairo()
	{
		return $this->usuario;
	}

	public function getPassword()
	{
		return $this->password;
	}

	//  metodos set

	public function setUsuario($user)
	{
		$this->usuario = $user;
	}

	public function setPassword($passw)
	{
		$this->password	 = $passw;
	}


	// mis metodos 

	public function validar()
	{
		$Nombre_us  =  $this->getUsuairo();
		$contrasena =  $this->getPassword();
		

		$validate = $this->db->prepare("SELECT *  FROM  usuario WHERE nombre = ?");
		$validate->execute(array($Nombre_us));
		if ($validate && $validate->rowCount() == 1) {
			$datos =  $validate->fetchObject();
			if ($datos->pass == $contrasena) {
				return $datos;
			}else{
				return 'contraseña';
			}
		}else{
			return  'usuario';
		}
	}

}


 ?>