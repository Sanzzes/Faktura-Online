<?php

/*
*	Athor: Steven Bohm
*	Copyright: (c) 2011 steven-bohm.net
*/
	
	//Smarty Variablen laden
	define('SMARTY_DIR', 'src/libs/');
	require(SMARTY_DIR . 'Smarty.class.php');
	ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.'/src/libs/');

	
	//Applikations Autoload
	
	
class Smarty_GuestBook  extends Smarty  {
	
	function __Smarty_GuestBook()
		{
			$this->Smarty();
			
			$this->template_dir = './templates/';
			$this->compile_dir = 'templates_c/';
			$this->config_dir = 'configs/';	
			$this->cache_dir = 'cache/';
			
			$this->caching	= true;
		}
}

?>