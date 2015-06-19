	qtdques=1;
	time=3*qtdques;
	mi=time;
	hrs=0;
	tempo="";
	d=0;
function formatatempo(segs) {
	hr=hrs;
	min=mi;
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
	if (hr==0 && min==0 && segs ==0) {clearInterval(interval); alert("O tempo acabou!"); calculatempo();}
	fin = hr+":"+min+":"+segs;
  if(d==0){tempo=fin;d++;}
	return fin;
}
var segundos = 0; //inicio do cronometro
function conta() {
	segundos--;
	document.getElementById("counter").innerHTML = formatatempo(segundos);
}

function inicia(){
	sla();
	interval = setInterval("conta();",1000);
	document.getElementById("btIniciar").disabled=true;
}
function sla(){
	hrs=0;
	while(mi>60) {
		if (mi >60) {
		mi = mi-60;
		hrs = parseInt(hrs)+1;
		}
	}
}
function encerrar(){
	clearInterval(interval);
	calculatempo();
	var tempofeito=time_test;
}

function calculatempo(){
	na=fin.split(':');
	to=tempo.split(":");
	t=60;
	v1=to[0]-na[0];
	v2=(to[1])-na[1];
	v3=t-na[2];
	if(v1<10){v1="0"+v1}
	if(v2<10){v2="0"+v2}
	if(v3<10){v3="0"+v3}
	time_test=v1+":"+v2+":"+v3;//time_test Ã© quanto tempo se passou desde de o inicio da prova
  alert("tempo de prova: "+time_test);
}