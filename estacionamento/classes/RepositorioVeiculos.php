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

		$id = $this -> conexao -> escape_string ( $id );

		$sqlBusca = "SELECT * FROM veiculos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Veiculo' );

	}

	public function salvar ( Veiculo $veiculo ) {

		$placa = strip_tags ( $this -> conexao -> escape_string ( $veiculo -> getPlaca ( ) ) );
		$marca = strip_tags ( $this -> conexao -> escape_string ( $veiculo -> getMarca ( ) ) );
		$modelo = strip_tags ( $this -> conexao -> escape_string ( $veiculo -> getModelo ( ) ) );
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

		$id = $this -> conexao -> escape_string ( $id );

		$sqlRemover = "DELETE FROM veiculos WHERE id = {$id}";

		$this -> conexao -> query ( $sqlRemover );

	}

	public function atualizar ( Veiculo $veiculo ) {

		$id = $veiculo -> getId ( );
		$placa = strip_tags ( $this -> conexao -> escape_string ( $veiculo -> getPlaca ( ) ) );
		$marca = strip_tags ( $this -> conexao -> escape_string ( $veiculo -> getMarca ( ) ) );
		$modelo = strip_tags ( $this -> conexao -> escape_string ( $veiculo -> getModelo ( ) ) );
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

	public function salvar_foto ( Veiculo $foto ) {

		$id = $foto -> getId ( );
		$foto_entrada = strip_tags ( $this -> conexao -> escape_string ( $foto -> getFotoEntrada ( ) ) );
		$foto_saida = strip_tags ( $this -> conexao -> escape_string ( $foto -> getFotoSaida ( ) ) );

		$sqlEditar = "
			UPDATE veiculos SET
				foto_entrada = '{$foto_entrada}',
				foto_saida = '{$foto_saida}'
			WHERE id = {$id}
		";

		$this -> conexao -> query ( $sqlEditar );

	}

	public function buscar_fotos ( $id ) {

		$id = $this -> conexao -> escape_string ( $id );

		$sqlBusca = "SELECT foto_entrada, foto_saida FROM veiculos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Veiculo' );

	}

	public function buscar_foto ( $id, $horario ) {

		$id = $this -> conexao -> escape_string ( $id );

		$sqlBusca = "SELECT id, $horario FROM veiculos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Veiculo' );

	}

	public function remover_foto_entrada ( $id ) {

		$id = $this -> conexao -> escape_string ( $id );

		$sqlEditar = "UPDATE veiculos SET
			foto_entrada = ''
		WHERE id = {$id}";

		$this -> conexao -> query ( $sqlEditar );

	}

	public function remover_foto_saida ( $id ) {

		$id = $this -> conexao -> escape_string ( $id );

		$sqlEditar = "UPDATE veiculos SET
			foto_saida = ''
		WHERE id = {$id}";

		$this -> conexao -> query ( $sqlEditar );
		
	}
}
