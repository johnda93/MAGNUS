<?php

class recurso extends object_standard
{
	protected $id;
	protected $nombre;
	protected $asignatura;
	protected $usuario;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array(
			"id" => array(),
			"nombre" => array(),
			"asignatura" => array("foreign_name" => "a_r", "foreign" => "asignatura", "foreign_attribute" => "id"),
			"usuario" => array("foreign_name" => "r_u", "foreign" => "usuario_registrado", "foreign_attribute" => "nombre")
		);
	}

	public function primary_key()
	{
		return array("id");
	}

	public function relational_keys($class, $rel_name)
	{
		switch ($class) {
			case "asignatura":
				switch ($rel_titulo) {
					case "a_r":
						return array("asignatura");
					break;
				}
			break;

			case "usuario_registrado":
				switch ($rel_titulo) {
					case "r_u":
						return array("usuario_registrado");
					break;
				}
			break;
		}
	}
	
}

?>