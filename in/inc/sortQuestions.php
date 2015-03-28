<?php
$_SESSION['user_id'] = 1; // Temporário
// $sort = new sortQuestions(); Utilize esta linha para chamar a classe!

// Sorteador de Questões NAO TESTADO (r2)
class sortQuestions {

	// Variável que armazena a conexão
	private $conn = null;
	// Esta função é iniciada junto com a classe
	public function __construct() {
		if($this->databaseConnection()) {
			if(!isset($_GET['nQ'])) {die("Quantas questoes?");}
			$nQ = $_GET['nQ'];

			if(isset($_POST['subject'])){
				$prod = sortBySubject($nQ);
			}

			$stmt = $this->conn->prepare('SELECT sub_id FROM perf WHERE user_id = ?;');
			$stmt->bind_param("s", $_SESSION['user_id']);
			$stmt->execute();
			$stmt->bind_result($sub);
			while ($row = $stmt->fetch()) {
				$subArray[] = $sub;
		    }
		    $stmt->close();
		    if(count($subArray) == 0){
		    	$prod = $this->sortByRandom($nQ);
			} else {
				$prod = $this->sortByPerformace($nQ, $subArray);
			}
			$this->conn->close();
			// Continuar daki! <---
			var_dump($prod);
		} else {
			echo "Problema ao acessar o Banco de Dados!";
		}
	}

	// Realiza a conexão com o Banco de Dados
	private function databaseConnection() {

		$this->conn = new mysqli('localhost', 'root', 'admpass', 'ves');
		if ($this->conn->connect_error) {
			echo "ERROR_DB";
			return false;
		} else {
			return true;
		}
	}

	// Sorteia questôes caso o usuário não possua histórico de seu desempenho
	private function sortByRandom($nQ) {

		$stmt = $this->conn->prepare('SELECT q_content FROM questions;');
		$stmt->execute();
		$stmt->bind_result($content);
		while ($row = $stmt->fetch()) {
			$res[] = $content;
	    }
	    $stmt->close();
	    if ($nQ > count($res)) {
	    	echo "<b>Aviso: Numero de questoes pedidas excede o numero de questoes disponiveis no servidor!</b><br>";
	    }
	    shuffle($res);
	    for ($i=0; $i < $nQ ; $i++) {
	    	$prod[] = $res[$i];
	    }
	    return $prod;
	}

	// Sorteia questões baseando-se no histórico de desempenho do usuário
	private function sortByPerformace($nQ, $subArray) {
	    $stmt = $this->conn->prepare('SELECT q_content FROM questions WHERE q_sub_2_id IN ('.implode(", ", $subArray).');');
	   	$stmt->execute();
		$stmt->bind_result($content);
		$row = null;
		while ($row = $stmt->fetch()) {
			$res[] = $content;
		}
		$stmt->close();
		if ($nQ > count($res)) {
	    	echo "<b>Aviso: Numero de questoes pedidas excede o numero de questoes disponiveis no servidor!</b><br>";
	    }
	    $n = $nQ - 1;
	    for ($i=0; $i < $n; $i++) { 
	    	$fRes[] = $res[$i];
	    }
		shuffle($fRes);
		return $fRes;
	}

	// Sorteia questões a partir de uma matéria específica
	private function sortBySubject($nQ) {
	    $stmt = $this->conn->prepare('SELECT q_content FROM questions WHERE q_sub_2_id = ?;');
	    $stmt->bind_param("s", $_POST['subject']);
	   	$stmt->execute();
		$stmt->bind_result($content);
		while ($row = $stmt->fetch()) {
			$res[] = $content;
		}
		$stmt->close();
		if ($nQ > count($res)) {
	    	echo "<b>Aviso: Numero de questoes pedidas excede o numero de questoes disponiveis no servidor!</b><br>";
	    }
	    $n = $nQ - 1;
	    for ($i=0; $i < $n; $i++) { 
	    	$fRes[] = $res[$i];
	    }
		shuffle($fRes);
		return $fRes;
	}
}
?>