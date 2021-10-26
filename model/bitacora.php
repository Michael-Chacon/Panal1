<?php

class Bitacora
{

    private $id;
    private $bitacora;
    private $actividad;
    private $calificacion;
    private $fecha;
    private $hora;

    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    // metodos set
    public function getId()
    {
        return $this->id;
    }

    public function getBitacora()
    {
        return $this->bitacora;
    }

    public function getActividad()
    {
        return $this->actividad;
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    // metodos set
    public function setId($id_bitacora)
    {
        $this->id = $id_bitacora;
    }

    public function setBitacora($bitacora_col)
    {
        $this->bitacora = $bitacora_col;
    }

    public function setActividad($actividad_col)
    {
        $this->actividad = $actividad_col;
    }

    public function setCalificacion($calificacion_col)
    {
        $this->calificacion = $calificacion_col;
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
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     *
     * @return self
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    // mis metodos
    #registrar bitacora de visitas
    public function save_bitacora()
    {
        $bitacoraC = $this->getBitacora();
        $actividadC = $this->getActividad();
        $calificacionC = $this->getCalificacion();
        $id_colmena = $this->getId();
        $fechaV = $this->getFecha();
        $horaR = $this->getHora();
        $id_user = $_SESSION['user']->id;

        $bitacoraA = $this->db->prepare("INSERT INTO bitacora VALUES (null,  :id_colmena, :id_user, :bitacoraC, :actividadC, :calificacionC, :fecha, :hora)");
        $bitacoraA->bindParam(":id_colmena", $id_colmena, PDO::PARAM_INT);
        $bitacoraA->bindParam(":id_user", $id_user, PDO::PARAM_INT);
        $bitacoraA->bindParam(":bitacoraC", $bitacoraC, PDO::PARAM_STR);
        $bitacoraA->bindParam(":actividadC", $actividadC, PDO::PARAM_STR);
        $bitacoraA->bindParam(":calificacionC", $calificacionC, PDO::PARAM_STR);
        $bitacoraA->bindParam(":fecha", $fechaV, PDO::PARAM_STR);
        $bitacoraA->bindParam(":hora", $horaR, PDO::PARAM_STR);
        $bitacoraA->execute();
        return $bitacoraA;
    }

    #obtener actividades
    public function get_alimentacion()
    {
        $colmena_id = $this->getId();
        $alimento = 'alimentacion';
        $alimentacio = $this->db->prepare("SELECT b.*, u.nombre AS 'user' FROM usuario u
																	INNER JOIN bitacora b ON b.id_user = u.id
																	WHERE b.id_colmenaB = :colmena AND actividad = :alimenta ORDER BY id DESC");
        $alimentacio->bindParam(":colmena", $colmena_id, PDO::PARAM_INT);
        $alimentacio->bindParam(":alimenta", $alimento, PDO::PARAM_STR);
        $alimentacio->execute();
        return $alimentacio;
    }

    #obtener revision
    public function get_revision()
    {
        $colmenaId = $this->getId();
        $revision = 'revision';
        $revisionC = $this->db->prepare("SELECT b.*, u.nombre AS 'user' FROM usuario u
																	INNER JOIN bitacora b ON b.id_user = u.id
																	WHERE b.id_colmenaB = :col AND actividad = :see ORDER BY id DESC");
        $revisionC->bindParam(":col", $colmenaId, PDO::PARAM_INT);
        $revisionC->bindParam(":see", $revision, PDO::PARAM_STR);
        $revisionC->execute();
        return $revisionC;
    }
} //fin de la clase
