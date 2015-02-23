<?php
   include_once("bd.php");
   $sql="SELECT * FROM pergunta";
   $ds=mysql_query($sql) or die(mysql_error());
?>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/estilo.css" />
      <title>Listar questões - VESTIBO</title>
   </head>
   <body>
      <div id="box">
         <center>
            <img src="logo.png" id="logo">
            <br>
            <input type="button" class="btn" name="btn_cad" value="Cadastrar questões" onclick="javascript: window.location = 'index.php';">
            <h1>Lista de questões (TOTAL:<?php echo(mysql_num_rows($ds)); ?> )</h1>
         </center>
         <?php
            echo ("<hr>");
            while($x=mysql_fetch_assoc($ds)){
               echo ("Vestibular: ".$x['vestibular']." - ".$x['ano'].": ".$x['num']."<br>");
               echo ("<hr>");
               echo ("Texto 1: ".$x['texto1']."<br>");
               echo ("Texto 2: ".$x['texto2']."<br>");
               echo ("<br>");
               echo('Imagem 1: <img src ="'.$x['img1'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo('Imagem 2: <img src ="'.$x['img2'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo('Imagem 3: <img src ="'.$x['img3'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo ("Pergunta: ".$x['enunciado']."<br>");
               echo ("Alternativa 1: ".$x['alt1']."<br>");
               echo('Imagem: <img src ="'.$x['altImg1'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo ("Alternativa 2: ".$x['alt2']."<br>");
               echo('Imagem: <img src ="'.$x['altImg2'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo ("Alternativa 3: ".$x['alt3']."<br>");
               echo('Imagem: <img src ="'.$x['altImg3'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo ("Alternativa 4: ".$x['alt4']."<br>");
               echo('Imagem: <img src ="'.$x['altImg4'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo ("Alternativa 5: ".$x['alt5']."<br>");
               echo('Imagem: <img src ="'.$x['altImg5'].'" style="width=20%; height=20%;">');
               echo ("<br>");
               echo ("Alternativa Correta: ".$x['altCorreta']."<br>");
               echo ("Modelo: ".$x['ordem']."<br>");
               echo ("Tema 1: ".$x['tema1']."<br>");
               echo ("Tema 2: ".$x['tema2']."<br>");
               echo ("Alternativa Correta: ".$x['altCorreta']."<br>");
               echo ("Comentário: ".$x['comentario']."<br>");
               echo ("Data de Criação: ".$x['dataCriacao']."<br>");
               echo ("ID da questão: ".$x['id']."<br>");
               echo ("<br><hr>");
            }
         ?>
      </div>
   </body>
</html>