/*
        VESTIBO ALPHA === Menu Switch (Javascript) === LAMPI
        Última revisão: 08/01/2014 (Matheus Baroni)
*/
function open_close_menu(){
	classe = document.getElementById('m').className;
	if(classe == 'esc'){
    	document.getElementById('m').className = 'menu';
	}else{
    	document.getElementById('m').className = 'esc';
	}
}
function open_close_user_menu(){
	classe = document.getElementById('u').className;
	if(classe == 'user-esc'){
    	document.getElementById('u').className = 'user-menu';
	}else{
    	document.getElementById('u').className = 'user-esc';
	}
}
/*
        ==============================================================================
        =====        VESTIBO ALPHA === Menu Switch (Javascript) === LAMPI        =====
        ==============================================================================
*/