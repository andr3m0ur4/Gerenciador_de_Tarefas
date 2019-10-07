<?php  

$dbServidor = '127.0.0.1';
$dbUsuario = 'sistemacontatos';
$dbSenha = 'sistema';
$dbBanco = 'contatos';

$conexao = mysqli_connect ( $dbServidor, $dbUsuario, $dbSenha, $dbBanco );

if ( mysqli_connect_errno ( $conexao ) ) {
	echo "Problemas para conectar no banco. Erro: ";
	echo mysqli_connect_error ( );
	die ( );
}

function buscar_contatos ( $conexao ) {

	$sqlBusca = 'SELECT * FROM contatos';
	$resultado = mysqli_query ( $conexao, $sqlBusca );

	$contatos = [];

	while ( $contato = mysqli_fetch_assoc ( $resultado ) ) {
		$contatos[] = $contato;
	}

	return $contatos;
}

function gravar_contato ( $conexao, $contato ) {

	$sqlGravar = "
		INSERT INTO contatos
		(nome, telefone, email, descricao, data_nascimento, favorito)
		VALUES
		(
			'{$contato['nome']}',
			'{$contato['telefone']}',
			'{$contato['email']}',
			'{$contato['descricao']}',
			'{$contato['data']}',
			{$contato['favorito']}
		)
	";

	mysqli_query ( $conexao, $sqlGravar );
}
