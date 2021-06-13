<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}

 

$services= new \App\dao\Servicesdao();
echo $services->listServices();

?>