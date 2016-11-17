<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
	<meta charset="iso-8859-1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html" />
	<meta name="language" content="pt-br" />
	<meta name="author" content="Sergio Faraco Web" />
	<title>Task List</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<meta name="robots" content="ALL" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/generic.js"></script>
	<script type="text/javascript" src="js/task.js"></script>
	<!--Custom-->
	<link href="css/task.css" type="text/css" rel="stylesheet"/>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
</head>
<body onload="requisicao('taskTable', '?status=1')">
	<div id="pelicula"><img src="images/ajax-loader.gif"></div>
	<!--MENU-->
	<nav class="navbar navbar-default navbar-fixed-top navbar-cms">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar text-branco"></span>
					<span class="icon-bar text-branco"></span>
					<span class="icon-bar text-branco"></span>
				</button>
				<a class="navbar-brand" href="index.php">TASK LIST</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="javadcript://" class="dropdown-toggle text-branco" data-toggle="dropdown" role="button" aria-expanded="false">Tarefa <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="javascript://" onclick="requisicao('taskForm', '')">Cadastro</a></li>
							<li><a href="javascript://" onclick="requisicao('taskTable', '?sessao=0')">Consulta</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--FIM MENU-->
	<div class="container"><div class="row"><div id="conteudo"></div></div></div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>