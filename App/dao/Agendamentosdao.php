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