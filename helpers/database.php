
<?php 
	
	class Database
	{
		public static function conexion()
		{
			$conectar =  new mysqli('localhost', 'root',  '', 'panal', 3306);
			$conectar->query("SET NAMES 'utf8mb4'");
			return $conectar;
		}
	}

 ?>