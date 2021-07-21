<?php 

class Apiarios
{
	private $id;
	private $nombre;
	private $municipio;
	private $vereda;
	private $finca;

	public $db;

	public function __construct()
	{
		$this->db = Database::conectar();
	}

	// metodos get

	public function getId()
	{
		return $this->id;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getMunicipio()
	{
		return $this->municipio;
	}

	public function getVereda()
	{
		return $this->vereda;
	}

	public function getFinca()
	{
		return $this->finca;
	}

	// metodos set

	public function setId($ids)
	{
		$this->id = $ids;
	}

	public function setNombre($name)
	{
		$this->nombre = $name;
	}

	public function setMunicipio($muni)
	{
		$this->municipio = $muni;
	}

	public function setVereda($veredas)
	{
		$this->vereda =  $veredas;
	}

	public function setFinca($fincas)
	{
		$this->finca = $fincas;
	}

	//  mis metodos

	public function guardar()
	{
		try {
			$id_a = null;
			$nom = $this->getNombre();
			$mun = $this->getMunicipio();
			$ver = $this->getVereda();
			$fin = $this->getFinca();

			$guardar = $this->db->prepare("INSERT INTO apiario VALUES(:id, :nombre, :municipio, :vereda, :finca)");
			$guardar->bindParam(":id", $id_a, PDO::PARAM_INT);
			$guardar->bindParam(":nombre", $nom, PDO::PARAM_STR);
			$guardar->bindParam(":municipio", $mun, PDO::PARAM_STR);
			$guardar->bindParam(":vereda", $ver, PDO::PARAM_STR);
			$guardar->bindParam(":finca", $fin, PDO::PARAM_STR);
			$ok = $guardar->execute();

			$id_apiario = $this->db->lastInsertId();
			$id_usuario = $_SESSION['user']->id;
			$vinculo =  $this->db->prepare("INSERT INTO user_api VALUES(:usuario, :apiario)");
			$vinculo->bindParam(":usuario", $id_usuario, PDO::PARAM_INT);
			$vinculo->bindParam(":apiario", $id_apiario, PDO::PARAM_INT);
			$vinculo->execute();
			return $ok;

			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function getAll()
	{
		$id_user = $_SESSION['user']->id;
		$all_apiarios = $this->db->prepare("SELECT ap.*  FROM user_api up
																INNER JOIN  apiario ap ON up.id_apiariosU = ap.id
																INNER JOIN usuario us ON up.id_usuarioA = us.id 
																WHERE us.id = :id_user;");
		$all_apiarios->bindParam(":id_user", $id_user, PDO::PARAM_INT);
		$all_apiarios->execute();
		return $all_apiarios;
	}

	public function getOne()
	{
		$id_apiario = $this->getId();

		$apairio =  $this->db->prepare("SELECT *  FROM apiario WHERE id = :id_apiario");
		$apairio->bindParam(":id_apiario", $id_apiario, PDO::PARAM_INT);
		$apairio->execute();
		return $apairio;
	}

}// fin de la clase


 ?>