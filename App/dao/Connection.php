<?php
namespace App\dao; 

class Connection{
	private static $instance;

	public static function getConn(){
		$host="localhost";
		$user="root";
		$pswd="";
		$dbname="salaodsin";

		if(!isset(self::$instance)){
			self::$instance=new \mysqli($host,$user,$pswd,$dbname);
			if(self::$instance->error){
				die("Erro ao conectar com o banco de dados");
			}
		}

		return self::$instance;
	} 
}

// $net= new Connection();

// var_dump($net->getConn()); 
?>