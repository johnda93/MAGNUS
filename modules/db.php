<?php
/**
 * Project:     Framework G - G Light
 * File:        db.php
 * 
 * For questions, help, comments, discussion, etc., please join to the
 * website www.frameworkg.com
 * 
 * @link http://www.frameworkg.com/
 * @copyright 2013-02-07
 * @author Group Framework G  <info at frameworkg dot com>
 * @version 1.2
 */
class db
{
    var $server = C_DB_SERVER; //DB server
	var $user = C_DB_USER; //DB user
    var $pass = C_DB_PASS; //DB password
	var $db = C_DB_DATABASE_NAME; //DB database name
	var $limit = C_DB_LIMIT; //DB limit of elements by page
	var $cn;
	var $numpages;
	
	public function db(){}
	
	//connect to database
	public function connect()
	{
		$this->cn = mysqli_connect($this->server, $this->user, $this->pass);
		if(!$this->cn) {die("Failed connection to the database: ".mysqli_error($this->cn));}
		if(!mysqli_select_db($this->cn,$this->db)) {die("Unable to communicate with the database $db: ".mysqli_error($this->cn));}
		mysqli_query($this->cn,"SET NAMES utf8");
	}
	
	//function for doing multiple queries
	public function do_operation($operation, $class = NULL)
	{
		$result = mysqli_query($this->cn, $operation) ;
		if(!$result) {$this->throw_sql_exception($class);}	
	}
	
	//function for obtain data from db in object form
	private function get_data($operation)
	{		
		$data = array(); 
		$result = mysqli_query($this->cn, $operation) or die(mysqli_error($this->cn));
		while ($row = mysqli_fetch_object($result))
		{
			array_push($data, $row);
		}
		return $data;
	}
	
	//throw exception to web document
	private function throw_sql_exception($class)
    {
		$errno = mysqli_errno($this->cn); $error = mysqli_error($this->cn);
		$msg = $error."<br /><br /><b>Error number:</b> ".$errno;
        throw new Exception($msg);
    }
	
	//for avoid sql injections, this functions cleans the variables
	private function escape_string(&$data)
	{
		if(is_object($data))
		{
			foreach ($data->metadata() as $key => $attribute)
			{if(!is_empty($data->get($key))){$data->set($key,mysqli_real_escape_string($this->cn,$data->get($key)));}}
		}
		else if(is_array($data))
		{
			foreach ($data as $key => $value) 
			{if(!is_array($value)){$data[$key]=mysqli_real_escape_string($this->cn,$value);}}
		}
	}
	
