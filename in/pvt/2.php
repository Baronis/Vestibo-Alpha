<?php
// PAGE 2: Exercícios
if (isset($_SESSION['curTask'])):

//TO DO Continuar teste gerado! ===

else if(!isset($_SESSION['curTask']) && !isset($_POST['sub'])): ?>
<div id="popup">
	<div class="popup-box">
		<div class="popup-box-content">
			<h1>Não se esqueça!</h1>
			<img style="padding: 5px; width: 30%; height: 30%;" src="../img/paper-pen.png">
			<p class="lead">Tenha em mãos papel e caneta para a resolução dos exercícios.</p>
			<a href="javascript:void(0)" onclick="open_close_popup();" class="btn btn-lg btn-default">Prosseguir</a>
		</div>
	</div>
</div>
<div class="simple-container">
	<div class="content">
		<h1 style="color: #003A91;">Escolha uma matéria para começar</h1>
		<div class="q-box">
			<div class="q-top-box">
				<div class="top">
					<form id="por" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="por">
					<p>Português<a style="float: right;" href="javascript:{}" onclick="document.getElementById('por').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-alt-box">
				<div class="alt">
					<form id="mat" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="mat">
					<p>Matemática<a style="float: right;" href="javascript:{}" onclick="document.getElementById('mat').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-top-box">
				<div class="top">
					<form id="his" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="his">
					<p>História<a style="float: right;" href="javascript:{}" onclick="document.getElementById('his').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-alt-box">
				<div class="alt">
					<form id="geo" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="geo">
					<p>Geografia<a style="float: right;" href="javascript:{}" onclick="document.getElementById('geo').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-top-box">
				<div class="top">
					<form id="qui" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="qui">
					<p>Química<a style="float: right;" href="javascript:{}" onclick="document.getElementById('qui').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-alt-box">
				<div class="alt">
					<form id="fis" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="fis">
					<p>Física<a style="float: right;" href="javascript:{}" onclick="document.getElementById('fis').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-top-box">
				<div class="top">
					<form id="bio" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="bio">
					<p>Biologia<a style="float: right;" href="javascript:{}" onclick="document.getElementById('bio').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
			<div class="q-alt-box">
				<div class="alt">
					<form id="ing" method="post" action="index?page=2">
					<input type="hidden" name="sub" value="ing">
					<p>Inglês<a style="float: right;" href="javascript:{}" onclick="document.getElementById('ing').submit(); return false;">Começar!</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
else if(!isset($_SESSION['curTask']) && isset($_POST['sub'])):
	$v = $_SESSION['user_name'].time();
	$_SESSION['curTask'] = sha1($v);
	require('inc/defines.php');
	require('inc/sortQuestions.php');
	$sort = new sortQuestions();
	var_dump($sort->prod); //Temporário
else: ?>
<div class="simple-container">
	<div class="content">
		<h1 style="color: #003A91;">Por favor, informe o erro #P2L99 ao desenvolvedor!</h1>
	</div>
</div>
<?php
endif;
?>