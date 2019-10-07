<?php 

$tarefa = [];

$tarefa['id'] = $_GET['id'] ?? 0;

$tarefa['nome'] = $_GET['nome'];

if ( array_key_exists ( 'descricao', $_GET ) ) {
	$tarefa['descricao'] = $_GET['descricao'];
} else {
	$tarefa['descricao'] = '';
}

if ( array_key_exists ( 'prazo', $_GET ) ) {
	$tarefa['prazo'] = traduz_data_para_banco ( $_GET['prazo'] );
} else {
	$tarefa['prazo'] = '';
}

$tarefa['prioridade'] = $_GET['prioridade'];

if ( array_key_exists ( 'concluida', $_GET ) ) {
	$tarefa['concluida'] = 1;
} else {
	$tarefa['concluida'] = 0;
}
