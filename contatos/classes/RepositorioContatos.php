<?php 

class RepositorioContatos {

	private $pdo;

	public function __construct ( PDO $pdo ) {

		$this -> pdo = $pdo;

	}

	public function buscar ( $contato_id = 0, $favorito = 0 ) {

		if ( $contato_id > 0 ) {
			return $this -> buscar_contato ( $contato_id );
		} else if ( $favorito == 1 ) {
			return $this -> buscar_contatos_favoritos ( );
		} else {
			return $this -> buscar_contatos ( );
		}
	}

	private function buscar_contatos ( ) {

		$sqlBusca = 'SELECT * FROM contatos';

		$resultado = $this -> pdo -> query ( $sqlBusca, PDO::FETCH_CLASS, 'Contato' );

		$contatos = [];

		foreach ( $resultado as $contato ) {
			$contato -> setFotos ( $this -> buscar_fotos ( $contato -> getId ( ) ) );
			$contatos[] = $contato;
		}

		return $contatos;

	}

	private function buscar_contato ( $id ) {
		
		$sqlBusca = "SELECT * FROM contatos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlBusca );

		$query -> execute ([
			'id' => $id,
		]);

		$contato = $query -> fetchObject ( 'Contato' );

		$contato -> setFotos ( $this -> buscar_fotos ( $contato -> getId ( ) ) );

		return $contato;

	}

	private function buscar_contatos_favoritos ( ) {

		$sqlBusca = 'SELECT * FROM contatos WHERE favorito = 1';

		$resultado = $this -> pdo -> query ( $sqlBusca, PDO::FETCH_CLASS, 'Contato' );

		$contatos = [];

		foreach ( $resultado as $contato ) {
			$contato -> setFotos ( $this -> buscar_fotos ( $contato -> getId ( ) ) );
			$contatos[] = $contato;
		}

		return $contatos;

	}

	public function salvar ( Contato $contato ) {
		
		$sqlGravar = "
			INSERT INTO contatos
			(nome, telefone, email, descricao, data_nascimento, favorito)
			VALUES
			(:nome, :telefone, :email, :descricao, :data_nascimento, :favorito)
		";

		$query = $this -> pdo -> prepare ( $sqlGravar );

		$query -> execute ([
			'nome' => strip_tags ( $contato -> getNome ( ) ),
			'telefone' => strip_tags ( $contato -> getTelefone ( ) ),
			'email' => strip_tags ( $contato -> getEmail ( ) ),
			'descricao' => strip_tags ( $contato -> getDescricao ( ) ),
			'data_nascimento' => $contato -> getDataNascimento ( ),
			'favorito' => ( $contato -> getFavorito ( ) ) ? 1 : 0,
		]);

	}

	public function atualizar ( Contato $contato ) {

		$sqlEditar = "
			UPDATE contatos SET
				nome = :nome',
				telefone = :telefone,
				email = :email,
				descricao = :descricao,
				data_nascimento = :data_nascimento,
				favorito = :favorito
			WHERE id = :id
		";

		$query -> $this -> pdo -> prepare ( $sqlEditar );

		$query -> execute ([
			'nome' => strip_tags ( $contato -> getNome ( ) ),
			'telefone' => strip_tags ( $contato -> getTelefone ( ) ),
			'email' => strip_tags ( $contato -> getEmail ( ) ),
			'descricao' => strip_tags ( $contato -> getDescricao ( ) ),
			'data_nascimento' => $contato -> getDataNascimento ( ),
			'favorito' => ( $contato -> getFavorito ( ) ) ? 1 : 0,
			'id' => $contato -> getId ( ),
		]);

	}

	public function remover ( $id ) {
		
		$sqlRemover = "DELETE FROM contatos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlRemover );

		$query -> execute ([
			'id' => $id,
		]);

	}

	public function salvar_foto ( Foto $foto ) {
		
		$sqlGravar = "
			INSERT INTO fotos
			(contato_id, nome, arquivo)
			VALUES
			(:contato_id, :nome, :arquivo)
		";

		$query = $this -> pdo -> prepare ( $sqlGravar );

		$query -> execute ([
			'contato_id' => $foto -> getContatoId ( ),
			'nome' => strip_tags ( $foto -> getNome ( ) ),
			'arquivo' => strip_tags ( $foto -> getArquivo ( ) ),
		]);

	}

	public function buscar_fotos ( $contato_id ) {
		
		$sqlBusca = "SELECT * FROM fotos WHERE contato_id = :contato_id";

		$query = $this -> pdo -> prepare ( $sqlBusca );

		$query -> execute ([
			'contato_id' => $contato_id,
		]);

		$fotos = [];

		while ( $foto = $query -> fetchObject ( 'Foto' ) ) {
			$fotos[] = $foto;
		}

		return $fotos;

	}

	public function buscar_foto ( $id ) {
		
		$sqlBusca = "SELECT * FROM fotos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlBusca );

		$query -> execute ([
			'id' => $id,
		]);

		return $query -> fetchObject ( 'Foto' );

	}

	public function remover_foto ( $id ) {
		
		$sqlRemover = "DELETE FROM fotos WHERE id = :id";

		$query = $this -> pdo -> prepare ( $sqlRemover );

		$query -> execute ([
			'id' => $id,
		]);

	}
}
