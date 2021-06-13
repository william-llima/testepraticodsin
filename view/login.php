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
	<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<nav>
		<?php require_once "nav.php"; ?>
	</nav>
	
	<div id="sectionlogin">
		<div id="formlogindiv">
				<h2>Formulario de Login</h2>
			<form id="formlogin" >
				
				<div>
					<label>Email</label>
					<input type="Email" id="emaillogin" nome="email" placeholder="Email" required>
				</div>
				<div>
					<label>Password</label>
					<input type="password" id="senhalogin" nome="password" placeholder="password" required>
				</div>
				<div class="divbuttonlogin">
				<button id="loginbtn">Login</button>
				</div>
			</form>
		</div>
		<div id="formregisterdiv">
		
			<form id="formregister">
						<h2>Formulario de Cadastro</h2>
					<div>
					<label>Nome</label>
					<input type="text" nome="name" placeholder="Name">
				</div>
				<div>
					<label>Email</label>
					<input type="email" nome="email" placeholder="Email">
				</div>
				<div>
					<label>Telefone</label>
					<input type="text" nome="telefone" placeholder="Telefone">
				</div>
				<div>
					<label>Cpf</label>
					<input type="text" nome="cpf" placeholder="cpf">
				</div>
				<div>
					<label>Password</label>
					<input type="password" nome="email" placeholder="password">
				</div>
				<div class="divbuttonlogin">
				<button id="registerbtn">Registrar</button>
				</div>
			</form>
		</div>
		<span id="alertas">
		Alertas
	</span>
	</div>	
	
	
	<script src="assets/js/scriptlogin.js">
	</script>
</body>
</html>