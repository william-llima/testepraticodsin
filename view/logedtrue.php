<?php

if(!isset($_SESSION)){
	session_start();
}
if(!$_SESSION["loged"]){
	header("location:../index.php");
	
}
if(isset($_GET["id"])){
	$idservice=$_GET["id"];	
}

$iduser= $_SESSION["userid"];
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
		<h2>Agendamentos</h2>
		<div id="historicoagendamentos">
			<ul class="list_agendados">
				<li class=textag1></li>
				<li class=textag2></li>
				<li class=textag3></li>
				<li class=textag5></li>
				<li class=textag4><input type="submit" class="inptalt" value="Editar"></li>
			</ul>
		</div>
		<div id="formulario_de_alteracao">
			<form>
				<select name="selectupdate" id="idserviceupdate"> 
				<option value="">Selecione um servico</option>
				</select><br/>
				<input type="date" name="dateupdate" id="dateupdate"><br/>
				<select name="updatehora" id="horaupdate">
				<option value="" >Selecione um horario</option>
				 </select><br/>
				
				<button id="updatebtn">Atualizar</button>
				<button id="cancelupdate">Cancelar</button>
			</form>
			<span id="feedupdate">Agendamento ok</span>
		</div>
	</div>
	<div id="agendamentoright">
		<h2>Serviço Selecionado</h2>
		<?php
			if(!isset($idservice)){
			echo "<h2>Nenhum Serviço Selecionado</h2>";
}
		 ?>
		 <div id="cardag">
		 	<ul>
		 		<li class="descriptionli"><p></p></li>
		 		
		 		<li id="priceserviceli"><p></p></li>
		 		
		 		<li id="horarioserviceli"><p></p></li>
		 		
		 	</ul>
		 	<form id="formag">
		 		<input type="hidden" name="iduser" id="iduser" value="<?php if(isset($iduser)){echo $iduser; } ?>">
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