<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/estilo.css" />
      <title>Cadastrar questões - VESTIBO LAB</title>
   </head>
   <body>
      <div id="box">
         <center>
            <img src="logo.png" id="logo">
            <br>
            <input type="button" class="btn" name="btn_listar" value="Listar questões" onclick="javascript: window.location = 'lis.php';">
            <h1>Cadastro de questões</h1>
            <form name="usrform" enctype="multipart/form-data" method="POST" action="cad.php">
               <input type="text" class="campo" name="vestibular" value="" placeholder="Vestibular" maxlength="15">
               <br>
               <input type="text" class="campo" name="ano" value="" placeholder="Ano" maxlength="4">
               <br>
               <input type="text" class="campo" name="num" value="" placeholder="Número da Questão" maxlength="4">
               <br>
               <textarea class="campo" rows="4" cols="50" placeholder="Texto 1" name="texto1"></textarea>
               <br>
               <textarea class="campo" rows="4" cols="50" placeholder="Texto 2" name="texto2"></textarea>
               <br>
               <textarea class="campo" rows="4" cols="50" placeholder="Texto 3" name="texto3"></textarea>
               <br>
               <label for="file">Imagem PNG 1:</label><input type="file" name="img1" id="file"><br>
               <label for="file">Imagem PNG 2:</label><input type="file" name="img2" id="file"><br>
               <label for="file">Imagem PNG 3:</label><input type="file" name="img3" id="file"><br>
               <textarea class="campo" rows="4" cols="50" placeholder="Pregunta" name="enunciado"></textarea>
               <br>
               <textarea class="campo" rows="3" cols="50" placeholder="Alternativa 1" name="alt1"></textarea>
               <br>
               <label for="file">Imagem PNG Alternativa 1:</label><input type="file" name="imgAlt1" id="file"><br>
               <textarea class="campo" rows="3" cols="50" placeholder="Alternativa 2" name="alt2"></textarea>
               <br>
               <label for="file">Imagem PNG Alternativa 2:</label><input type="file" name="imgAlt2" id="file"><br>
               <textarea class="campo" rows="3" cols="50" placeholder="Alternativa 3" name="alt3"></textarea>
               <br>
               <label for="file">Imagem PNG Alternativa 3:</label><input type="file" name="imgAlt3" id="file"><br>
               <textarea class="campo" rows="3" cols="50" placeholder="Alternativa 4" name="alt4"></textarea>
               <br>
               <label for="file">Imagem PNG Alternativa 4:</label><input type="file" name="imgAlt4" id="file"><br>
               <textarea class="campo" rows="3" cols="50" placeholder="Alternativa 5" name="alt5"></textarea>
               <br>
               <label for="file">Imagem PNG Alternativa 5:</label><input type="file" name="imgAlt5" id="file"><br>
               <select class="campo" name="altCorreta">
                  <option value="" selected>Alternativa Correta</option>
                  <option value="alt1">Alternativa 1</option>
                  <option value="alt2">Alternativa 2</option>
                  <option value="alt3">Alternativa 3</option>
                  <option value="alt4">Alternativa 4</option>
                  <option value="alt5">Alternativa 5</option>
               </select>
               <textarea class="campo" rows="3" cols="50" placeholder="Comentário" name="comentario"></textarea>
               <br>
               <input type="text" class="campo" name="tema1" value="" placeholder="Tema 1" maxlength="15">
               <br>
               <input type="text" class="campo" name="tema2" value="" placeholder="Tema 2" maxlength="15">
               <br>
               <input type="text" class="campo" name="tema3" value="" placeholder="Tema 3" maxlength="15">
               <br>
               <input type="submit" class="btn" value="Cadastrar">
            </form>
         </center>
         <p style="color: #eee">Versão 1.1 r2 LAMPI</p>
      </div>
   </body>
</html>