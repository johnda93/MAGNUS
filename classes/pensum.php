<?php

class pensum extends object_standard 
{
	protected $carrera;
	protected $asignatura;
	protected $componente;
	protected $obligatoria;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array(
			"carrera" => array("foreign_name" => "c_p", "foreign" => "carrera", "foreign_attribute" => "id"),
			"asignatura" => array("foreign_name" => "a_p", "foreign" => "asignatura", "foreign_attribute" => "id"),
			"componente" => array(),
			"obligatoria" => array()
		);
	}

	public function primary_key()
	{
		return array("carrera", "asignatura");
	}

	public function relational_keys($class, $rel_name)
	{
		switch ($class) {
			case "carrera":
				switch ($rel_titulo) {
					case "c_p":
						return array("carrera");
					break;
				}
			break;

			case "asignatura":
				switch ($rel_titulo) {
					case "a_p":
						return array("asignatura");
					break;
				}
			break;
		}
	}	
}

?>