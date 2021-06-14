<?php

if(!isset($_SESSION)){
	session_start();
}



if(isset($_GET["logout"])){
	session_destroy();
}


?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<div id="body2">
		<nav>
			<?php require_once "view/nav.php";?>
		</nav>
		<section>
			<div id="box_categoria1">
				<div id="img_categoria1">
				</div>
				<div id="section">
					<div class="cardsection" >
							<p class="description_service_card">teste</p>
						<div class="divdescriptioncard">
							<p class="price_service_card">teste</p>
							<p class="horarioest_service_card">teste</p>
						</div>
						<a class="linkagendamento">
							<div class="iconemore">
							</div>
						</a>
					</div>
				</div>
			</div>
			<div id="box_categoria2">
				<div id="img_categoria2">
				</div>
				<div id="section2">
					<div class="cardsection2" >
							<p class="description_service_card">teste</p>
						<div class="divdescriptioncard">
							<p class="price_service_card">teste</p>
							<p class="horarioest_service_card">teste</p>
						</div>
						<a class="linkagendamento">
							<div class="iconemore2">
							</div>
						</a>
					</div>
				</div>
			</div>
			<div id="box_categoria3">
				<div id="img_categoria3">
				</div>
				<div id="section3">
					<div class="cardsection3" >
							<p class="description_service_card">teste</p>
						<div class="divdescriptioncard">
							<p class="price_service_card">teste</p>
							<p class="horarioest_service_card">teste</p>
						</div>
						<a class="linkagendamento">
							<div class="iconemore3">
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<?php  require_once "view/footer.php" ?>
		</footer>
	<div>
		<script src="view/assets/js/script.js">
		</script>
</body>
</html>