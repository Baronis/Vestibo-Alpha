<?php
	switch ($_GET['page']) {
		case '0':
			echo '	<li class="active"><a href="?page=0">início</a></li>
					<li><a href="?page=1">matérias</a></li>
					<li><a href="?page=2">exercícios</a></li>
					<li><a href="?page=3">simulados</a></li>
					<li><a href="?page=4">desafios</a></li>
					<li><a href="?page=5">ajustes</a></li>'; break;
		case '1':
			echo '	<li><a href="?page=0">início</a></li>
					<li class="active"><a href="?page=1">matérias</a></li>
					<li><a href="?page=2">exercícios</a></li>
					<li><a href="?page=3">simulados</a></li>
					<li><a href="?page=4">desafios</a></li>
					<li><a href="?page=5">ajustes</a></li>'; break;
		case '2':
			echo '	<li><a href="?page=0">início</a></li>
					<li><a href="?page=1">matérias</a></li>
					<li class="active"><a href="?page=2">exercícios</a></li>
					<li><a href="?page=3">simulados</a></li>
					<li><a href="?page=4">desafios</a></li>
					<li><a href="?page=5">ajustes</a></li>'; break;
		case '3':
			echo '	<li><a href="?page=0">início</a></li>
					<li><a href="?page=1">matérias</a></li>
					<li><a href="?page=2">exercícios</a></li>
					<li class="active"><a href="?page=3">simulados</a></li>
					<li><a href="?page=4">desafios</a></li>
					<li><a href="?page=5">ajustes</a></li>'; break;
		case '4':
			echo '	<li><a href="?page=0">início</a></li>
					<li><a href="?page=1">matérias</a></li>
					<li><a href="?page=2">exercícios</a></li>
					<li><a href="?page=3">simulados</a></li>
					<li class="active"><a href="?page=4">desafios</a></li>
					<li><a href="?page=5">ajustes</a></li>'; break;
		case '5':
			echo '	<li><a href="?page=0">início</a></li>
					<li><a href="?page=1">matérias</a></li>
					<li><a href="?page=2">exercícios</a></li>
					<li><a href="?page=3">simulados</a></li>
					<li><a href="?page=4">desafios</a></li>
					<li class="active"><a href="?page=5">ajustes</a></li>'; break;
		default: header("location:?page=0"); break;}
?>