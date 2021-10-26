<?php 

class Rendimiento
{
	private $id;
	private $fecha;
	private $calificacion;
	private $colmena;
	public $db;
	
	public function __construct()	
	{
		$this->db = Database::conectar();
	}






    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return mixed
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * @return mixed
     */
    public function getColmena()
    {
        return $this->colmena;
    }

    #metodos set ---------------------------------------
    

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param mixed $fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * @param mixed $calificacion
     *
     * @return self
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    /**
     * @param mixed $colmena
     *
     * @return self
     */
    public function setColmena($colmena)
    {
        $this->colmena = $colmena;

        return $this;
    }

    #mis metodos----------------------

   #guardar el indicador de rendimieno
    public function save_rendimiento()
    {
    	$id_colmena = $this->getColmena();
    	$fechaR = $this->getFecha();
    	$calificacionR = $this->getCalificacion();

    	$registro = $this->db->prepare("INSERT INTO rendimiento VALUES (null, :colmena, :fecha, :calificacion)");
    	$registro->bindParam(":colmena", $id_colmena, PDO::PARAM_INT);
    	$registro->bindParam(":fecha", $fechaR, PDO::PARAM_STR);
    	$registro->bindParam(":calificacion", $calificacionR, PDO::PARAM_INT);
    	$registro->execute();
    	return$registro;
    }


    #grafica
    public function grafica()
    {
    	$colmena_id = $this->getColmena();
    	$datos = $this->db->prepare("SELECT * FROM rendimiento WHERE id_colmenaR = :colmena ORDER BY id DESC LIMIT 7");
    	$datos->bindParam(":colmena", $colmena_id, PDO::PARAM_INT);
    	$datos->execute();
    	return $datos;
    }


    #ver el rendimiento de cada una de las colmenas por separado 
    public function rendimiento()
    {
        $id_apiario = $_SESSION['apiario_actual']->id;
        $promedio = $this->db->prepare("SELECT AVG(r.calificacion) AS 'promedio', c.numero AS 'colmena' FROM rendimiento r
                                                                INNER JOIN colmena c ON c.id = r.id_colmenaR
                                                                WHERE c.id_apiarioC = :apiario GROUP BY c.id");
        $promedio->bindParam(":apiario", $id_apiario, PDO::PARAM_INT);
        $promedio->execute();
        return $promedio;
    }


}#fin de la clase

 ?>