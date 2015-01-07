function open_close_menu(){
	classe = document.getElementById('m').className;
	if(classe == 'esc'){
    	document.getElementById('m').className = 'menu';
	}else{
    	document.getElementById('m').className = 'esc';
	}
}