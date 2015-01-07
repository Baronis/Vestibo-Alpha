<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Plataforma de estudos para o Vestibular">
	    <link rel="icon" href="../img/favicon.ico">
		<link href="../css/global-style.css" rel="stylesheet">
		<link href="../css/button-style.css" rel="stylesheet">
		<link href="../css/imput-style.css" rel="stylesheet">
		<link href="../css/question-style.css" rel="stylesheet">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="js/menu.js"></script>
		<title>Vestibo</title>
	</head>
	<body>
		<div class="page">
			<div class="header">
				<div class="header-left">
					<a onclick="open_close_menu()" href="#" class="header-item"><img src="in_img/menu-blue.png" class="menu-anchor" alt="Vestibo"></a>
					<a href="http://vestibo.com.br/" class="header-item"><img src="../img/nav-logo-blue.png" class="logo" alt="Vestibo"/></a>
				</div>
				<div class="header-right">
					<?php //echo ('<a>'.$_SESSION['user_name'].'</a>'); ?>
					<a onclick="open_close_user_menu()" href="#" class="header-item"><img class="user-anchor" src="../img/user-image.png" alt="1"/></a>
				</div>
			</div>
			<?php require_once("pvt/menu.php"); ?>
			<div class="body">
				<?php switch ($_GET['page']) {
						case '0': require_once("pvt/0.php"); break;
						case '1': require_once("pvt/1.php"); break;
						case '2': require_once("pvt/2.php"); break;
						case '3': require_once("pvt/3.php"); break;
						case '4': require_once("pvt/4.php"); break;
						case '5': require_once("pvt/5.php"); break;
						default: require_once("pvt/0.php"); break;} ?>
				<div class="simple-container">
					<div class="content">
						<div class="q-box">
							<div class="q-top-box">
								<div class="top">
									<p>Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box </p>	
								</div>
							</div>
							<div class="q-alt-box">
								<div class="alt">
									<p>Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box </p>	
								</div>
							</div>
							<div class="q-top-box">
								<div class="top">
									<p>Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box Tesste Q-Box </p>	
								</div>
							</div>
						</div>
						<div class="q-box">
							<div class="q-top-box">
								<div class="top">
									<p>UNESP - 2014 (01)</p><hr>
									<p>Esta é uma questão teste. Estão corretas:</p>	
								</div>
							</div>
							<div class="q-alt-box">
								<div class="alt">
									<input type="radio" id="a1" name="01"></input><label for="a1">Apenas I e IV estão corretas.</label>
									<input type="radio" id="a2" name="01"></input><label for="a2">Apenas I e V estão corretas.</label>
									<input type="radio" id="a3" name="01"></input><label for="a3">Apenas I e II estão corretas.</label>
									<input type="radio" id="a4" name="01"></input><label for="a4">Apenas I, IV e V estão corretas.</label>
									<input type="radio" id="a5" name="01"></input><label for="a5">Todas estão corretas.</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="f-left">
						Vestibo &copy; 2014.
					</div>
					<div class="f-right">
						<a href="http://vestibo.com.br/termos">Termos e condições</a>
						<a href="http://vestibo.com.br/quem-somos">Quem somos</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>