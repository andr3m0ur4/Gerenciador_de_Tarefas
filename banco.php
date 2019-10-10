<?php  

$dbServidor = '127.0.0.1';
$dbUsuario = 'sistematarefas';
$dbSenha = 'sistema';
$dbBanco = 'tarefas';

$conexao = mysqli_connect ( $dbServidor, $dbUsuario, $dbSenha, $dbBanco );

if ( mysqli_connect_errno ( $conexao ) ) {
	echo "Problemas para conectar no banco. Erro: ";
	echo mysqli_connect_error ( );
	die ( );
}

function buscar_tarefas ( $conexao ) {

	$sqlBusca = 'SELECT * FROM tarefas';
	$resultado = mysqli_query ( $conexao, $sqlBusca );

	$tarefas = [];

	while ( $tarefa = mysqli_fetch_assoc ( $resultado ) ) {
		$tarefas[] = $tarefa;
	}

	return $tarefas;
}

function gravar_tarefa ( $conexao, $tarefa ) {

	$sqlGravar = "
		INSERT INTO tarefas 
		(nome, descricao, prioridade, prazo, concluida)
		VALUES
		(
			'{$tarefa['nome']}',
			'{$tarefa['descricao']}',
			{$tarefa['prioridade']},
			'{$tarefa['prazo']}',
			{$tarefa['concluida']}
		)
	";

	mysqli_query ( $conexao, $sqlGravar );
}

function buscar_tarefa ( $conexao, $id ) {

	$sqlBusca = "SELECT * FROM tarefas WHERE id = {$id}";
	$resultado = mysqli_query ( $conexao, $sqlBusca );
	return mysqli_fetch_assoc ( $resultado );

}

function editar_tarefa ( $conexao, $tarefa ) {

	$sqlEditar = "
		UPDATE tarefas SET
			nome = '{$tarefa['nome']}',
			descricao = '{$tarefa['descricao']}',
			prioridade = {$tarefa['prioridade']},
			prazo = '{$tarefa['prazo']}',
			concluida = {$tarefa['concluida']}
		WHERE id = {$tarefa['id']}
	";

	mysqli_query ( $conexao, $sqlEditar );

}

function remover_tarefa ( $conexao, $id ) {

	$sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";

	mysqli_query ( $conexao, $sqlRemover );
	
}

function gravar_anexo ( $conexao, $anexo ) {

	$sqlGravar = "INSERT INTO anexos
		(tarefa_id, nome, arquivo)
		VALUES
		(
			{$anexo['tarefa_id']},
			'{$anexo['nome']}',
			'{$anexo['arquivo']}'
		)
	";

	mysqli_query ( $conexao, $sqlGravar );
	
}

function buscar_anexos ( $conexao, $tarefa_id ) {

	$sql = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
	$resultado = mysqli_query ( $conexao, $sql );

	$anexos = [];

	while ( $anexo = mysqli_fetch_assoc ( $resultado ) ) {
		$anexos[] = $anexo;
	}

	return $anexos;

}

function buscar_anexo ( $conexao, $id ) {

	$sqlBusca = "SELECT * FROM anexos WHERE id = {$id}";
	$resultado = mysqli_query ( $conexao, $sqlBusca );

	return mysqli_fetch_assoc ( $resultado );
}

function remover_anexo ( $conexao, $id ) {

	$sqlRemover = "DELETE FROM anexos WHERE id = {$id}";

	mysqli_query ( $conexao, $sqlRemover );
	
}
