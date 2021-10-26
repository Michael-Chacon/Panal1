<?php

require_once 'model/bitacora.php';

class BitacoraController
{

    #registro de  bitcoras
    public function guardar_bitacora()
    {
        if (isset($_POST) && !empty($_POST)) {
            $id = $_POST['id'];
            $bitacora = isset($_POST['bitacora']) ? strip_tags($_POST['bitacora']) : false;
            $actividad = isset($_POST['actividad']) ? strip_tags($_POST['actividad']) : false;
            $calificacion = isset($_POST['calificacion']) ? strip_tags($_POST['calificacion']) : false;
            $fecha = isset($_POST['fecha']) ? strip_tags($_POST['fecha']) : false;
            date_default_timezone_set('America/Bogota');
            $hora = date("g:i:s:a");

            $obje = new Bitacora();
            $obje->setId($id);
            $obje->setBitacora($bitacora);
            $obje->setActividad($actividad);
            $obje->setCalificacion($calificacion);
            $obje->setFecha($fecha);
            $obje->setHora($hora);
            $estado = $obje->save_bitacora();

            if ($estado) {
                $_SESSION['bitacora'] = 'exito';
            } else {
                $_SESSION['bitacora'] = 'fallo';
            }
            header("Location:" . base_url . 'home/colmena&id_col=' . $id);
        }
    }

} //fin de la clase
