<?php 

class RepositorioVeiculos {

	private $pdo;

	public function __construct ( PDO $pdo ) {

		$this -> pdo = $pdo;

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

		$resultado = $this -> pdo -> query ( $sqlBusca, PDO::FETCH_CLASS, 'Veiculo' );

		$veiculos = [];

		foreach ( $resultado as $veiculo ) {
			$veiculos[] = $veiculo;
		}

		return $veiculos;

	}

	private function buscar_veiculo ( $id ) {
		
		$sqlBusca = "SELECT * FROM veiculos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlBusca );

		$query -> execute ([
			'id' => $id,
		]);

		return $query -> fetchObject ( 'Veiculo' );

	}

	public function salvar ( Veiculo $veiculo ) {
		
		$sqlGravar = "
			INSERT INTO veiculos
			(placa, marca, modelo, hora_entrada, hora_saida)
			VALUES
			(:placa, :marca, :modelo, :hora_entrada, :hora_saida)
		";

		$query = $this -> pdo -> prepare ( $sqlGravar );

		$query -> execute ([
			'placa' => strip_tags ( $veiculo -> getPlaca ( ) ),
			'marca' => strip_tags ( $veiculo -> getMarca ( ) ),
			'modelo' => strip_tags ( $veiculo -> getModelo ( ) ),
			'hora_entrada' => $veiculo -> getHoraEntrada ( ),
			'hora_saida' => $veiculo -> getHoraSaida ( ),
		]);

	}

	public function remover ( $id ) {
		
		$sqlRemover = "DELETE FROM veiculos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlRemover );

		$query -> execute ([
			'id' => $id,
		]);

	}

	public function atualizar ( Veiculo $veiculo ) {
		
		$sqlEditar = "
			UPDATE veiculos SET
				placa = :placa,
				marca = :marca,
				modelo = :modelo,
				hora_entrada = :hora_entrada,
				hora_saida = :hora_saida
			WHERE id = :id
		";

		$query = $this -> pdo -> prepare ( $sqlEditar );

		$query -> execute ([
			'placa' => strip_tags ( $veiculo -> getPlaca ( ) ),
			'marca' => strip_tags ( $veiculo -> getMarca ( ) ),
			'modelo' => strip_tags ( $veiculo -> getModelo ( ) ),
			'hora_entrada' => $veiculo -> getHoraEntrada ( ),
			'hora_saida' => $veiculo -> getHoraSaida ( ),
			'id' => $veiculo -> getId ( ),
		]);

	}

	public function salvar_foto ( Veiculo $foto ) {

		$sqlEditar = "
			UPDATE veiculos SET
				foto_entrada = :foto_entrada,
				foto_saida = :foto_saida
			WHERE id = :id
		";

		$query = $this -> pdo -> prepare ( $sqlEditar );

		$query -> execute ([
			'foto_entrada' => strip_tags ( $foto -> getFotoEntrada ( ) ),
			'foto_saida' => strip_tags ( $foto -> getFotoSaida ( ) ),
			'id' => $foto -> getId ( ),
		]);

	}

	public function buscar_fotos ( $id ) {
		
		$sqlBusca = "SELECT foto_entrada, foto_saida FROM veiculos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlBusca );

		$query -> execute ([
			'id' => $id,
		]);

		return $query -> fetchObject ( 'Veiculo' );

	}

	public function buscar_foto ( $id, $horario ) {
		
		$sqlBusca = "SELECT id, :horario FROM veiculos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlBusca );

		$query -> execute ([
			':horario' => $horario,
			'id' => $id,
		]);

		return $query -> fetchObject ( 'Veiculo' );

	}

	public function remover_foto_entrada ( $id ) {
		
		$sqlEditar = "UPDATE veiculos SET
			foto_entrada = ''
		WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlEditar );

		$query -> execute ([
			'id' => $id,
		]);

	}

	public function remover_foto_saida ( $id ) {
		
		$sqlEditar = "UPDATE veiculos SET
			foto_saida = ''
		WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlEditar );

		$query -> execute ([
			'id' => $id,
		]);
		
	}
}
