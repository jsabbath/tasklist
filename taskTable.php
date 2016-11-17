<?php
header("Content-Type: text/html; charset=ISO-8859-1");
require_once("classes/task.class.php");

$status = $_GET['status'];

$task = new Task;
$task->setStatus($status);
$combo = $task->comboStatus();
$tabela = $task->consulta();
?>
<div class="col-lg-1"></div>
<div class="col-lg-10 col-sm-12 col-xs-12 col-md-10 text-center">
	<span class="titulo_gde">- Consulta de Tarefas -</span>
	<div class="form-group text-left">
		Status: <select class="form-control" id="sessoes" onchange="requisicao('taskTable', '?status='+this.value)"><?=$combo?></select>
	</div>
	<table class="table table-striped table-responsive table-hover">
		<tbody>
			<tr>
				<th>Tarefa</th>
				<th>Detalhes</th>
				<th>Status</th>
				<th></th>
			</tr>
			<?=$tabela?>
		</tbody>
	</table>
</div>
<div class="col-lg-1"></div>