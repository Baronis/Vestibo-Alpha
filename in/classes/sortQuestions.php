<?php
$_SESSION['user_id'] = 1;
$sort = new sortQuestions(); // Utilize esta linha para chamar a classe!

class sortQuestions {

	private $conn = null;
	public $content = array();

	public function __construct() {

		if($this->databaseConnection()) {
			if(!isset($_GET['nQ'])) {die("Quantas questoes?");}
			$nQ = $_GET['nQ'];
			if(!isset($_GET['perf'])) {
				$prod = $this->sortByRandom($nQ);
			} else {
				$prod = $this->sortByPerformace($nQ);
			}
			$this->conn->close();
			var_dump($prod);
		} else {
			echo "Problema ao acessar o Banco de Dados!";
		}
	}

	private function databaseConnection() {
		$this->conn = new mysqli('localhost', 'root', 'admpass', 'ves');
		if ($this->conn->connect_error) {
			echo "ERROR_DB";
			return false;
		} else {
			return true;
		}
	}

	private function sortByRandom($nQ) {

		$stmt = $this->conn->prepare('SELECT q_content FROM questions;');
		$stmt->execute();
		$stmt->bind_result($id);
		while ($row = $stmt->fetch()) {
			$res[] = $id;
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

	private function sortByPerformace($nQ) {

		$stmt = $this->conn->prepare('SELECT sub_id FROM perf WHERE user_id = ?;');
		$stmt->bind_param("s", $_SESSION['user_id']);
		$stmt->execute();
		$stmt->bind_result($sub);
		while ($row = $stmt->fetch()) {
			$subArray[] = $sub;
	    }
	    $stmt->close();
	    $stmt = null;
	    $stmt = $this->conn->prepare('SELECT q_content FROM questions WHERE q_sub_2_id IN ('.implode(", ", $subArray).') LIMIT '.$nQ.';');
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
		shuffle($res);
		return $res;
	}
} ?>