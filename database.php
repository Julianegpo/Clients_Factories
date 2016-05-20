<?php
class DataBase{
	private static $db_host="localhost";
	private static $db_user="root";
	private static $db_pass="1234";
	private static $db_database="ClientesFabricas";	
	
	private $con;
	private $result;
	private $numRows;
	
	//conectar a la bbdd
	public function __construct(){
		$this->con = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_database);
	}
	//desconectar de la bbdd
	public function disconnect(){
		$this->con->close();
	}
	//ejecucion de querys
	public function executer($sql){
		$this->result=$this->con->query($sql);
		$this->numRows=$this->con->affected_rows;
		//$this->numRows=$this->result->num_rows;
	}
	public function getNumRows(){
		return $this->numRows;
	}
	public function getResultados(){
		$filas = array();
		for($i=0;$i<$this->numRows;$i++){
		$filas[]=$this->result->fetch_array();
		}
		return $filas;
	}
}
?>