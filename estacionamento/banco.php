<?php  

$dbServidor = '127.0.0.1';
$dbUsuario = 'sistemaestacionamento';
$dbSenha = 'sistema';
$dbBanco = 'estacionamento';

$conexao = mysqli_connect ( $dbServidor, $dbUsuario, $dbSenha, $dbBanco );

if ( mysqli_connect_errno ( $conexao ) ) {
	echo "Problemas para conectar no banco. Erro: ";
	echo mysqli_connect_error ( );
	die ( );
}

function buscar_veiculos ( $conexao ) {

	$sqlBusca = 'SELECT * FROM veiculos';
	$resultado = mysqli_query ( $conexao, $sqlBusca );

	$veiculos = [];

	while ( $veiculo = mysqli_fetch_assoc ( $resultado ) ) {
		$veiculos[] = $veiculo;
	}

	return $veiculos;
}

function gravar_veiculo ( $conexao, $veiculo ) {

	$sqlGravar = "
		INSERT INTO veiculos
		(placa, marca, modelo, hora_entrada, hora_saida)
		VALUES
		(
			'{$veiculo['placa']}',
			'{$veiculo['marca']}',
			'{$veiculo['modelo']}',
			'{$veiculo['hora_entrada']}',
			'{$veiculo['hora_saida']}'
		)
	";

	mysqli_query ( $conexao, $sqlGravar );
}

function remover_veiculo ( $conexao, $id ) {

	$sqlRemover = "DELETE FROM veiculos WHERE id = {$id}";

	mysqli_query ( $conexao, $sqlRemover );
	
}
