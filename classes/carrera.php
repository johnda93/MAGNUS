<?php

class carrera extends object_standard 
{
	protected $id;
	protected $nombre;
	protected $escuela;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array("id" => array(), "nombre" => array(), "escuela" => array());
	}

	public function primary_key()
	{
		return array("id");
	}

	public function relational_keys($class, $rel_name)
	{
		switch ($class) {
			default: break;
		}
	}	
}

?>