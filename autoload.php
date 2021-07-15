<?php 

	function  autoload($clase)
	{
		include 'controller/' . $clase . '.php';
	}

	spl_autoload_register('autoload');
 ?>