<?php 

class Veiculo {

	private $id = 0;
	private $placa = '';
	private $marca = '';
	private $modelo = '';
	private $hora_entrada = '';
	private $foto_entrada = '';
	private $hora_saida = '';
	private $foto_saida = '';

	public function setId ( int $valor ) {
		$this -> id = $valor;
	}

	public function getId ( ) : int {
		return $this -> id;
	}

	public function setPlaca ( string $valor ) {
		$this -> placa = $valor;
	}

	public function getPlaca ( ) : string {
		return $this -> placa;
	}

	public function setMarca ( string $valor ) {
		$this -> marca = $valor;
	}

	public function getMarca ( ) : string {
		return $this -> marca;
	}

	public function setModelo ( string $valor ) {
		$this -> modelo = $valor;
	}

	public function getModelo ( ) : string {
		return $this -> modelo;
	}

	public function setHoraEntrada ( string $valor ) {
		$this -> hora_entrada = $valor;
	}

	public function getHoraEntrada ( ) : string {
		return $this -> hora_entrada;
	}

	public function setFotoEntrada ( string $valor ) {
		$this -> foto_entrada = $valor;
	}

	public function getFotoEntrada ( ) : string {
		return ( string ) $this -> foto_entrada;
	}

	public function setHoraSaida ( string $valor ) {
		$this -> hora_saida = $valor;
	}

	public function getHoraSaida ( ) : string {
		return $this -> hora_saida;
	}

	public function setFotoSaida ( string $valor ) {
		$this -> foto_saida = $valor;
	}

	public function getFotoSaida ( ) : string {
		return ( string ) $this -> foto_saida;
	}
}
