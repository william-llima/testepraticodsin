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
$types=filter_var($dataandhj->types,FILTER_SANITIZE_SPECIAL_CHARS);


$horarios= new \App\dao\Agendamentosdao();

$datar=str_replace("/","",$data);

if(empty(trim($datar)) || empty(trim($datar)) ){
	die("Erro");
}

$result=$horarios->verifyAgendamento(trim($datar));

if($result=="200"){
	
	die("200");
}

$resultobj=json_decode($result);



foreach($resultobj as $robj){
	if($robj->horariomarcado==$hora)die("500");
	if($robj->clientid==$_SESSION["userid"]){
			if(!isset($trq)){
				echo "1";	
			}
			
			$trq="teste";
		}	

		$horan= str_replace(":","",$hora);
		$horanm= str_replace(":","",$robj->horariomarcado);
		if($robj->typeid > 3 ){
			if($horan > $horanm){
				if($horan-200 < $horanm){
					die("500");
				}
			}
		}

		if($types != "1"){
			if($horan < $horanm){
				if($horan+200 > $horanm){
					die("500");
				}	
			}
			
		}

}
echo "200";














?>