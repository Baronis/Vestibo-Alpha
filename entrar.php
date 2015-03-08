<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Plataforma de estudos para o Vestibular">
	    <link rel="icon" href="img/favicon.ico">
		<link href="css/alt-style.css" rel="stylesheet">
		<link href="css/button-style.css" rel="stylesheet">
		<link href="css/input-style.css" rel="stylesheet">
		<title>Vestibo: Entrar</title>
	</head>
	<body>
	<div class="page">
		<div class="header">
			<a href="http://vestibo.com.br/"><img src="img/nav-logo-blue.png" class="logo" alt="Vestibo"></a>
		</div>
		<div class="body">
			<form name="entrar" form method="POST" action="entrar.php">
				<div class="login-container">
					<?php
						if (version_compare(PHP_VERSION, '5.3.7', '<')) {
						    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
						} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
						    require_once('libraries/password_compatibility_library.php');
						}
						require_once('accounts/config/config.php');
						require_once('accounts/translations/pt_BR.php');
						require_once('accounts/libraries/PHPMailer.php');
						require_once('accounts/classes/Login.php');

						$login = new Login(); //IMPORTANT

						if ($login->isUserLoggedIn() == true) {
						    Header('Location: accounts/loading.php');
						} else {
						    if (isset($login)) {
						        if ($login->errors) {
						            foreach ($login->errors as $error) {
						                echo '<div class="msg-box">'.$error.'</div>';
						            }
						        }
						        if ($login->messages) {
						            foreach ($login->messages as $message) {
						                echo '<div class="msg-box">'.$message.'</div>';
						            }
						        }
						    }
						}
					?>
					<h1 style="color:#003A91; text-align: left;">Entrar</h1>
					<div class="form-group">
						<!--username--><input type="enail" name="user_name" class="form-control" id="login_input_username" 
	          			placeholder="Nome de usuário">
	        		</div>
	        		<div class="form-group">
	        			<!--Senha--><input type="password" class="form-control" name="user_password" id="login_input_password" placeholder="Senha">
	        		</div>
	        		<input type="hidden" name="asking" value="true">
	        		<input type="submit" class="btn btn-default" name="login" value="Entrar" />
	        		</input>
	        		<a class="btn btn-default" href="accounts/views/password_reset.php" 
	        		style="float:right;padding-right:12px;padding-top:8px;">Esqueci minha senha</a>
	        		<div class="box-footer">
	        			<div class="left">
							<a href="http://vestibo.com.br/termos.html">Termos e condições</a>
						</div>
						<div class="right">
							<a href="http://vestibo.com.br/quem-somos.html">Quem somos</a>
						</div>
						<div class="centered">
							<p>Vestibo &copy; 2014.</p>
						</div>
	        		</div>
				</div>
			</form>
		</div>
	</div>
	</body>
</html>