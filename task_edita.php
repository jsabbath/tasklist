<?php
header("Content-Type: text/html; charset=ISO-8859-1");
require_once("classes/task.class.php");

$id = $_GET['id'];

$task = new Task;
$task->setId($id);
$task->edita();

$titulo = $task->getTitulo();
$descricao = $task->getDescricao();
$status = $task->getStatus();
?>
<div class="col-lg-2"></div>
<div class="col-lg-8 col-sm-6 col-xs-12 col-md-8 text-center">
	<span class="titulo_gde">- Alteração de Cadastro de Tarefa -</span>
	<div class="form-group text-right">* campos obrigatórios</div>
	<div class="form-group">
		<input type="text" class="form-control" id="titulo" maxlength="255" placeholder="Título *" value="<?=$titulo?>">
	</div>
	<div class="form-group">
		<textarea class="form-control" id="descricao" maxlength="900" placeholder="Descrição"><?=$descricao?></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-lg btn-block" onclick="taskAltera(<?=$id?>)">Alterar</button>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-lg btn-block" onclick="taskConclui(<?=$id?>)">Concluir</button>
	</div>
	<div id="msg"></div>
</div>
<div class="col-lg-2"></div>