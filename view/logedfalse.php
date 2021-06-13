<?php
if(!isset($_SESSION)){
	session_start();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<title>Document</title>
	<style>
		#container{
			width:100vw;
			display:flex;
			justify-content: center;
		}
		#signalalert{
			width:200px;
			height:300px;
			background-image: url("assets/img/chao-molhado.svg");
			background-size: contain;
			background-repeat: no-repeat;
		}
		#textalert{
			width:60%;
		}

	</style>
</head>
<body>
	<nav>
		<?php
		require_once "nav.php";
		?>
	</nav>
	<div id="container">
		<div id="signalalert">
		</div>
		<div id="textalert">
			<h1>Voce precisa estar logado no sistema para acessar a area de agendamentos</h1>
		</div>
	</div>
</body>
</html>