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
		$stmt->bind_param('iisis',$agtsT,$agclidT,$dataagT,$semanaagT,$horarioagT);
		$agtsT=$conn->real_escape_string($ag->getTypeid());
		$agclidT=$conn->real_escape_string($ag->getClientid());
		$dataagT=$conn->real_escape_string($ag->getDataag());
		$semanaagT=$conn->real_escape_string($ag->getSemanaag());
		$horarioagT=$conn->real_escape_string($ag->getHoram());

		if($stmt->execute()){
			return "200";
		}else{
			return "500";
		}
	}

	public function updateag(Agendamentoupdate $ag){
			$sql="UPDATE agendamentos set typeid=?,clientid=?,dataagendamento=?,semanaag=?,horariomarcado=? where id=? ";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('iisiss',$agtsT,$agclidT,$dataagT,$semanaagT,$horarioagT,$idT);
		$agtsT=$conn->real_escape_string($ag->getTypeid());
		$agclidT=$conn->real_escape_string($ag->getClientid());
		$dataagT=$conn->real_escape_string($ag->getDataag());
		$semanaagT=$conn->real_escape_string($ag->getSemanaag());
		$horarioagT=$conn->real_escape_string($ag->getHoram());
		$idT=$conn->real_escape_string($ag->getId());

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


	public function ListallAg(){
		$sql="SELECT * from agendamentos inner join servicesdesc on agendamentos.typeid = servicesdesc.id inner join clientes on agendamentos.clientid = clientes.id";
		$conn=Connection::getConn();
		if($conn->query($sql)){
			$linha=	$conn->query($sql);
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

	public function verifyoneAg($dataid){
		$sql="SELECT agendamentos.id,agendamentos.clientid,agendamentos.dataagendamento,agendamentos.horariomarcado,agendamentos.typeid,servicesdesc.preco,servicesdesc.descricao from agendamentos inner join servicesdesc on agendamentos.typeid = servicesdesc.id where clientid=?";
		$conn=Connection::getConn();
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("i",$dataT);
		$dataT=$conn->real_escape_string($dataid);
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