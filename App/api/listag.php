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
	if($robj->horariomarcado==$hora){
	die("500");
	}else if($robj->horariomarcado=="8:00" && $robj->typeid != "1" && $robj->typeid != "2" && $robj->typeid != "3"){
		$horal= str_replace(":","",$hora);
		$horaml=srt_replace(":","",$robj->horariomarcado);
		if($horal < $horaml+200 ){
			die("500");
		}
	}
	else if($robj->horariomarcado=="10:00" && $robj->typeid != "1" && $robj->typeid != "2" && $robj->typeid != "3"){
		$horal= str_replace(":","",$hora);
		$horaml=srt_replace(":","",$robj->horariomarcado);
		if($horal < $horaml+200 ){
			die("500");
		}
	}
	else if($robj->horariomarcado=="12:00" && $robj->typeid != "1" && $robj->typeid != "2" && $robj->typeid != "3"){
		$horal= str_replace(":","",$hora);
		$horaml=srt_replace(":","",$robj->horariomarcado);
		if($horal < $horaml+200 ){
			die("500");
		}
	}else if($robj->horariomarcado=="14:00" && $robj->typeid != "1" && $robj->typeid != "2" && $robj->typeid != "3"){
		$horal= str_replace(":","",$hora);
		$horaml=srt_replace(":","",$robj->horariomarcado);
		if($horal < $horaml+200 ){
			die("500");
		}
	}else if($robj->horariomarcado=="16:00" && $robj->typeid != "1" && $robj->typeid != "2" && $robj->typeid != "3"){
		$horal= str_replace(":","",$hora);
		$horaml=srt_replace(":","",$robj->horariomarcado);
		if($horal < $horaml+200 ){
			die("500");
		}
	}else if($types == "2"){
		$horal= str_replace(":","",$hora);
		$horaml=str_replace(":","",$robj->horariomarcado);
		if($horaml > $horal){
			die("500");
		}
	}	

}
echo "200";














?>