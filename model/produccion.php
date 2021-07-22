<?php 

class Produccion
{
	private $id;
	private $produc;
	private $fecha;
	public $db;

	public  function __construct()
	{
		$this->db = Database::conectar();
	}

	#metodos get
	public function getId()
	{
		return $this->id;
	}

	public function getProduccion()
	{
		return $this->produc;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	#metodos set
	public function setId($id_p)
	{
		$this->id  = $id_p;
	}

	public function setProduc($produ)
	{
		$this->produc  = $produ;
	}

	public function setFecha($fecha_p)
	{
		$this->fecha  = $fecha_p;
	}


	#mis metodos 

	#guardar produccion
	public function save()
	{
		$pro = $this->getProduccion();
		$fech = $this->getFecha();
		$id_apiario = $_SESSION['apiario_actual']->id;

		$miel = $this->db->prepare("INSERT INTO produccion VALUES (null, :id_apiario, :pro, :fech)");
		$miel->bindParam(":id_apiario", $id_apiario, PDO::PARAM_INT);
		$miel->bindParam(":pro", $pro, PDO::PARAM_INT);
		$miel->bindParam(":fech", $fech, PDO::PARAM_STR);
		$miel->execute();
		return $miel;
	}


	#cantidad de miel recolectada hasta el momento 
	public function total_miel()
	{
		$apiario_idP = $_SESSION['apiario_actual']->id;
		$total =  $this->db->prepare("SELECT SUM(peso) AS 'total_miel' FROM  produccion WHERE id_apiarioP = :apiario_idP");
		$total->bindParam(":apiario_idP", $apiario_idP, PDO::PARAM_INT);
		$total->execute();
		return $total->fetch();
	}


	#seleccionar fecha y cantidad de miel producida en las ultimas 6 sacadas 
	public function grafica()
	{
		$id_apiarioP = $_SESSION['apiario_actual']->id;
		$grafica =  $this->db->prepare("SELECT peso, fecha FROM produccion WHERE id_apiarioP = :id_apiario ORDER BY id DESC LIMIT 5");
		$grafica->bindParam(":id_apiario", $id_apiarioP, PDO::PARAM_INT);
		$grafica->execute();
		return $grafica;
	}


}#fin de la clase

 ?>