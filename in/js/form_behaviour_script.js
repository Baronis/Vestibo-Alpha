var qtdquestions=21;var p=qtdquestions-1;
//at é de atual
var numquesat=0;
var atpag=1;
var contapags=qtdquestions/10;
var qtdpag= Math.ceil(contapags);
alert("ATENCAO! Ao se reponder uma questao a cor verde significa que a questao foi repondida, e nao que esta correta ou incorreta.");
//ao se inicializa executa
window.onload = function(){showpages();}
//exibe os blocos de questoes ou os esconde
function showpages()
{
	alert("Pagina: "+atpag+" de "+qtdpag);
	if(atpag == 1 && qtdpag <= 1 && p<10)
	{
		for(var i=0;i<qtdquestions; i++)
		{
			document.getElementById("div"+i).style.visibility="visible";
			document.getElementById("div"+i).style.display = "block";
		};
	}
	else if(atpag == 1 && qtdpag >= 1)
	{
		for (var i=0;i < 10; i++)
		{
			document.getElementById("div"+i).style.visibility = "visible";
			document.getElementById("div"+i).style.display = "block";
			numques=i;
		};numquesat=numques;
		for(var i=10;i<=qtdquestions; i++)
		{
			document.getElementById("div"+i).style.visibility="hidden";
			document.getElementById("div"+i).style.display = "none";
		};
		atpag++;
	}
	else if(atpag > 1)
	{
		var test=qtdquestions-((atpag*10)-10);
		if (test<10) 
		{
			for (var x = numquesat; x <= qtdquestions; x++) {
				document.getElementById("div"+x).style.visibility="visible";
				document.getElementById("div"+x).style.display = "block";
			};
			for(var i=numquesat;i>=0;i--){
				document.getElementById("div"+i).style.visibility="hidden";
				document.getElementById("div"+i).style.display = "none";
			};
		}
		else{
			var numques2=numques+10;
			for(var x=numquesat;x<numques2;x++)
			{
				document.getElementById("div"+x).style.visibility="visible";
				document.getElementById("div"+x).style.display = "block";
				numques=x;
			};
			for(var i=numquesat;i>=0;i--){
				document.getElementById("div"+i).style.visibility="hidden";
				document.getElementById("div"+i).style.display = "none";
			};
			for (var x = numques2; x < qtdquestions; x++) {
				document.getElementById("div"+x).style.visibility="hidden";
				document.getElementById("div"+x).style.display = "none";
			};
			numquesat=numques;
			atpag++;
		}
	}
}
function feito(local)
{
	document.getElementById(local).style.color="#1EA206";
}
//confere se todos as questoes foram respondidas
function verifica(){
	var campoquestao=document.getElementsByName("divs");
	var c = 1;
	for (var x = 0; x < campoquestao.length; x++) {
		var radios = document.getElementsByName("id_res"+x);
		
	    if (radios[0].checked == false && radios[1].checked == false && radios[2].checked == false && radios[3].checked == false && radios[4].checked == false) 
	    {
	        if (c == 1) {alert("voce esqueceu de alguma das questoes");c++;};
	       	   document.getElementById('div'+x).style.color="#D20808";
	    }
	    else if(radios[0].checked == true || radios[1].checked == true || radios[2].checked == true || radios[3].checked == true || radios[4].checked == true)
	    {
	        document.getElementById('div'+x).style.color="#1EA206";
	    }
	    else{ document.getElementById('div'+x).style.color="#000";}
	};
}