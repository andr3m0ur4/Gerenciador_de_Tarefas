<?php  

$conexao = mysqli_connect ( BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO );

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

function buscar_veiculo ( $conexao, $id ) {

	$sqlBusca = "SELECT * FROM veiculos WHERE id = {$id}";
	$resultado = mysqli_query ( $conexao, $sqlBusca );

	return mysqli_fetch_assoc ( $resultado );
		
}

function editar_veiculo ( $conexao, $veiculo ) {

	$sqlEditar = "
		UPDATE veiculos SET
			placa = '{$veiculo['placa']}',
			marca = '{$veiculo['marca']}',
			modelo = '{$veiculo['modelo']}',
			hora_entrada = '{$veiculo['hora_entrada']}',
			hora_saida = '{$veiculo['hora_saida']}'
		WHERE id = {$veiculo['id']}
	";

	mysqli_query ( $conexao, $sqlEditar );
	
}

function gravar_foto ( $conexao, $foto ) {

	$sqlEditar = "
		UPDATE veiculos SET
			foto_entrada = '{$foto['foto_entrada']}',
			foto_saida = '{$foto['foto_saida']}'
		WHERE id = {$foto['id']}
	";

	mysqli_query ( $conexao, $sqlEditar );

}

function buscar_fotos ( $conexao, $id ) {

	$sqlBusca = "SELECT foto_entrada, foto_saida FROM veiculos WHERE id = {$id}";
	$resultado = mysqli_query ( $conexao, $sqlBusca );

	return mysqli_fetch_assoc ( $resultado );
		
}

function buscar_foto ( $conexao, $id, $foto ) {

	$sqlBusca = "SELECT id, $foto FROM veiculos WHERE id = {$id}";

	$resultado = mysqli_query ( $conexao, $sqlBusca );

	return mysqli_fetch_assoc ( $resultado );

}

function remover_foto_entrada ( $conexao, $id ) {

	$sqlEditar = "UPDATE veiculos SET
		foto_entrada = ''
	WHERE id = {$id}";

	mysqli_query ( $conexao, $sqlEditar );
	
}

function remover_foto_saida ( $conexao, $id ) {

	$sqlEditar = "UPDATE veiculos SET
		foto_saida = ''
	WHERE id = {$id}";

	mysqli_query ( $conexao, $sqlEditar );
	
}
