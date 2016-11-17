<?php
require_once("classes/task.class.php");

$task = new Task;

$task->setId($_POST['id']);
$task->setTitulo(addslashes($_POST['titulo']));
$task->setDescricao(addslashes($_POST['descricao']));

$result = $task->altera();

echo $result;
?>