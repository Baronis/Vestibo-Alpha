<?php
	$conn=mysql_connect("localhost","root","admpass");
	if (!$conn) 
	{
		die ("<script language='JavaScript'>
            var si = alert('Não cosegui conexao!')
            window.location = '../index.php'
        	</script>");
	}
	$dbsel=mysql_select_db("vestibo_lab");
	if (!$dbsel)
	{
		die ("<script language='JavaScript'>
            var si = alert('Erro BD#1')
            window.location = 'index.php'
        	</script>");
	}
?>