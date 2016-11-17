<?php
require_once("classes/task.class.php");
$task = new Task;
$task->setId($_POST['id']);
$result = $task->remove();
echo $result;
?>