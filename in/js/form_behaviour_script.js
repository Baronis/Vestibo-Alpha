var q=21;var p=q-1;//q - variavel da sessao de quantas questoes vao ter
var me=0;
var atpag=1;
var sla=q/10;
var qtdpag= Math.ceil(sla);
alert("ATENCAO! Ao se reponder uma questao a cor verde significa que a questao foi repondida, e nao que esta correta ou incorreta.");
//ao se inicializa executa
window.onload = function(){showpages();}
function showpages()
{
	alert("Pagina: "+atpag+"/"+qtdpag);//ver se fica melhor ex:qtdpage=3, Pagina: 1 de 3 ou Pagina: 1/3
	if(atpag == 1 && qtdpag <= 1 && p<10)
	{
		for(var i=0;i<q; i++)
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
			m=i;
		};me=m;
		for(var i=10;i<=q; i++)
		{
			document.getElementById("div"+i).style.visibility="hidden";
			document.getElementById("div"+i).style.display = "none";
		};
		atpag++;
	}
			
	else if(atpag > 1)//ver se comeca com pagina =1 ou null, posssivelmente melhor comeca com 1
	{
		var test=q-((atpag*10)-10);
		if (test<10) 
		{
			for (var x = me; x <= q; x++) {
				document.getElementById("div"+x).style.visibility="visible";
				document.getElementById("div"+x).style.display = "block";
			};
			for(var i=me;i>=0;i--){
				document.getElementById("div"+i).style.visibility="hidden";
				document.getElementById("div"+i).style.display = "none";
			};
		}
		else{
			var m2=m+10;
			for(var x=me;x<m2;x++)
			{
				document.getElementById("div"+x).style.visibility="visible";
				document.getElementById("div"+x).style.display = "block";
				m=x;
			};
			for(var i=me;i>=0;i--){
				document.getElementById("div"+i).style.visibility="hidden";
				document.getElementById("div"+i).style.display = "none";
			};
			for (var x = m2; x < q; x++) {
				document.getElementById("div"+x).style.visibility="hidden";
				document.getElementById("div"+x).style.display = "none";
			};
			me=m;
			atpag++;
		}
	}
}
function feito(local)
{
	document.getElementById(local).style.color="#1EA206";
}
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