function taskInsere(){
	document.getElementById("pelicula").style.display = "block";
	var titulo = document.getElementById("titulo").value;
	var descricao = document.getElementById("descricao").value;
	if(titulo.length == 0){
		document.getElementById("pelicula").style.display = "none";
		alert("Preencha o(s) campo(s) obrigatório(s).");
	}else{
		var params = "titulo="+escape(titulo)+"&descricao="+escape(descricao);
		//alert(params);
		ajax.open("POST", "task_insere.php");
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("encodig", "ISO-8859-1");
		ajax.setRequestHeader("Content-length", params.length);
		ajax.setRequestHeader("Connection", "close");
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				var result = ajax.responseText;
				if(result == "1"){
					requisicao('taskTable', '?status=1');
					document.getElementById("pelicula").style.display = "none";
				}else{
					document.getElementById("msg").innerHTML = '<div class="alert alert-danger">Erro ao tentar cadastrar: '+result+'</div>';
					document.getElementById("pelicula").style.display = "none";
				}
			}
		}
		ajax.send(params);
	}
}

function taskEdita(id){
	document.getElementById("pelicula").style.display = "block";
	ajax.open("GET", "task_edita.php?id="+id);
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4 && ajax.status == 200){
			var result = ajax.responseText;
			document.getElementById("conteudo").innerHTML = result;
			document.getElementById("pelicula").style.display = "none";
		}
	}
	ajax.send(null);
}

function taskAltera(id){
	document.getElementById("pelicula").style.display = "block";
	var titulo = document.getElementById("titulo").value;
	var descricao = document.getElementById("descricao").value;
	if(titulo.length == 0){
		document.getElementById("pelicula").style.display = "none";
		alert("Preencha o(s) campo(s) obrigatório(s).");
	}else{
		var params = "id="+id+"&titulo="+escape(titulo)+"&descricao="+escape(descricao);
		ajax.open("POST", "task_altera.php");
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("encodig", "ISO-8859-1");
		ajax.setRequestHeader("Content-length", params.length);
		ajax.setRequestHeader("Connection", "close");
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				var result = ajax.responseText;
				if(result == "1"){
					requisicao('taskTable', '?status=1');
					document.getElementById("pelicula").style.display = "none";
				}else{
					document.getElementById("msg").innerHTML = '<div class="alert alert-danger">Erro ao tentar alterar: '+result+'</div>';
					document.getElementById("pelicula").style.display = "none";
				}
			}
		}
		ajax.send(params);
	}
}

function taskConclui(id){
	var resposta = confirm("Deseja realmente concluir a tarefa?");
	if(resposta){
		document.getElementById("pelicula").style.display = "block";
		var params = "id="+id;
		ajax.open("POST", "task_conclui.php");
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("encodig", "ISO-8859-1");
		ajax.setRequestHeader("Content-length", params.length);
		ajax.setRequestHeader("Connection", "close");
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				var result = ajax.responseText;
				if(result == "1"){
					requisicao('taskTable', '?status=2');
					document.getElementById("pelicula").style.display = "none";
				}else{
					alert('<span class="danger">Erro ao concluir: '+result+'</span>');
					document.getElementById("pelicula").style.display = "none";
				}
			}
		}
		ajax.send(params);
	}
}
function taskReabre(id){
	var resposta = confirm("Deseja realmente reabrir a tarefa?");
	if(resposta){
		document.getElementById("pelicula").style.display = "block";
		var params = "id="+id;
		ajax.open("POST", "task_reabre.php");
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("encodig", "ISO-8859-1");
		ajax.setRequestHeader("Content-length", params.length);
		ajax.setRequestHeader("Connection", "close");
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				var result = ajax.responseText;
				if(result == "1"){
					requisicao('taskTable', '?status=1');
					document.getElementById("pelicula").style.display = "none";
				}else{
					alert('<span class="danger">Erro ao concluir: '+result+'</span>');
					document.getElementById("pelicula").style.display = "none";
				}
			}
		}
		ajax.send(params);
	}
}
function taskRemove(id, sessao){
	var resposta = confirm("Após remover este conteúdo, não será mais possível desfazer esta ação. Deseja realmente remover?");
	if(resposta){
		document.getElementById("pelicula").style.display = "block";
		var params = "id="+id;
		ajax.open("POST", "task_remove.php");
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("encodig", "ISO-8859-1");
		ajax.setRequestHeader("Content-length", params.length);
		ajax.setRequestHeader("Connection", "close");
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				var result = ajax.responseText;
				if(result == "1"){
					requisicao('taskTable', '?status=0');
					document.getElementById("pelicula").style.display = "none";
				}else{
					alert('<span class="danger">Erro ao remover: '+result+'</span>');
					document.getElementById("pelicula").style.display = "none";
				}
			}
		}
		ajax.send(params);
	}
}