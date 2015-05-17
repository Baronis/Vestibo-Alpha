<?php
	// Variaáveis de armazenamento pós-correção
	private $correctAnswers = new Array();
	private $incorrectAnswers = new Array();
	private $correctionString = null;
	// Mostra o resultado do formulário
	public function printResult() {
		$htmlString = '
			<div class="simple-container">
				<div class="content">
					<h1 style="color: #003A91;">Resultado</h1>
					<div class="q-box">
						<div class="q-top-box">
							<div class="top">
								<p>Pontuação:<h2 style="float: right;">'. (count($this->correctAnswers)*100)/count($_SESSION['prod']) .'%</h2></p>
							</div>
						</div>
						<div class="q-alt-box">
							<div class="alt">
								<p>Acertos: <h2 style="float: right;">'.count($this->correctAnswers).'</h2></p>
								<p>Erros: : <h2 style="float: right;">'.count($this->incorrectAnswers).'</h2></p>
							</div>
						</div>
						<div class="q-top-box">
							<div class="top">
								<a style="float: right;" href="javascript:{}" onclick="showIncorrectQuestions();">Clique aqui para visualizar as questões incorretas!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	}
?>
<script>
	function showIncorrectQuestions() {
		if (document.getElementById("incorrectAnswersWrapper").style.visibility == "hidden") {
			document.getElementById("incorrectAnswersWrapper").style.visibility = "visible";
			document.getElementById("incorrectAnswersWrapper").style.display = "block";
		} else {
			document.getElementById("incorrectAnswersWrapper").style.visibility = "hidden";
			document.getElementById("incorrectAnswersWrapper").style.display = "none";
		}
	}
</script>