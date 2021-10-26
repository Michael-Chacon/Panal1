<?php 

class Colmena
{
	private $id;
	private $numero;
	private $cajas;
	private $tamaño;
	private $alimentador;
	private $estado;

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

	public function getNumero()
	{
		return $this->numero;
	}

	public function getCajas()
	{
		return $this->cajas;
	}

	public function getTamaño()
	{
		return $this->tamaño;
	}

	public function getAlimentador()
	{
		return $this->alimentador;
	}

	public function getEstado()
	{
		return $this->estado;
	}


	// metodos set
	public function setId($id_col)
	{
		$this->id = $id_col;
	}

	public function setNumero($numero_col)
	{
		$this->numero = $numero_col;
	}

	public function setCajas($caja_col)
	{
		$this->cajas = $caja_col;
	}

	public function setTamaño($tamaño_col)
	{
		$this->tamaño = $tamaño_col;
	}

	public function setAlimentador($alimentador_col)
	{
		$this->alimentador = $alimentador_col;
	}

	public function setEstado($estado_col)
	{
		$this->estado = $estado_col;
	}


	# mis metodos

	#guardar colmenas
	public function save()
	{
		$id_apiario = $_SESSION['apiario_actual']->id;
		$num = $this->getNumero();
		$caja = $this->getCajas();
		$tamano = $this->getTamaño();
		$alimento = 'No';
		$status = 'viva';

		$registro = $this->db->prepare("INSERT INTO colmena VALUES (null, :id_apiario, :num, :caja, :tamano, :alimento, :status)");
		$registro->bindParam(":id_apiario", $id_apiario, PDO::PARAM_INT);
		$registro->bindParam(":num", $num, PDO::PARAM_INT);
		$registro->bindParam(":caja", $caja, PDO::PARAM_INT);
		$registro->bindParam(":tamano", $tamano, PDO::PARAM_STR);
		$registro->bindParam(":alimento", $alimento, PDO::PARAM_STR);
		$registro->bindParam(":status", $status, PDO::PARAM_STR);
		$registro->execute();
		return $registro;
	}


	#listar todas las colmenas
	public function getAll()
	{	
		$apiario_id = $_SESSION['apiario_actual']->id;
		$colmenas = $this->db->prepare("SELECT * FROM colmena WHERE id_apiarioC = :apiario_id");
		$colmenas->bindParam(":apiario_id", $apiario_id, PDO::PARAM_INT);
		$colmenas->execute();
		return $colmenas;
	}


	#conteo de colmenas 
	public function total_colmenas()
	{
		$apiario_idC = $_SESSION['apiario_actual']->id;
		$total =  $this->db->prepare("SELECT count(id)  AS 'total' FROM  colmena WHERE id_apiarioC = :apiario_idC");
		$total->bindParam(":apiario_idC", $apiario_idC, PDO::PARAM_INT);
		$total->execute();
		return $total->fetch();
	}


	#datos de la colmena
	public function obtener_colmena()
	{
		$id_colmena = $this->getId();
		$colmena = $this->db->prepare("SELECT * FROM colmena WHERE id = :id_colmena");
		$colmena->bindParam(":id_colmena", $id_colmena, PDO::PARAM_INT);
		$colmena->execute();
		return$colmena->fetchObject();
	}


	#actualizar alimentador
	public function update_eat()
	{	
		$id_c =  $this->getId();
		$eat = $this->getAlimentador();
		$feeder = $this->db->prepare("UPDATE colmena SET alimentador = :alimentador WHERE id = :id_colmena");
		$feeder->bindParam(":alimentador", $eat, PDO::PARAM_STR);
		$feeder->bindParam(":id_colmena", $id_c, PDO::PARAM_INT);
		$feeder->execute();
		return $feeder;
	}


	#actualizar estado
	public function update_status()
	{	
		$id_c =  $this->getId();
		$status = $this->getEstado();
		$estado_col = $this->db->prepare("UPDATE colmena SET estado = :estado WHERE id = :id_colmena");
		$estado_col->bindParam(":estado", $status, PDO::PARAM_STR);
		$estado_col->bindParam(":id_colmena", $id_c, PDO::PARAM_INT);
		$estado_col->execute();
		return $estado_col;
	}


	#actualizar cajas
	public function update_box()
	{	
		$id_c =  $this->getId();
		$cajas_col = $this->getCajas();
		$new_box = $this->db->prepare("UPDATE colmena SET cajas = :cajas_col WHERE id = :id_colmena");
		$new_box->bindParam(":cajas_col", $cajas_col, PDO::PARAM_INT);
		$new_box->bindParam(":id_colmena", $id_c, PDO::PARAM_INT);
		$new_box->execute();
		return $new_box;
	}



}//fin de la clase

 ?>