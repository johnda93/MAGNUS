<?php

class opinion_profesor extends object_standard
{
	protected $profesor;
	protected $usuario;
	protected $rating;
	protected $comentario;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array(
			"profesor" => array("foreign_name" => "o_p", "foreign" => "profesor", "foreign_attribute" => "id"),
			"usuario" => array("foreign_name" => "op_u", "foreign" => "usuario_registrado", "foreign_attribute" => "nombre"),
			"rating" => array(),
			"comentario" => array()
		);
	}

	public function primary_key()
	{
		return array("profesor", "usuario");
	}

	public function relational_keys($class, $rel_name)
	{
		switch ($class) {
			case "profesor":
				switch ($rel_titulo) {
					case "o_p":
						return array("profesor");
					break;
				}
			break;

			case "usuario_registrado":
				switch ($rel_titulo) {
					case "op_u":
						return array("usuario_registrado");
					break;
				}
			break;
		}
	}
	
}

?>