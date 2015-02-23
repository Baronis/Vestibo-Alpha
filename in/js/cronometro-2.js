
tempo="00:06:00";//troca valor "00:06:00" pela variavel fin recebida da sessao
tempo2=tempo.split(':');
tempo3=tempo.split('');

function formatatempo(segs) {
	min = tempo2[1];
	hr = tempo3[1];
	/*
	if hr < 10 then hr = "0"&hr
	if min < 10 then min = "0"&min
	if segs < 10 then segs = "0"&segs
	*/
	while(segs<0) {
		if (segs < 0) {
		segs = segs+60;
		min = min-1;
		}
	}

	while(min<0) {
		if (min <0) {
		min = min+60;
		hr = hr-1;
		}
	}

	if (hr < 10) {hr = "0"+hr}
	if (min < 10) {min = "0"+min}
	if (segs < 10) {segs = "0"+segs}
	if (hr==0 && min==0 && segs ==0) {clearInterval(interval); alert("O tempo acabou!");}
	fin = hr+":"+min+":"+segs
	return fin;
}
//inicio do cronometro
var segundos = 0; //troca 0 pela variavel segundos recebida pela sessao
function conta() {
	segundos--;
	document.getElementById("counter").innerHTML = formatatempo(segundos);
}

function inicia(){
	interval = setInterval("conta();",1000);
	document.getElementById("btIniciar").disabled=true;
}

function encerrar(){
	clearInterval(interval);
	calculatempo();
	var tempofeito=f;
}

function calculatempo(){
	na=fin.split(':');
	to=tempo.split(":");
	t=60;
	v1=to[0]-na[0];
	v2=(to[1]-1)-na[1];
	v3=t-na[2];
	if(v1<10){v1="0"+v1}
	if(v2<10){v2="0"+v2}
	if(v3<10){v3="0"+v3}
	f=v1+":"+v2+":"+v3;//f é quanto tempo se passou desde de o inicio da prova
}

function proxima(){
	//codigo pra passa o tempo de pagina em pagina
	calculatempo();
	var tempofeito=f;
	//envia variavel fin e segundos pela sessao
}