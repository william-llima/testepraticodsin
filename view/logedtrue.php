<?php

if(!isset($_SESSION)){
	session_start();
}
if(!$_SESSION["loged"]){
	header("location:index.php");
	
}
if(isset($_GET["id"])){
	$idservice=$_GET["id"];	
}
if(isset($idservice)){
	$idservice;
	$iduser= $_SESSION["userid"];
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styleagend.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<nav>
		<?php
		require_once "nav.php";
		
		
		?>
	</nav>
<div id="containeragendamento">
	<div id="agendamentoleft">
		<ul>
			<li><button>Historico de agendamento</button></li>
			<li><button>Alterar agendamento</button></li>
		</ul>
		<div id="historicoagendamentos">
		</div>
		<div id="formulario de alteração">
		</div>
	</div>
	<div id="agendamentoright">
		<h2>Servico Selecionado</h2>
		<?php
			if(!isset($idservice)){
			echo "<h2>Nenhum Servico Selecionado</h2>";
}
		 ?>
		 <div id="cardag">
		 	<ul>
		 		<li class="descriptionli"><p></p></li>
		 		
		 		<li id="priceserviceli"><p></p></li>
		 		
		 		<li id="horarioserviceli"><p></p></li>
		 		
		 	</ul>
		 	<form id="formag">
		 		<input type="hidden" name="iduser" class="iduser" value="<?php if(isset($iduser)){echo $iduser; } ?>">
		 		<input type="hidden" name="idservice" id="idservice" value="<?php if(isset($idservice)){echo $idservice; } ?>">
		 		<label>Selecione uma Data em seguida um Horario Para verificação
		 		de disponibilidade</label><br/>
		 		<select name="selecthorario" id="selecthorario">
		 			<option value="">Selecione um horario</option>
		 		</select>
		 		<input type="date" name="dateag" id="dataagendam"><br/>
		 		<span id="alertastatushorario"></span><br/>
		 		<button id="buttonagd">Confirmar agendamento</button>
		 	</form>
		 </div>
	</div>

	<script src="assets/js/scriptagendamento.js">
	</script>
</div>
</body>
</html>