<?php
// PAGE 1: Matérias
?>
<div class="simple-container">
	<div class="content">
		<div class="q-box">
			<div class="q-top-box">
				<div class="top">
					<p>Foto de perfil<a style="float: right;" href="#">Alterar</a></p>
				</div>
			</div>
			<?php if(!$_SESSION['fb']){
				echo '<div class="q-alt-box">
				<div class="alt">
					<p>Cadastro<a style="float: right;" href="#">Alterar</a></p>
				</div>
			</div>
			<div class="q-top-box">
				<div class="top">
					<p>Senha<a style="float: right;" href="#">Alterar</a></p>
				</div>
			</div>';} ?>
		</div>
	</div>
</div>