<?php

		$sub = null;
		$db_connection = null;
		$questionsDemand = 10;
		// recebe as matérias com dificuldade pelo array $sub
		// recebe o numero de questões pedidas pela variável $num
		$db = new mysqli('localhost', 'root', 'admpass', 'ves');
   		if(!$db) die ('error');

		if($sub == null){
        	$query_user = $db->query('SELECT id, numQuestions FROM vestibulares;');
			while($row = $query_user->fetch_assoc()) {
    			$questionsLimit[] = $row['numQuestions'];
    		}
    		$numberOfTests = count($questionsLimit);

    		for ($i=1; $i <= $questionsDemand ; $i++) { 
    			//todo
    		}
		} else {
			//sortByNeeds($sub, $num);
		}
?>