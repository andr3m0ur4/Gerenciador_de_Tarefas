<?php 

class Contato {

	private $id = 0;

	private $nome = '';

	private $telefone = '';

	private $email = '';

	private $descricao = '';

	private $data_nascimento = '';

	private $favorito = false;

	private $fotos = [];

	public function setId ( int $valor ) {
		$this -> id = ( int ) $valor;
	}

	public function getId ( ) : int {
		return $this -> id;
	}

	public function setNome ( string $valor ) {
		$this -> nome = $valor;
	}

	public function getNome ( ) : string {
		return $this -> nome;
	}

	public function setTelefone ( string $valor ) {
		$this -> telefone = $valor;
	}

	public function getTelefone ( ) : string {
		return $this -> telefone;
	}

	public function setEmail ( string $valor ) {
		$this -> email = $valor;
	}

	public function getEmail ( ) : string {
		return $this -> email;
	}

	public function setDescricao ( string $valor ) {
		$this -> descricao = $valor;
	}

	public function getDescricao ( ) : string {
		return $this -> descricao;
	}

	public function setDataNascimento ( string $valor ) {
		$this -> data_nascimento = $valor;
	}

	public function getDataNascimento ( ) : string {
		return $this -> data_nascimento;
	}

	public function setFavorito ( bool $valor ) {
		$this -> favorito = $valor;
	}

	public function getFavorito ( ) : bool {
		return $this -> favorito;
	}

	public function setFotos ( array $fotos ) {
		foreach ( $fotos as $foto ) {
			$this -> adicionarFoto ( $foto );
		}
	}

	private function adicionarFoto ( Foto $foto ) {
		array_push ( $this -> fotos, $foto );
	}

	public function getFotos ( ) : array {
		return $this -> fotos;
	}
}
