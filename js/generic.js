function requisicao(pagina, get){
	document.getElementById("pelicula").style.display = "block";
	ajax.open("GET", pagina+".php"+get);
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4 && ajax.status == 200){
			var result = ajax.responseText;
			document.getElementById("conteudo").innerHTML = result;
			document.getElementById("pelicula").style.display = "none";
			if(pagina == 'contentForm'){
				createEditor();
			}
		}
	}
	ajax.send(null);
}