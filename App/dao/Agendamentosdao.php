<?php
namespace App\dao;
if(!isset($_SESSION)){
	session_start();
}

class Agendamentosdao{
	public function insertag(Agendamento $ag){
			$sql="INSERT INTO agendamentos(typeid,clientid,dataagendamento,semanaag,horariomarcado)values(?,?,?,?,?)";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('iisss',$nomeT,$emailT,$telefoneT,$cpfT,$senhaT);
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

	public function verifyAgendamento($data){
		$sql="SELECT * FROM agendamentos where dataagendamento=?";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$dataT);
		$dataT=$conn->real_escape_string($data);
		if($stmt->execute()){
			$linha=$stmt->get_result();
			if($linha->num_rows > 0){
				$rows=$linha->fetch_all(MYSQLI_ASSOC);
				return json_encode($rows,JSON_UNESCAPED_UNICODE);
				

			}else{
				return "200";
			}
		}else{
			return "error";
		}
	}

	public function listHorarios(){
				$sql="SELECT * FROM horariosd";
				$conn=Connection::getConn();
				$stmt=$conn->query($sql);
				if($stmt){
					$linha=$stmt;
					if($linha->num_rows > 0){
						$row=$linha->fetch_all(MYSQLI_ASSOC);

						return json_encode($row,JSON_UNESCAPED_UNICODE);
					}else{
						return [];
					}
				}else{
					return "error";
				}
			}
}


?>