<?php 

class RepositorioContatos {

	private $conexao;

	public function __construct ( $conexao ) {

		$this -> conexao = $conexao;

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

		$resultado = $this -> conexao -> query ( $sqlBusca );

		$contatos = [];

		while ( $contato = $resultado -> fetch_object ( 'Contato' ) ) {
			$contato -> setFotos ( $this -> buscar_fotos ( $contato -> getId ( ) ) );
			$contatos[] = $contato;
		}

		return $contatos;

	}

	private function buscar_contato ( $id ) {

		$sqlBusca = "SELECT * FROM contatos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		$contato = $resultado -> fetch_object ( 'Contato' );

		$contato -> setFotos ( $this -> buscar_fotos ( $contato -> getId ( ) ) );

		return $contato;

	}

	private function buscar_contatos_favoritos ( ) {

		$sqlBusca = 'SELECT * FROM contatos WHERE favorito = 1';

		$resultado = $this -> conexao -> query ( $sqlBusca );

		$contatos = [];

		while ( $contato = $resultado -> fetch_object ( 'Contato' ) ) {
			$contato -> setFotos ( $this -> buscar_fotos ( $contato -> getId ( ) ) );
			$contatos[] = $contato;
		}

		return $contatos;

	}

	public function salvar ( $contato ) {

		$nome = $contato -> getNome ( );
		$telefone = $contato -> getTelefone ( );
		$email = $contato -> getEmail ( );
		$descricao = $contato -> getDescricao ( );
		$data_nascimento = $contato -> getDataNascimento ( );
		$favorito = ( $contato -> getFavorito ( ) ) ? 1 : 0;

		$sqlGravar = "
			INSERT INTO contatos
			(nome, telefone, email, descricao, data_nascimento, favorito)
			VALUES
			(
				'{$nome}',
				'{$telefone}',
				'{$email}',
				'{$descricao}',
				'{$data_nascimento}',
				{$favorito}
			)
		";

		$this -> conexao -> query ( $sqlGravar );

	}

	public function atualizar ( $contato ) {

		$id = $contato -> getId ( );
		$nome = $contato -> getNome ( );
		$telefone = $contato -> getTelefone ( );
		$email = $contato -> getEmail ( );
		$descricao = $contato -> getDescricao ( );
		$data_nascimento = $contato -> getDataNascimento ( );
		$favorito = ( $contato -> getFavorito ( ) ) ? 1 : 0;

		$sqlEditar = "
			UPDATE contatos SET
				nome = '{$nome}',
				telefone = '{$telefone}',
				email = '{$email}',
				descricao = '{$descricao}',
				data_nascimento = '{$data_nascimento}',
				favorito = {$favorito}
			WHERE id = {$id}
		";

		$this -> conexao -> query ( $sqlEditar );

	}

	public function remover ( $id ) {

		$sqlRemover = "DELETE FROM contatos WHERE id = {$id}";

		$this -> conexao -> query ( $sqlRemover );
	}

	public function salvar_foto ( Foto $foto ) {

		$sqlGravar = "
			INSERT INTO fotos
			(contato_id, nome, arquivo)
			VALUES
			(
				{$foto -> getContatoId ( )},
				'{$foto -> getNome ( )}',
				'{$foto -> getArquivo ( )}'
			)
		";

		$this -> conexao -> query ( $sqlGravar );

	}

	public function buscar_fotos ( $contato_id ) {

		$sqlBusca = "SELECT * FROM fotos WHERE contato_id = {$contato_id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		$fotos = [];

		while ( $foto = $resultado -> fetch_object ( 'Foto' ) ) {
			$fotos[] = $foto;
		}

		return $fotos;

	}

	public function buscar_foto ( $id ) {

		$sqlBusca = "SELECT * FROM fotos WHERE id = {$id}";

		$resultado = $this -> conexao -> query ( $sqlBusca );

		return $resultado -> fetch_object ( 'Foto' );
	}

	public function remover_foto ( $id ) {

		$sqlRemover = "DELETE FROM fotos WHERE id = {$id}";

		$this -> conexao -> query ( $sqlRemover );

	}
}
