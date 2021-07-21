<?php 
class Utiles
{
	public static function borrar_error($error)
	{
		if (isset($_SESSION[$error])) {
			unset($_SESSION[$error]);
		}
	}

public static function is_user()
{
	if (!isset($_SESSION['user'])) {
		header("Location:" . base_url);
	}
}


}//FIN DE LA CLASE

 ?>