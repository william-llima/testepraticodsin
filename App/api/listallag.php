<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}

if(!$_SESSION["ADM"]){
	header("location:../../index.php");
}

$allag= new \App\dao\Agendamentosdao();

echo $allag->ListallAg();

?>