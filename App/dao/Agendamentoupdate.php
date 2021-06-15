<?php
namespace App\dao;
if(!isset($_SESSION)){
	session_start();
}

 

class Agendamentoupdate{
	private $idt,$typeid,$clientid,$dataag,$semanaag,$horam;

	public function setTypeid($id){
		$this->typeid=$id;
	}
	public function getTypeid(){
		return $this->typeid;
	}
	public function setId($id){
		$this->idt=$id;
	}
	public function getId(){
		return $this->idt;
	}

	public function setClientid($cid){
		$this->clientid=$cid;
	}
	public function getClientid(){
		return $this->clientid;
	}
	public function setDataag($d){
		$this->dataag=$d;
	}
	public function getDataag(){
		return $this->dataag;
	}
	public function setSemanaag($s){
		$this->semanaag=$s;
	}
	public function getSemanaag(){
		return $this->semanaag;
	}
	public function setHoram($hm){
		$this->horam=$hm;
	}
	public function getHoram(){
		return $this->horam;
	}
}


?>