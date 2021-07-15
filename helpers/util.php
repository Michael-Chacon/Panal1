<?php 
class Utiles
{
	public static function borrar_error($error)
	{
		if (isset($_SESSION[$error])) {
			unset($_SESSION[$error]);
		}
	}
}

 ?>