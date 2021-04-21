<?php
class Conectar{
	protected $acceso;

	protected function Conexion(){
		try{
			$conectar = $this->acceso = new PDO("mysql:local=localhost; dbname=web_service","root", "robeco");
			return $conectar;
		}catch(Exeption $e){
			print "!Error al conectad con BD¡: " . $e->getMessage() . "<br>";
			die ();
		}
	}

	public function set_names(){
		return $this->acceso->query("SET NAMES 'utf8'");
	}
}
	