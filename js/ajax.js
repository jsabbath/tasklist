//Criando objeto ajax instanciando a classe XMLHttpRequest
try{
	//Criando objeto para IE 6 ou superior
	var ajax = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
	try{
		//Criando obejto para IE inferior a 6
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
	}catch(E){
		ajax = false;
	}
}
if(!ajax && typeof XMLHttpRequest != 'undefined'){
	//Criando objeto para Chrome ou Firefox (...)
	ajax = new XMLHttpRequest;
}