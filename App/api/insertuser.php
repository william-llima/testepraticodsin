<?php
require_once "../../vendor/autoload.php";
if(!isset($_SESSION)){
	session_start();
}





$data= file_get_contents("php://input");
$datautf8=utf8_encode($data);
$dataj=json_decode(utf8_decode($datautf8));

$nome= filter_var($dataj->nome,FILTER_SANITIZE_EMAIL);
$email= filter_var($dataj->email,FILTER_SANITIZE_EMAIL);
$telefone= filter_var($dataj->telefone,FILTER_SANITIZE_EMAIL);
$cpf= filter_var($dataj->cpf,FILTER_SANITIZE_EMAIL);
$senha= md5(filter_var($dataj->senha,FILTER_SANITIZE_SPECIAL_CHARS));

if(!empty(trim($nome))&&
   !empty(trim($email))&&
   !empty(trim($telefone))&&
   !empty(trim($cpf))&&
   !empty(trim($senha))){




$user = new \App\dao\Clientes();
$user->setNome($nome);
$user->setEmail($email);
$user->setTelefone($telefone);
$user->setCpf($cpf);
$user->setSenha($senha);


$verify= new \App\dao\Clientedao();

$resultverify=$verify->verifyRegister($email);

if($resultverify==200){
	die("Usuario Ja cadastrado");
}
$result= $verify->cadcliente($user);
if($result==200){
	echo "insert200";
}else{
	echo "erro";
}

}else{
	die("Campos vazios nao permitidos");
}

?>