<?php 

session_start ( );

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = false;

if ( array_key_exists ( 'nome', $_GET ) && $_GET['nome'] != '' ) {
	
	require 'base.php';

	editar_tarefa ( $conexao, $tarefa );

	header ( 'Location: tarefas.php' );
	die ( );
}

$tarefa = buscar_tarefa ( $conexao, $_GET['id'] );

include 'template.php';
