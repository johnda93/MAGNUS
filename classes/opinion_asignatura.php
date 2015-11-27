<?php

class opinion_asignatura extends object_standard
{
	protected $asignatura;
	protected $usuario;
	protected $rating;
	protected $comentario;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array(
			"asignatura" => array("foreign_name" => "a_o", "foreign" => "asignatura", "foreign_attribute" => "id"),
			"usuario" => array("foreign_name" => "oa_u", "foreign" => "usuario_registrado", "foreign_attribute" => "nombre"),
			"rating" => array(),
			"comentario" => array()
		);
	}

	public function primary_key()
	{
		return array("asignatura", "usuario");
	}

	public function relational_keys($class, $rel_name)
	{
		switch ($class) {
			case "asignatura":
				switch ($rel_titulo) {
					case "a_o":
						return array("asignatura");
					break;
				}
			break;

			case "usuario_registrado":
				switch ($rel_titulo) {
					case "oa_u":
						return array("usuario_registrado");
					break;
				}
			break;
		}
	}
	
}

?>