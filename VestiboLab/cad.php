<?php
	echo('<meta charset="utf-8">');
	include_once("bd.php");
	$vestibular = $_POST ['vestibular'];
	$ano = $_POST ['ano'];
	$num = $_POST ['num'];
	$texto1 = $_POST ['texto1'];
	$texto2 = $_POST ['texto2'];
	$texto3 = $_POST ['texto3'];
	$img1 = $_FILES ['img1'];
	$img2 = $_FILES ['img2'];
	$img3 = $_FILES ['img3'];
	$enunciado = $_POST ['enunciado'];
	$alt1 = $_POST ['alt1'];
	$alt2 = $_POST ['alt2'];
	$alt3 = $_POST ['alt3'];
	$alt4 = $_POST ['alt4'];
	$alt5 = $_POST ['alt5'];
	$imgAlt1 = $_FILES ['imgAlt1'];
	$imgAlt2 = $_FILES ['imgAlt2'];
	$imgAlt3 = $_FILES ['imgAlt3'];
	$imgAlt4 = $_FILES ['imgAlt4'];
	$imgAlt5 = $_FILES ['imgAlt5'];
	$altCorreta = $_POST ['altCorreta'];
	$tema1 = $_POST ['tema1'];
	$tema2 = $_POST ['tema2'];
	$tema3 = $_POST ['tema3'];
	$comentario = $_POST ['comentario'];
	if(	$vestibular == null || $vestibular == '' 
		|| $ano == null || $ano == '' 
		|| $num == null || $num == '' 
		|| $enunciado == null || $enunciado == '' 
		|| $alt1 == null || $alt1 == '' 
		|| $alt2 == null || $alt2 == '' 
		|| $alt3 == null || $alt3 == '' 
		|| $alt4 == null || $alt4 == '' 
		|| $alt5 == null || $alt5 == '' 
		|| $altCorreta == null || $altCorreta == '' 
		|| $tema1 == null || $tema1 == ''){
			die("Complete todos os campos obrigatórios, estagiário!");
		}
		if($img1 != null || $img1 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[1]="img_q/".$nome_imagem;
			move_uploaded_file($img1["tmp_name"], $dir_imagem[1]);
		}
		if($img2 != null || $img2 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[2]="img_q/".$nome_imagem;
			move_uploaded_file($img2["tmp_name"], $dir_imagem[2]);
		}
		if($img3 != null || $img3 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[3]="img_q/".$nome_imagem;
			move_uploaded_file($img3["tmp_name"], $dir_imagem[3]);
		}
		if($imgAlt1 != null || $imgAlt1 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[4]="img_q/".$nome_imagem;
			move_uploaded_file($imgAlt1["tmp_name"], $dir_imagem[4]);
		}
		if($imgAlt2 != null || $imgAlt2 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[5]="img_q/".$nome_imagem;
			move_uploaded_file($imgAlt2["tmp_name"], $dir_imagem[5]);
		}
		if($imgAlt3 != null || $imgAlt3 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[6]="img_q/".$nome_imagem;
			move_uploaded_file($imgAlt3["tmp_name"], $dir_imagem[6]);
		}
		if($imgAlt4 != null || $imgAlt4 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[7]="img_q/".$nome_imagem;
			move_uploaded_file($imgAlt4["tmp_name"], $dir_imagem[7]);
		}
		if($imgAlt5 != null || $imgAlt5 != ''){
			$nome_imagem = md5(uniqid(time())).".png";
			$dir_imagem[8]="img_q/".$nome_imagem;
			move_uploaded_file($imgAlt5["tmp_name"], $dir_imagem[8]);
		}
		$a = "(vestibular, ano, num, texto1, texto2, texto3, img1, img2, img3, enunciado, alt1, alt2, alt3, alt4, alt5, altImg1, altImg2, altImg3, altImg4, altImg5, altCorreta, tema1, tema2, tema3, comentario)";
		$b = "('$vestibular', '$ano', '$num', '$texto1', '$texto2', '$texto3', '$img1', '$img2', '$img3', '$enunciado', '$alt1', '$alt2', '$alt3', '$alt4', '$alt5', '$imgAlt1', '$imgAlt2', '$imgAlt3', '$imgAlt4', '$imgAlt5', '$altCorreta', '$tema1', '$tema2', '$tema3', '$comentario')";
		$sql="INSERT INTO pergunta ".$a." VALUES ".$b;
		$ds=mysql_query($sql) or die(mysql_error());
		echo "<h1>Sucesso!</h1>";
		echo ("<script language='JavaScript'>
            var si = alert('Questão adicionada com sucesso ao servidor!')
            window.location = './alt_alu.php'
        	</script>");
?>