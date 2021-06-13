<?php
namespace App\dao;
if(!isset($_SESSION)){
	session_start();
}



class Clientedao{
	public function cadcliente(Clientes $c){

		$sql="INSERT INTO clientes(nome,email,telefone,cpf,senha)values(?,?,?,?,?)";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sssis',$nomeT,$emailT,$telefoneT,$cpfT,$senhaT);
		$nomeT=$conn->real_escape_string($c->getNome());
		$emailT=$conn->real_escape_string($c->getEmail());
		$telefoneT=$conn->real_escape_string($c->getTelefone());
		$cpfT=$conn->real_escape_string($c->getCpf());
		$senhaT=$conn->real_escape_string($c->getSenha());

		if($stmt->execute()){
			return "200";
		}else{
			return "500";
		}

	}

	public function verifyClient($email,$senha){
		$sql="SELECT * FROM clientes where email=? and senha=?";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("ss",$emailT,$senhaT);
		$emailT=$conn->real_escape_string($email);
		$senhaT=$conn->real_escape_string($senha);
		if($stmt->execute()){
			$linha=$stmt->get_result();
			if($linha->num_rows > 0){
				$row=$linha->fetch_array();
				$_SESSION["userid"]=$row["id"];
				return "200";
				

			}else{
				return [];
			}
		}else{
			return "error";
		}
	}

	public function verifyRegister($email){
		$sql="SELECT * FROM clientes where email=?";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$emailT);
		$emailT=$conn->real_escape_string($email);
		if($stmt->execute()){
			$linha=$stmt->get_result();
			if($linha->num_rows > 0){
				return "200";

			}else{
				return [];
			}
		}else{
			return "error";
		}
	}
}


?>