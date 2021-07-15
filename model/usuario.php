<?php 

class Login
{
	private $id;
	private $usuario;
	private $password;
	public $db;

	public function __construct()
	{
		$this->db = Database::conexion();
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
		
		$sql = "SELECT *  FROM  usuario WHERE nombre = '$Nombre_us'";
		$validate =  $this->db->query($sql);
		var_dump($validate);
		exit();

		if ($validate && $validate->num_rows == 1) {
			$datos =  $validate->fetch_object();
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