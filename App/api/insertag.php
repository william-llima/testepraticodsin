<?php 


require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}



$dataag= file_get_contents("php://input");
$datautf8ag=utf8_encode($dataag);
$dataagj=json_decode(utf8_decode($datautf8ag));

var_dump($dataagj);

$servicetype= intval(filter_var($dataagj->servicetype,FILTER_SANITIZE_EMAIL));
$idclient= intval(filter_var($dataagj->idclient,FILTER_SANITIZE_EMAIL));
$dataagi= filter_var($dataagj->dataagi,FILTER_SANITIZE_EMAIL);
$semana= filter_var($dataagj->semana,FILTER_SANITIZE_EMAIL);
$horario=filter_var($dataagj->horario,FILTER_SANITIZE_SPECIAL_CHARS);

if($_SESSION["userid"] != $idclient){
	die("Usuario Invalido");
}
var_dump($servicetype,$idclient);
	if(is_int($servicetype) && is_int($idclient) && is_int($semana)){
		die("Valores digitados invalidos");
	}


if(!empty($servicetype)&&
   !empty($idclient)&&
   !empty(trim($dataagi))&&
   !empty($semana)&&
   !empty(trim($horario))){


	$objag=new \App\dao\Agendamento();

	$objag->setTypeid($servicetype);
	$objag->setClientid($idclient);
	$objag->setDataag($dataagi);
	$objag->setSemanaag($semana);
	$objag->setHoram($horario);


	$agendf= new \App\dao\Agendamentosdao();

	$resultagd=$agendf->insertag($objag);
	echo $resultagd;

}else{
	echo "Valores invalidos";
}

?>