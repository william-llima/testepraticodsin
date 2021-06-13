<?php
namespace App\dao;

if(!isset($_SESSION)){
	session_start();
}

 
class Clientes{
	private $nome,$email,$telefone,$cpf,$senha;

	public function setNome($n){
		$this->nome=$n;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setEmail($e){
		$this->email=$e;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setTelefone($t){
		$this->telefone=$t;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function setCpf($cpf){
		$this->cpf=$cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}

	public function setSenha($s){
		$this->senha=$s;
	}
	public function getSenha(){
		return $this->senha;
	}
}

?>