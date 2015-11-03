<?php

class asignatura extends object_standard implements JsonSerializable
{

	protected $id;
	protected $nombre;
	protected $escuela;
	protected $creditos;

	var $components = array();
	var $auxiliars = array();

	public function metadata()
	{
		return array(
			"id" => array(),
			"nombre" => array(),
			"escuela" => array(),
			"creditos" => array()
		);
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

	public function jsonSerialize()
	{
		return [
			'id' => $this->get('id'),
			'nombre' => $this->get('nombre'),
			'escuela' => $this->get('escuela'),
			'creditos' => $this->get('creditos')
		];
	}
}

?>