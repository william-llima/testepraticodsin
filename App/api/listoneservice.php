<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}
$data= file_get_contents("php://input");
$datautf8=utf8_encode($data);
$dataj=json_decode(utf8_decode($datautf8));
$id=intval(filter_var($dataj->id,FILTER_SANITIZE_SPECIAL_CHARS));

$services= new \App\dao\Servicesdao();

echo $services->verifyService($id);

?>