<?php 

	function  autoload($clase)
	{
		if (file_exists('controller/' . $clase . '.php')) {
			include 'controller/' . $clase . '.php';
		}
	}

	spl_autoload_register('autoload');
 ?>