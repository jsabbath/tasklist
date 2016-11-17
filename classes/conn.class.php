<?php
class Conn{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $banco = 'tasklist';
	
	function __construct(){
		$con = @mysql_connect($this->host, $this->user, $this->pass) or die("Erro ao conectar o servidor do banco de dados. Favor contactar o administrador:".mysql_error());
		$db = @mysql_select_db($this->banco) or die("Erro ao selecionar o banco de dados. Favor contactar o administrador: ".mysql_error());
	}
	public function query($query){
		$sql = mysql_query($query) or die("<b>Erro ao executar a query:</b> ".$query." -> ".mysql_error());
		return $sql;
	}
	public function fetch($sql){
		$result = mysql_fetch_object($sql);
		return $result;
	}
	public function num($sql){
		$num = mysql_num_rows($sql);
		return $num;
	}
	function __destruct(){}
}
?>