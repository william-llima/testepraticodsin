<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}

$dataandh= file_get_contents("php://input");
$datautf8=utf8_encode($dataandh);

$dataandhj=json_decode(utf8_decode($datautf8));

$data=filter_var($dataandhj->data,FILTER_SANITIZE_SPECIAL_CHARS);
$hora=filter_var($dataandhj->hora,FILTER_SANITIZE_SPECIAL_CHARS);

$horarios= new \App\dao\Agendamentosdao();

$result=$horarios->verifyAgendamento($data);
if($result==200){
	
	die("200");
}




?>