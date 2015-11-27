<?php

class grupo extends object_standard
{

	protected $id;
	protected $asignatura;
	protected $horario;
	protected $profesor1;
	protected $profesor2;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array(
			"id" => array(),
			"asignatura" => array("foreign_name" => "a_g", "foreign" => "asignatura", "foreign_attribute" => "id"),
			"horario" => array(),
			"profesor1" => array("foreign_name" => "p1_g", "foreign" => "profesor", "foreign_attribute" => "id"),
			"profesor2" => array("foreign_name" => "p2_g", "foreign" => "profesor", "foreign_attribute" => "id")
		);
	}

	public function primary_key()
	{
		return array("id");
	}

	public function relational_keys($class, $rel_titulo)
	{
		switch ($class) {
			case "asignatura":
				switch ($rel_titulo) {
					case "a_g":
						return array("asignatura");
					break;
				}
			break;

			case "profesor":
				switch ($rel_titulo) {
					case "p1_g":
						return array("profesor1");
					break;

					case "p2_g":
						return array("profesor2");
					break;
				}
			break;
			
			default: break;
		}
	}
}

?>