	//function for add data to db
	public function insert($options,$object) 
	{
		switch($options['lvl1'])
		{																																																																																													
			case "usuario_registrado":
			switch($options['lvl2'])
			{
				case "normal":
					$hasher = new PasswordHash(8, FALSE);
					$contraseña = $hasher->HashPassword($object->get('contraseña'));
					unset($hasher);
					$nombre = mysqli_real_escape_string($this->cn, $object->get('nombre'));				
					$this->do_operation("INSERT INTO usuario_registrado(nombre, contraseña) VALUES('$nombre', '$contraseña');");						
				break;
			}
			break;
			case "asignatura":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$nombre = mysqli_real_escape_string($this->cn,$object->get('nombre'));
					$escuela = mysqli_real_escape_string($this->cn,$object->get('escuela'));
					$creditos = mysqli_real_escape_string($this->cn,$object->get('creditos'));
					$this->do_operation("INSERT INTO asignatura(id, nombre, escuela, creditos) VALUES('$id', '$nombre', '$escuela', '$creditos');");	
				break;
			}
			break;
			case "grupo":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$asignatura = mysqli_real_escape_string($this->cn,$object->get('asignatura'));
					$horario = mysqli_real_escape_string($this->cn,$object->get('horario'));
					$profesor1 = mysqli_real_escape_string($this->cn,$object->get('profesor1'));
					$profesor2 = mysqli_real_escape_string($this->cn,$object->get('profesor2'));
					if (is_empty($profesor2)) {
						$this->do_operation("INSERT INTO grupo(id, asignatura, horario, profesor1) 
										 VALUES('$id', '$asignatura', '$horario', '$profesor1');");
					} else {
						$this->do_operation("INSERT INTO grupo(id, asignatura, horario, profesor1, profesor2) 
										 VALUES('$id', '$asignatura', '$horario', '$profesor1', '$profesor2');");
					}
				break;
			}
			break;
			case "profesor":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$nombre = mysqli_real_escape_string($this->cn,$object->get('nombre'));
					$escuela = mysqli_real_escape_string($this->cn,$object->get('escuela'));
					$this->do_operation("INSERT INTO profesor(id, nombre, escuela) VALUES('$id', '$nombre', '$escuela');");	
				break;
			}
			break;

			case "opinion_asignatura":
			switch($options['lvl2'])
			{
				case "normal": 
					$asignatura = $object->get('asignatura');
					$usuario = $object->get('usuario');
					$comentario = $object->get('comentario');
					$rating = $object->get('rating');

					$this->do_operation("INSERT INTO opinion_asignatura(asignatura, usuario, comentario, rating) VALUES('$asignatura', '$usuario', '$comentario', '$rating');");	
				break;
			}
			break;

			case "opinion_profesor":
			switch($options['lvl2'])
			{
				case "normal": 
					$profesor = $object->get('profesor');
					$usuario = $object->get('usuario');
					$comentario = $object->get('comentario');
					$rating = $object->get('rating');

					$this->do_operation("INSERT INTO opinion_profesor(profesor, usuario, comentario, rating) VALUES('$profesor', '$usuario', '$comentario', '$rating');");	
				break;
			}
			break;

			case "recurso":
			switch($options['lvl2'])
			{
				case "normal": 
					$nombre = $object->get('nombre');
					$asignatura = $object->get('asignatura');
					$usuario = $object->get('usuario');
					
					$this->do_operation("INSERT INTO recurso(nombre, asignatura, usuario) VALUES('$nombre', '$asignatura', '$usuario');");	
				break;
			}
			break;
			
			default: break;
		}
	}
	
	//function for edit data from db
	public function update($options,$object) 
	{
		switch($options['lvl1'])
		{																																																																																																		
			case "user":
			switch($options['lvl2'])
			{
				case "normal":
					//
				break;
			}
			break;
			
			case "asignatura":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$nombre = mysqli_real_escape_string($this->cn,$object->get('nombre'));
					$escuela = mysqli_real_escape_string($this->cn,$object->get('escuela'));
					$creditos = mysqli_real_escape_string($this->cn,$object->get('creditos'));
					$id_viejo = mysqli_real_escape_string($this->cn,$object->auxiliars['id_viejo']);
					$this->do_operation("UPDATE asignatura SET id = '$id', nombre = '$nombre', escuela = '$escuela', creditos = '$creditos' WHERE id = '$id_viejo';");	
				break;
			}
			break;

			case "grupo":
			switch($options['lvl2'])
			{
				case "normal":
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$asignatura = mysqli_real_escape_string($this->cn,$object->get('asignatura'));
					$horario = mysqli_real_escape_string($this->cn,$object->get('horario'));
					$profesor1 = mysqli_real_escape_string($this->cn,$object->get('profesor1'));
					$profesor2 = mysqli_real_escape_string($this->cn,$object->get('profesor2'));
					if (is_empty($profesor2)) {
						$this->do_operation("UPDATE grupo SET horario = '$horario', profesor1 = '$profesor1' WHERE id = '$id';");
					} else {
						$this->do_operation("UPDATE grupo SET horario = '$horario', profesor1 = '$profesor1', profesor2 = '$profesor2' WHERE id = '$id';");
					}
					
						
				break;
			}
			break;

			case "profesor":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$nombre = mysqli_real_escape_string($this->cn,$object->get('nombre'));
					$escuela = mysqli_real_escape_string($this->cn,$object->get('escuela'));
					$id_viejo= mysqli_real_escape_string($this->cn,$object->auxiliars['id_viejo']);
					$this->do_operation("UPDATE profesor SET id = '$id', nombre = '$nombre', escuela = '$escuela' WHERE id = '$id_viejo';");	
				break;
			}
			break;

			default: break;
		}
	}
	
	//function for delete data from db
	public function delete($options,$object)
	{
		switch($options['lvl1'])
		{																																																																																												
			case "user":
			switch($options['lvl2'])
			{
				case "normal": 
					//
				break;
			}
			break;

			case "asignatura":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$this->do_operation("DELETE FROM asignatura WHERE id = '$id';");
				break;
			}
			break;

			case "grupo":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$this->do_operation("DELETE FROM grupo WHERE id = '$id';");
				break;
			}
			break;

			case "profesor":
			switch($options['lvl2'])
			{
				case "normal": 
					$id = mysqli_real_escape_string($this->cn,$object->get('id'));
					$this->do_operation("UPDATE grupo SET profesor2 = NULL WHERE profesor2 = '$id';");
					$this->do_operation("DELETE FROM profesor WHERE id = '$id';");
				break;
			}
			break;
			
			default: break;			  
		}
	}
	
	//function that returns an array with data from a operation
	public function select($options,$data)
	{
		$info = array();
		switch($options['lvl1'])
		{																																																																																																										
			case "usuario_registrado":
			switch($options['lvl2'])
			{
				case "one": 
					$this->escape_string($data);
					$nombre = mysqli_real_escape_string($this->cn, $data['nombre']);
					$info = $this->get_data("SELECT * FROM usuario_registrado WHERE nombre = '$nombre';");	

				break;

				case "one_login_user":
					$nombre = mysqli_real_escape_string($this->cn, $data['nombre']);
					$contraseña = mysqli_real_escape_string($this->cn,$data['contraseña']);
					//$result = $this->get_data("SELECT user, password FROM user WHERE user='$user';");
					$result = $this->get_data("SELECT nombre, contraseña FROM usuario_registrado WHERE nombre='$nombre';");
					$hasher = new PasswordHash(8, FALSE);
					if ($hasher->CheckPassword($contraseña, $result[0]->contraseña))
						$info = $this->get_data("SELECT * FROM usuario_registrado WHERE nombre = '$nombre';");
					unset($hasher);
				break;
			}
			break;
			case "usuario_administrador":
			switch($options['lvl2'])
			{
				case "one": 
					$this->escape_string($data);
					$nombre = mysqli_real_escape_string($this->cn, $data['nombre']);
					$info = $this->get_data("SELECT * FROM usuario_administrador WHERE nombre = '$nombre';");	

				break;

				case "one_login_admin":
					$nombre = mysqli_real_escape_string($this->cn, $data['nombre']);
					$contraseña = mysqli_real_escape_string($this->cn,$data['contraseña']);
					//$result = $this->get_data("SELECT user, password FROM user WHERE user='$user';");
					$result = $this->get_data("SELECT nombre, contraseña FROM usuario_administrador WHERE nombre='$nombre';");
					$hasher = new PasswordHash(8, FALSE);
					if ($hasher->CheckPassword($contraseña, $result[0]->contraseña))
						$info = $this->get_data("SELECT * FROM usuario_administrador WHERE nombre = '$nombre';");
					unset($hasher);
				break;
			}
			break;

			case "carrera":
			switch($options['lvl2'])
			{
				case "all": 
					$info = $this->get_data("SELECT * FROM carrera;");
				break;

				case "one": 
					$this->escape_string($data);
					$id = $data['id'];
					$info = $this->get_data("SELECT * FROM carrera WHERE id = '$id';");	
				break;
			}
			break;

			case "pensum":
			switch($options['lvl2'])
			{
				case "by_carrera": 
					$this->escape_string($data);
					$carrera = $data['carrera'];
					$asignatura = $data['asignatura'];
					$info = $this->get_data("SELECT p.*, a.nombre AS nombre_asignatura FROM pensum p, asignatura a WHERE p.carrera = '$carrera' AND a.id = '$asignatura';");	

				break;
			}
			break;
			case "asignatura":
			switch($options['lvl2'])
			{
				case "all": 
					$info = $this->get_data("SELECT * FROM asignatura;");
				break;
				case "one": 
					$this->escape_string($data);
					$id = mysqli_real_escape_string($this->cn,$data['id']);
					$info = $this->get_data("SELECT * FROM asignatura WHERE id = '$id';");	
				break;

				case "by_carrera": 
					$this->escape_string($data);
					$carrera = $data['carrera'];
					$info = $this->get_data("SELECT a.*, p.componente AS componente, p.obligatoria AS obligatoria FROM asignatura a,carrera c, pensum p WHERE p.asignatura=a.id AND c.id='$carrera' AND p.carrera=c.id;");	
				break;
			}
			break;
			case "grupo":
			switch($options['lvl2'])
			{
				case "all": 
					$info = $this->get_data("SELECT * FROM grupo;");	
				break;
				case "one": 
					$this->escape_string($data);
					$id = mysqli_real_escape_string($this->cn,$data['id']);
					$info = $this->get_data("SELECT * FROM grupo WHERE id = '$id';");	
				break;
				case "by_asignatura": 
					$this->escape_string($data);
					$asignatura = mysqli_real_escape_string($this->cn,$data['asignatura']);
					$info = $this->get_data("SELECT * FROM grupo WHERE asignatura = '$asignatura';");
				break;
				case "by_profesor": 
					$this->escape_string($data);
					$profesor = mysqli_real_escape_string($this->cn,$data['profesor1']);
					$info = $this->get_data("SELECT g.*, a.nombre AS nombre_asignatura
											 FROM grupo g, asignatura a 
											 WHERE (profesor1 = '$profesor' OR profesor2 = '$profesor') AND g.asignatura = a.id;");	
				break;
			}
			break;

			case "profesor":
			switch($options['lvl2'])
			{
				case "all": 
					$info = $this->get_data("SELECT * FROM profesor;");
				break;

				case "one": 
					$this->escape_string($data);
					$id = $data['id'];
					$info = $this->get_data("SELECT * FROM profesor WHERE id = '$id';");	
				break;
			}
			break;

			case "opinion_profesor":
			switch($options['lvl2'])
			{
				case "by_profesor": 
					$this->escape_string($data);
					$profesor = $data['profesor'];
					$info = $this->get_data("SELECT * FROM opinion_profesor WHERE profesor = '$profesor';");	
				break;

				case "one": 
					$this->escape_string($data);
					$id = mysqli_real_escape_string($this->cn,$data['id']);
					$info = $this->get_data("SELECT * FROM profesor WHERE id = '$id';");	

				case "by_usuario_profesor": 
					$this->escape_string($data);
					$usuario = $data['usuario'];
					$profesor = $data['profesor'];
					$info = $this->get_data("SELECT * FROM opinion_profesor WHERE usuario = '$usuario' AND profesor = '$profesor';");	
				break;
			}
			break;

			case "opinion_asignatura":
			switch($options['lvl2'])
			{
				case "by_asignatura": 
					$this->escape_string($data);
					$asignatura = $data['asignatura'];
					$info = $this->get_data("SELECT * FROM opinion_asignatura WHERE asignatura = '$asignatura';");	
				break;

				case "by_usuario_asignatura": 
					$this->escape_string($data);
					$usuario = $data['usuario'];
					$asignatura = $data['asignatura'];
					$info = $this->get_data("SELECT * FROM opinion_asignatura WHERE usuario = '$usuario' AND asignatura = '$asignatura';");	
				break;
			}
			break;

			case "recurso":
			switch($options['lvl2'])
			{
				case "by_asignatura": 
					$this->escape_string($data);
					$asignatura = $data['asignatura'];
					$info = $this->get_data("SELECT * FROM recurso WHERE asignatura = '$asignatura';");	
				break;
			}
			break;
			
			default: break;
		}
		return $info;
	}
	
	//close the db connection
	public function close()
	{
		if($this->cn){mysqli_close($this->cn);}
	}
}

?>		