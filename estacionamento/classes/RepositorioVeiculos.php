<?php 

class RepositorioVeiculos {

	private $conexao;

	public function __construct ( $conexao ) {
		$this -> conexao = $conexao;
	}

	public function buscar ( $veiculo_id = 0 ) {

		if ( $veiculo_id > 0 ) {
			return $this -> buscar_veiculo ( $veiculo_id );
		} else {
			return $this -> buscar_veiculos ( );
		}

	}

	private function buscar_veiculos ( ) {

		$sqlBusca = 'SELECT * FROM veiculos';

		$resultado = $this -> conexao -> query ( $sqlBusca );

		$veiculos = [];

		while ( $veiculo = $resultado -> fetch_object ( 'Veiculo' ) ) {
			$veiculos[] = $veiculo;
		}

		return $veiculos;

	}

	private function buscar_veiculo ( $id ) {

		$sqlBusca = "SELECT * FROM veiculos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Veiculo' );

	}

	public function salvar ( $veiculo ) {

		$placa = $veiculo -> getPlaca ( );
		$marca = $veiculo -> getMarca ( );
		$modelo = $veiculo -> getModelo ( );
		$hora_entrada = $veiculo -> getHoraEntrada ( );
		$hora_saida = $veiculo -> getHoraSaida ( );

		$sqlGravar = "
			INSERT INTO veiculos
			(placa, marca, modelo, hora_entrada, hora_saida)
			VALUES
			(
				'{$placa}',
				'{$marca}',
				'{$modelo}',
				'{$hora_entrada}',
				'{$hora_saida}'
			)
		";

		$this -> conexao -> query ( $sqlGravar );

	}

	public function remover ( $id ) {

		$sqlRemover = "DELETE FROM veiculos WHERE id = {$id}";

		$this -> conexao -> query ( $sqlRemover );

	}

	public function atualizar ( $veiculo ) {

		$id = $veiculo -> getId ( );
		$placa = $veiculo -> getPlaca ( );
		$marca = $veiculo -> getMarca ( );
		$modelo = $veiculo -> getModelo ( );
		$hora_entrada = $veiculo -> getHoraEntrada ( );
		$hora_saida = $veiculo -> getHoraSaida ( );

		$sqlEditar = "
			UPDATE veiculos SET
				placa = '{$placa}',
				marca = '{$marca}',
				modelo = '{$modelo}',
				hora_entrada = '{$hora_entrada}',
				hora_saida = '{$hora_saida}'
			WHERE id = {$id}
		";

		$this -> conexao -> query ( $sqlEditar );

	}

	public function salvar_foto ( $foto ) {

		$id = $foto -> getId ( );
		$foto_entrada = $foto -> getFotoEntrada ( );
		$foto_saida = $foto -> getFotoSaida ( );

		$sqlEditar = "
			UPDATE veiculos SET
				foto_entrada = '{$foto_entrada}',
				foto_saida = '{$foto_saida}'
			WHERE id = {$id}
		";

		$this -> conexao -> query ( $sqlEditar );

	}

	public function buscar_fotos ( $id ) {

		$sqlBusca = "SELECT foto_entrada, foto_saida FROM veiculos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Veiculo' );

	}

	public function buscar_foto ( $id, $horario ) {

		$sqlBusca = "SELECT id, $horario FROM veiculos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Veiculo' );

	}

	public function remover_foto_entrada ( $id ) {

		$sqlEditar = "UPDATE veiculos SET
			foto_entrada = ''
		WHERE id = {$id}";

		$this -> conexao -> query ( $sqlEditar );

	}

	public function remover_foto_saida ( $id ) {

		$sqlEditar = "UPDATE veiculos SET
			foto_saida = ''
		WHERE id = {$id}";

		$this -> conexao -> query ( $sqlEditar );
		
	}
}
