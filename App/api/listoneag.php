<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}



$dataandh= file_get_contents("php://input");
$datautf8=utf8_encode($dataandh);

$dataandhj=json_decode(utf8_decode($datautf8));

$idcli=filter_var($dataandhj->idcli,FILTER_SANITIZE_SPECIAL_CHARS);

$horarios= new \App\dao\Agendamentosdao();



if(empty($idcli)){
	die("Erro");
}

$result=$horarios->verifyoneAg($idcli);

echo $result;

?>