<?php
// Sorteador de Questões PARCIALMENTE TESTADO (r4)
class sortQuestions {
	// Variável que armazena a conexão
	private $conn 	= null;
	public $prod 	= null;
	// Esta função é iniciada junto com a classe
	public function __construct() {
		if($this->databaseConnection()) {
			if(!isset($_POST['nQ'])) {die(ERROR_GET_NUMBER);}
			$nQ = $_POST['nQ'];

			if(isset($_POST['sub'])){
				$this->prod = $this->sortBySubject($nQ);
			} else {
				$stmt = $this->conn->prepare('SELECT sub_id FROM perf WHERE user_id = ?;');
				$stmt->bindValue(1, $_SESSION['user_id']);
				$stmt->execute();
				$rows = $stmt->fetchAll();
			    if(count($rows) == 0){
			    	$this->prod = $this->sortByRandom($nQ);
				} else {
					$this->prod = $this->sortByPerformace($nQ, $subArray);
				}
			}
			if($this->prod) {
				$this->showQuestions();
				//unset($_SESSION['curTask']);
			}
		} else {
			echo ERROR_DB;
		}
	}

	// Realiza a conexão com o Banco de Dados
	private function databaseConnection() {
		if ($this->conn != null) {
            return true;
        } else {
            try {
                $this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
                return true;
            } catch (PDOException $e) {
                die (ERROR_DB_CONN);
                return false;
            }
        }
	}

	// Sorteia questôes caso o usuário não possua histórico de seu desempenho
	private function sortByRandom($nQ) {
		$stmt = $this->conn->prepare('SELECT q_content FROM questions;');
		$stmt->execute();
		$rows = $stmt->fetchAll();
	    if ($nQ > count($rows)) {
	    	echo WARNING_QUESTIONS_EXCEPTION;
	    }
	    shuffle($rows);
	    for ($i=0; $i < $nQ ; $i++) {
	    	$prod[] = $rows[$i];
	    }
	    return $prod;
	}

	// Sorteia questões baseando-se no histórico de desempenho do usuário
	private function sortByPerformace($nQ, $subArray) {
	    $stmt = $this->conn->prepare('SELECT q_content FROM questions WHERE q_sub_2_id IN ('.implode(", ", $subArray).');');
	   	$stmt->execute();
	   	$rows = $stmt->fetchAll();
		if ($nQ > count($rows)) {
	    	echo WARNING_QUESTIONS_EXCEPTION;
	    }
	    shuffle($rows);
	    for ($i=0; $i < $nQ; $i++) { 
	    	$fRes[] = $rows[$i];
	    }
		return $fRes;
	}

	// Sorteia questões a partir de uma matéria específica
	private function sortBySubject($nQ) {
		$sub = (int) $_POST['sub'];
		$nQ = (int) $nQ;
	    $stmt = $this->conn->prepare('SELECT * FROM questions WHERE q_sub_2_id = ?;');
	    $stmt->bindValue(1, $sub);
	   	$stmt->execute();
		$result = $stmt->fetchAll();
		if ($nQ > count($result)) {
	    	echo WARNING_QUESTIONS_EXCEPTION;
	    }
	    for ($i=0; $i < $nQ; $i++) { 
	    	$fRes[] = $result[$i];
	    }
		shuffle($fRes);
		return $fRes;
	}

	// Adiciona as questões buscadas à página
	private function showQuestions() {
		$x = count($this->prod);
		$output = '	<div class="simple-container">
						<div class="content">
							<form action="index?page=2" method="post">';
		for ($i=0; $i < $x; $i++) {
			$a = $this->prod[$i];
			$output .= '<div class="q-box">
							<div class="q-top-box">
								<div class="top">
									<p> '.$a[1].' - '.$a[2].' ('.$a[3].')</p><hr>
									<p>'.$a[4].'</p>	
								</div>
							</div>
							<div class="q-alt-box">
								<div class="alt">
									<input value="1" type="radio" id="'.$a[0].'" name="'.$a[3].'"></input><label for="'.$a[0].'">'.$a[5].'</label>
									<input value="2" type="radio" id="'.$a[0].'" name="'.$a[3].'"></input><label for="'.$a[0].'">'.$a[6].'</label>
									<input value="3" type="radio" id="'.$a[0].'" name="'.$a[3].'"></input><label for="'.$a[0].'">'.$a[7].'</label>
									<input value="4" type="radio" id="'.$a[0].'" name="'.$a[3].'"></input><label for="'.$a[0].'">'.$a[8].'</label>
									<input value="5" type="radio" id="'.$a[0].'" name="'.$a[3].'"></input><label for="'.$a[0].'">'.$a[9].'</label>
								</div>
							</div>';
			if(!empty($a[12])) {
				$output .= '<div class="q-top-box">
								<div class="top">
									<p>'.$a[12].'</p>
								</div>
							</div>
						</div>';
			} else {
				$output .= '</div>';
			}
		}
		$output .= '<input type="submit">
				</form>
			</div>
		</div>';
		echo $output;
	}
}
?>