<?php 

session_start ( );

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

if ( array_key_exists ( 'nome', $_GET ) && $_GET['nome'] != '' ) {
	
	require 'base.php';

	gravar_tarefa ( $conexao, $tarefa );

	header ( 'Location: tarefas.php' );
	die ( );
}

$lista_tarefas = buscar_tarefas ( $conexao );

$tarefa = [
	'id' => 0,
	'nome' => '',
	'descricao' => '',
	'prazo' => '',
	'prioridade' => 1,
	'concluida' => ''
];

include 'template.php';
