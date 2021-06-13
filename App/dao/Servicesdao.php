<?php
namespace App\dao;
if(!isset($_SESSION)){
	session_start();
}
 

class Servicesdao{
			public function listServices(){
				$sql="SELECT * FROM servicesdesc";
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
			public function verifyService($id){
				$sql="SELECT * FROM servicesdesc where id=?";
				$conn=Connection::getConn();
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("i",$idT);
				$idT=$conn->real_escape_string($id);
				if($stmt->execute()){
					$linha=$stmt->get_result();
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