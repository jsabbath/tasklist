<?php
header("Content-Type: text/html; charset=ISO-8859-1");
?>
<div class="col-lg-2"></div>
<div class="col-lg-8 col-sm-6 col-xs-12 col-md-8 text-center">
	<span class="titulo_gde">- Cadastro de Tarefa -</span>
	<div class="form-group text-right">* campos obrigatórios</div>
	<div class="form-group">
		<input type="text" class="form-control" id="titulo" maxlength="255" placeholder="Título *">
	</div>
	<div class="form-group">
		<textarea class="form-control" id="descricao" maxlength="900" placeholder="Descrição"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-lg btn-block" onclick="taskInsere()">Cadastrar</button>
	</div>
	<div class="form-group">
		<button class="btn btn-default btn-lg btn-block" onclick="requisicao('taskForm', '')">Limpar</button>
	</div>
	<div id="msg"></div>
</div>
<div class="col-lg-2"></div>