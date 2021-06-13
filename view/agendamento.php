<?php
if(!isset($_SESSION)){
	session_start();
}
if(!isset($_SESSION["loged"])){

	require_once "logedfalse.php";
	
}else{
	require_once "logedtrue.php";
}	


?>