<?php
require_once("conn.class.php");

class Task{
	private $conn;
	private $id;
	private $titulo;
	private $descricao;
	private $cricao;
	private $alteracao;
	private $remocao;
	private $conclusao;
	private $status;
	
	public function __construct(){
		$this->conn = new Conn;
	}
	function setId($id){
		$this->id = $id;
	}
	function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	function setCriacao($criacao){
		$this->criacao = $criacao;
	}
	function setAlteracao($alteracao){
		$this->alteracao = $alteracao;
	}
	function setRemocao($remocao){
		$this->remocao = $remocao;
	}
	function setConclusao($conclusao){
		$this->conclusao = $conclusao;
	}
	function setStatus($status){
		$this->status = $status;
	}
	function getId(){
		return $this->id;
	}
	function getTitulo(){
		return $this->titulo;
	}
	function getDescricao(){
		return $this->descricao;
	}
	function getCriacao(){
		return $this->criacao;
	}
	function getAlteracao(){
		return $this->alteracao;
	}
	function getRemocao(){
		return $this->remocao;
	}
	function getConclusao(){
		return $this->conclusao;
	}
	function getStatus(){
		return $this->status;
	}
	function comboStatus(){
		$arraystatus = array("Removidas", "Pendentes", "Concluídas");
		$combo = '<option value="">Todas</option>';
		foreach($arraystatus as $chave => $valor){
			if(strval($chave) == strval($this->status)){
				$combo .= '<option value="'.$chave.'" selected>'.$valor.'</option>';
			}else{
				$combo .= '<option value="'.$chave.'">'.$valor.'</option>';
			}
		}
		return $combo;
	}
	function insere(){
		$query = "INSERT INTO task(id_task, titulo, descricao, dt_criacao) VALUES(0, '".$this->titulo."', '".$this->descricao."', NOW())";
		$sql = $this->conn->query($query) or die(mysql_error());
		if($sql){
			return "1";
		}else{
			return mysql_error();
		}
	}
	function statusToString(){
		if($this->status == 0){
			return "Removido";
		}elseif($this->status == 1){
			return "Pendente";
		}else{
			return "Concluído";
		}
	}
	function consulta(){
		$whr = '';
		if(strlen($this->status) > 0){
			$whr = "WHERE status = ".$this->status;
		}
		$query = "SELECT id_task, titulo, descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y  %H:%i') as dt_criacao, DATE_FORMAT(dt_alteracao, '%d/%m/%Y  %H:%i') as dt_alteracao, DATE_FORMAT(dt_remocao, '%d/%m/%Y  %H:%i') as dt_remocao, DATE_FORMAT(dt_conclusao, '%d/%m/%Y  %H:%i') as dt_conclusao, status FROM task ".$whr." ORDER BY status DESC, dt_criacao ASC";
		
		$sql = $this->conn->query($query);
		$num = $this->conn->num($sql);
		if($num > 0){
			$tabela ='';
			while($result = $this->conn->fetch($sql)){
				$this->setId($result->id_task);
				$this->setTitulo($result->titulo);
				$this->setDescricao($result->descricao);
				$this->setCriacao($result->dt_criacao);
				$this->setAlteracao($result->dt_alteracao);
				$this->setRemocao($result->dt_remocao);
				$this->setConclusao($result->dt_conclusao);
				$this->setStatus($result->status);
				
				$tabela .= '<tr>';
				if($this->status == 1){
					$tabela .= '<td class="text-left" width="60%">
									<b>Título:</b> <a href="javascript://" onclick="taskEdita('.$this->id.')">'.$this->titulo.'</a><br />
									<b>Descrição:</b> '.$this->descricao.'
								</td>';
				}else{
					$tabela .= '<td class="text-left" width="60%">
									<b>Título:</b> '.$this->titulo.'<br>
									<b>Descrição:</b> '.$this->descricao.'
								</td>';
				}
				$tabela .= '<td class="text-left"><b>Data criação:</b> '.$this->criacao;
				if(!empty($this->alteracao)){
					$tabela .= '<br><b>Data alteração:</b> '.$this->alteracao;
				}
				if(!empty($this->remocao)){
					$tabela .= '<br><b>Data remoção:</b> '.$this->remocao;
				}
				if(!empty($this->conclusao)){
					$tabela .= '<br><b>Data conclusão:</b> '.$this->conclusao;
				}
				$tabela .= '</td><td>'.$this->statusToString().'</td>';
				if($this->status > 0){
					if($this->status == 1){
						$tabela .= '<td><span class="glyphicon glyphicon-ok clicavel" aria-hidden="true" onclick="taskConclui('.$this->id.')"></span>';
					}else{
						$tabela .= '<td><span class="glyphicon glyphicon-certificate clicavel" aria-hidden="true" onclick="taskReabre('.$this->id.')"></span>';
					}
					$tabela .= '<span class="glyphicon glyphicon-trash clicavel" aria-hidden="true" onclick="taskRemove('.$this->id.')"></span></td>';
				}else{
					$tabela .= '<td> - </td>';
				}
				$tabela .= '</tr>';
			}
		}else{
			$tabela = '<tr><td colspan="4">Nenhuma tarefa cadastrada.</td></tr>';
		}
		return $tabela;
	}
	function edita(){
		$query = "SELECT titulo, descricao, status FROM task WHERE id_task = ".$this->id;
		$sql = $this->conn->query($query);
		$result = $this->conn->fetch($sql);

		$this->setTitulo($result->titulo);
		$this->setDescricao($result->descricao);
		$this->setStatus($result->status);
	}
	function altera(){
		$query = "UPDATE task SET titulo = '".$this->titulo."', descricao = '".$this->descricao."', dt_alteracao = NOW() WHERE id_task = ".$this->id;
		$sql = $this->conn->query($query) or die(mysql_error());
		if($sql){
			return "1";
		}else{
			return mysql_error();
		}
	}
	function conclui(){
		$query = "UPDATE task SET dt_conclusao = NOW(), status = 2 WHERE id_task = ".$this->id;
		$sql = $this->conn->query($query);
		if($sql){
			return "1";
		}else{
			return mysql_error();
		}
	}
	function reabre(){
		$query = "UPDATE task SET dt_alteracao = NOW(), status = 1 WHERE id_task = ".$this->id;
		$sql = $this->conn->query($query);
		if($sql){
			return "1";
		}else{
			return mysql_error();
		}
	}
	function remove(){
		$query = "UPDATE task SET dt_remocao = NOW(), status = 0 WHERE id_task = ".$this->id;
		$sql = $this->conn->query($query);
		if($sql){
			return "1";
		}else{
			return mysql_error();
		}
	}
}
?>