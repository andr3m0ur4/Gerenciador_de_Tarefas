<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	$tarefa = [];

	if ( array_key_exists ( 'nome', $_POST ) && strlen ( $_POST['nome'] ) > 0 ) {
		$tarefa['nome'] = $_POST['nome'];
	} else {
		$tem_erros = true;
		$erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
	}

	if ( array_key_exists ( 'descricao', $_POST ) ) {
		$tarefa['descricao'] = $_POST['descricao'];
	} else {
		$tarefa['descricao'] = '';
	}

	if ( array_key_exists ( 'prazo', $_POST ) && strlen ( $_POST['prazo'] ) > 0 ) {
		if ( validar_data ( $_POST['prazo'] ) ) {
			$tarefa['prazo'] = traduz_data_para_banco ( $_POST['prazo'] );
		} else {
			$tem_erros = true;
			$erros_validacao['prazo'] = 'O prazo não é uma data válida!';
		}
	} else {
		$tarefa['prazo'] = '';
	}

	$tarefa['prioridade'] = $_POST['prioridade'];

	if ( array_key_exists ( 'concluida', $_POST ) ) {
		$tarefa['concluida'] = 1;
	} else {
		$tarefa['concluida'] = 0;
	}

	if ( !$tem_erros ) {
		gravar_tarefa ( $conexao, $tarefa );

		if ( array_key_exists ( 'lembrete', $_POST ) && $_POST['lembrete'] == '1' ) {
			enviar_email ( $tarefa );
		}

		header ( 'Location: tarefas.php' );
		die ( );
	}
}

$lista_tarefas = buscar_tarefas ( $conexao );

$tarefa = [
	'id' => 0,
	'nome' => $_POST['nome'] ?? '',
	'descricao' => $_POST['descricao'] ?? '',
	'prazo' => traduz_data_para_banco ( $_POST['prazo'] ?? '' ),
	'prioridade' => $_POST['prioridade'] ?? 1,
	'concluida' => $_POST['concluida'] ?? ''
];

include 'template.php';
