<?php 

class Login
{
	private $id;
	private $usuario;
	private $password;
	private $rol;

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

	public function getRol()
	{
		return $this->rol;
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


	public function setRol($rol_user)
	{
		$this->rol = $rol_user;
	}


	public function setPassword($passw)
	{
		$this->password	 = $passw;
	}


	// mis metodos 

	#registrar nuevo usuarios
	public function save_user()
	{
		$usuario = $this->getUsuairo();
		$pass = $this->getPassword();
		$rol_usuario =  $this->getRol();
		$grupo = $_SESSION['user']->grupo;
		$save = $this->db->prepare("INSERT INTO usuario VALUES(null, :usuario, :pass, :rol_usuario, :grupo)");
		$save->bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$save->bindParam(":pass", $pass, PDO::PARAM_STR);
		$save->bindParam(":rol_usuario", $rol_usuario, PDO::PARAM_STR);
		$save->bindParam(":grupo", $grupo, PDO::PARAM_INT);
		$save->execute();

		$usuario_id = $this->db->lastInsertId();
		$apiario_id = $_SESSION['apiario_actual']->id;
		$vinculo = $this->db->prepare("INSERT INTO user_api VALUES(:usuario_id, :apiario_id)");
		$vinculo->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
		$vinculo->bindParam(":apiario_id", $apiario_id, PDO::PARAM_INT);
		$vinculo->execute();

		return $save;
	}


	#obtener todos los usurios registrados en el apiario
	public function getAll()
	{
		$id_apiario = $_SESSION['apiario_actual']->id;
		$consulta = $this->db->prepare("SELECT us.*  FROM user_api up
																INNER JOIN  apiario ap ON up.id_apiariosU = ap.id
																INNER JOIN usuario us ON up.id_usuarioA = us.id 
																WHERE ap.id = :id_apiario");
		$consulta->bindParam(":id_apiario", $id_apiario, PDO::PARAM_INT);
		$consulta->execute();
		return $consulta;
	}


	#validar el inicio de session
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