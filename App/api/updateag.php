<?php

require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}



$dataag= file_get_contents("php://input");
$datautf8ag=utf8_encode($dataag);
$dataagj=json_decode(utf8_decode($datautf8ag));


$servicetype= intval(filter_var($dataagj->servicetype,FILTER_SANITIZE_EMAIL));
$idclient= intval(filter_var($dataagj->idclient,FILTER_SANITIZE_EMAIL));
$dataagi= filter_var($dataagj->dataagi,FILTER_SANITIZE_EMAIL);
$semana= intval(filter_var($dataagj->semana,FILTER_SANITIZE_EMAIL));
$horario=filter_var($dataagj->horario,FILTER_SANITIZE_SPECIAL_CHARS);
$id=filter_var($dataagj->id,FILTER_SANITIZE_SPECIAL_CHARS);
if($_SESSION["userid"] != $idclient){
	die("Usuario Invalido");
}

	if(!is_int($servicetype) || !is_int($idclient) || !is_int($semana)){
		die("Valores digitados invalidos");
	}


if(!empty($servicetype)&&
   !empty($idclient)&&
   !empty(trim($dataagi))&&
   !empty($semana)&&
   !empty(trim($horario))){


	$objag=new \App\dao\Agendamentoupdate();

	$objag->setTypeid($servicetype);
	$objag->setClientid($idclient);
	$objag->setDataag($dataagi);
	$objag->setSemanaag($semana);
	$objag->setHoram($horario);
	$objag->setId($id);


	$agendf= new \App\dao\Agendamentosdao();

	$resultagd=$agendf->updateag($objag,$id);
	echo $resultagd;

}else{
	echo "Valores invalidos";
}

?>