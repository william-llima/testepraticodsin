<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}

 


if(isset($_SESSION["loged"])){
	die("Usuario ja esta logado");
}
$data= file_get_contents("php://input");
$datautf8=utf8_encode($data);
$dataj=json_decode(utf8_decode($datautf8));



$email= filter_var($dataj->email,FILTER_SANITIZE_EMAIL);
$senha= md5(filter_var($dataj->senha,FILTER_SANITIZE_SPECIAL_CHARS));
if(empty(trim($email)) || empty(trim($senha))){
	die("Campos vazios nao sao permitidos");
}

if($email=="Cabeleleila@Leila" && $dataj->senha=="Cabeleleila@Leila2021"){
	$_SESSION["ADM"]=true;
	die("adm200");
}




$verify= new \App\dao\Clientedao();

$result= $verify->verifyClient($email,$senha);

if($result==200){

	echo "verify200";
	$_SESSION["loged"]=true;
}else{
	echo "erro";
}

?>