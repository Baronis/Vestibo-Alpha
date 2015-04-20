<?php
	class FormBehaviour {
		private $conn = null;

		public function __construct() {
			if(isset($_POST['id_question']) && isset($_POST['item_selected']) && isset($_POST['pagina'])) {
				if($_Session['cf']) {
					$Pag=$_POST['pagina'];
					$idques=$_POST['id_question'];
					$itemselec=$_POST['item_selected'];
					$this->correcao($idques, $itemselec);
					//tem q mexe com data, mas é a ultima coisa a ver aqui
					//no caso das pag vai armazenando e quando chega na ultima grava q acabo pra iniciar outra
					//quando coloca no hostinger libera os if da sessao
				}
				else {
					die("sem sessao cf");
				}
			} else {
				echo "ERRO DO POST";
			}
		}

		//corrige a prova
		public function correcao($questao, $resposta) {
			$q = explode(",", $questao);
			$r = explode(",", $resposta);
			if($this->databaseConnection()) {
				$stmt = $this->conn->prepare('SELECT res FROM questions WHERE id IN ('.implode(", ", $q).');');
				$stmt->execute();
				$rows = $stmt->fetchAll();
				$z=count($r)-1;
				$row=$this->orgaseq($rows,$q);
				for($i=0; $i<=$z; $i++) {
					if(empty($r[$i])) {
						$fqX[$i] = $q[$i]."X";
						echo $fqX[$i]."<br/>";
					} else {
						if ($row[$i] == $r[$i]) {
							$fqC[$i] = $q[$i]."C";
							echo $fqC[$i]."<br/>";
						} elseif ($row[$i] != $r[$i]) {
							$fqE[$i] = $q[$i]."E";
							echo $fqE[$i]."<br/>";
						} else {
							echo "erro na correcao<br/>";
						}
					}
				}
				if (!empty($fqX)) {	$Xcorecao = implode(";", $fqX); } else {$Xcorecao="";}
				if (!empty($fqC)) {	$Ccorecao = implode(";", $fqC); } else {$Ccorecao="";}
				if (!empty($fqE)) {	$Ecorecao = implode(";", $fqE); } else {$Ecorecao="";}
				echo $Xcorecao.$Ccorecao.$Ecorecao;
			}
		}

		//coloca a sequencia correta
		public function orgaseq($ro,$ques) {
			$sq = $ques;
			sort($sq);
			$z=count($ques);
			$p=count($ro);

			for($i=0;$i<$z;$i++) {
				for($i2=0;$i2<$z;$i2++) {
					if($ques[$i2] == $sq[$i]){ $qs[$i2]=$ro[$i]['res'];}
				}
			}
			return $qs;
		}

		private function databaseConnection() {
			if ($this->conn != null) {
	            return true;
	        } else {
	            try {
	                $this->conn = new PDO('mysql:host=127.0.0.1;dbname=u395938104_1;charset=utf8', 'root', '');//depois de termina taca new PDO('mysql:host=mysql.hostinger.com.br;dbname=u395938104_1;charset=utf8', 'u395938104_adm', 'admpass');
	                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                return true;
	            } catch (PDOException $e) {
	                die ('ERROR_DB_CONN');
	                return false;
	            }
	        }
		}
	}
?>