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
		<script src="js/popup.js"></script>
		<title>Vestibo</title>
	</head>
	<body>
		<div class="page">
			<div class="header">
				<div class="header-left">
					<a onclick="toggle_menu()" href="#" class="header-item"><img src="in_img/menu-blue.png" class="menu-anchor" alt="Vestibo"></a>
					<a href="http://vestibo.com.br/" class="header-item"><img src="../img/nav-logo-blue.png" class="logo" alt="Vestibo"/></a>
				</div>
				<div class="header-right">
					<a onclick="toggle_user_menu()" href="#" class="header-item"><img class="user-anchor" src="../img/user-image.png" alt="1"/></a>
				</div>
			</div>
			<?php require_once("inc/menu.php"); ?>
			<div id="u" class="user-esc">
				<div class="user-container">
					<p><?php echo ('<a>'.$_SESSION['user_name'].'</a>'); ?></p>
					<a href="?page=4">Perfil</a>
					<a href="?page=5">Sair</a>
				</div>
			</div>
			<div class="body">
				<?php switch ($_GET['page']) {
						case '0': require_once("pvt/0.php"); break;
						case '1': require_once("pvt/1.php"); break;
						case '2': require_once("pvt/2.php"); break;
						case '3': require_once("pvt/3.php"); break;
						case '4': require_once("pvt/4.php"); break;
						case '5': require_once("pvt/5.php"); break;
						default: require_once("pvt/0.php"); break;} ?>
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
	</body>
</html>