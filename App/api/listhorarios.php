<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}
 

$horarios= new \App\dao\Agendamentosdao();

echo $horarios->listHorarios();
?>