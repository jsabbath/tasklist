<?php
require_once("classes/task.class.php");

$task = new Task;

$task->setTitulo(addslashes($_POST['titulo']));
$task->setDescricao(addslashes($_POST['descricao']));

$result = $task->insere();

echo $result;
?>