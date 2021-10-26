<?php 

class Tarea
{
	private $id;
	private $tarea;
	private $fecha;
	private $estado;
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
     * @return mixed
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    /**
     * @param mixed $tarea
     *
     * @return self
     */
    public function setTarea($tarea)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    // mis metodos

    #guardar tarea
    public function guardar()
    {
    	$id_col = $this->getId();
    	$homework = $this->getTarea();
    	$date = $this->getFecha();
    	$status = 'pendiente';
    	$id_user = $_SESSION['user']->id;

    	$tareaC = $this->db->prepare("INSERT INTO tearea VALUES (null, :colmena, :user, :tarea, :fecha, :estado)");
    	$tareaC->bindParam(":colmena", $id_col, PDO::PARAM_INT);
    	$tareaC->bindParam(":user", $id_user, PDO::PARAM_INT);
    	$tareaC->bindParam(":tarea", $homework, PDO::PARAM_STR);
    	$tareaC->bindParam(":fecha", $date, PDO::PARAM_STR);
    	$tareaC->bindParam(":estado", $status, PDO::PARAM_STR);
    	$tareaC->execute();
    	return $tareaC;
    }

    #ontenr todas la tareas que faltan por hacer
    public function get_tareas()
    {
    	$id_col = $this->getId();
    	$estado_col = 'pendiente';

    	$trabajo = $this->db->prepare("SELECT t.*, u.nombre AS 'user' FROM usuario u
															INNER JOIN tearea t ON t.id_user = u.id 
															WHERE t.id_colmenaT = :idcolmena AND t.estado = :estado_col ORDER BY t.id DESC");
    	$trabajo->bindParam(":idcolmena", $id_col, PDO::PARAM_INT);
    	$trabajo->bindParam(":estado_col", $estado_col, PDO::PARAM_STR);
    	$trabajo->execute();
    	return $trabajo;
    }


    #cambiar de estado 
    public function update_tarea()
    {
    	$id_tarea = $this->getId();
    	$cambio = $this->getEstado();

    	$cambiar = $this->db->prepare("UPDATE tearea SET estado = :estado WHERE id = :id_tarea");
    	$cambiar->bindParam(":estado", $cambio, PDO::PARAM_STR);
    	$cambiar->bindParam(":id_tarea", $id_tarea, PDO::PARAM_INT);
    	$cambiar->execute();
    	return $cambiar;
    }


    #obtener todas la tareas pertenecientes a un apiario 
    public function tareas()
    {
        $id_apiario = $_SESSION['apiario_actual']->id;
        $estado_general = 'pendiente';

        $todas = $this->db->prepare("SELECT COUNT(t.id) AS 'tareas' FROM  tearea t 
                                                    INNER JOIN colmena c ON c.id = t.id_colmenaT
                                                    INNER JOIN  apiario a ON a.id = c.id_apiarioC
                                                    WHERE a.id = :apiarios AND t.estado = :estado");
        $todas->bindParam(":apiarios", $id_apiario, PDO::PARAM_INT);
        $todas->bindParam(":estado", $estado_general,  PDO::PARAM_STR);
        $todas->execute();
        return $todas->fetchObject();
    }




}//fin de  la clase

 ?>