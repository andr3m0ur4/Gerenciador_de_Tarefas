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
