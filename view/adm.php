<?php
if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION["ADM"])){
	header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>
	<style>
		ul{
			list-style: none;
		}
	</style>
</head>
<body>

	<h1>Agendamentos</h1>
		<div id="historicoagendamentos">
			<ul class="list_agendados">
				<li class=textag11></li>
				<li class=textag21></li>
				<li class=textag1></li>
				<li class=textag2></li>
				<li class=textag3></li>
				<li class=textag5></li>
				
			</ul>
		</div>
<script src="assets/js/scriptadm.js">
</script>
</body>
</html>