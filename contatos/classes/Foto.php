<?php 

class Foto {

	private $id = 0;

	private $contato_id;

	private $nome;

	private $arquivo;

	public function setId ( int $valor ) {
		$this -> id = ( int ) $valor;
	}

	public function getId ( ) : int {
		return $this -> id;
	}

	public function setContatoId ( int $valor ) {
		$this -> contato_id = $valor;
	}

	public function getContatoId ( ) : int {
		return $this -> contato_id;
	}

	public function setNome ( string $valor ) {
		$this -> nome = $valor;
	}

	public function getNome ( ) : string {
		return $this -> nome;
	}

	public function setArquivo ( string $valor ) {
		$this -> arquivo = $valor;
	}

	public function getArquivo ( ) : string {
		return $this -> arquivo;
	}
}
