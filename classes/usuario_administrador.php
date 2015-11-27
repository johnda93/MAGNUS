<?php

class usuario_administrador extends object_standard 
{

	protected $contraseña;
	protected $nombre;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array("contraseña" => array(), "nombre" => array());
	}

	public function primary_key()
	{
		return array("nombre");
	}

	public function relational_keys($class, $rel_name)
	{
		switch ($class) {
			default: break;
		}
	}	
}

?>