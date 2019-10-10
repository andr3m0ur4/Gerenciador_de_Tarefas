<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = false;

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	$contato = [];

	$contato['id'] = $_POST['id'];
	$contato['nome'] = $_POST['nome'] ?? '';
	if ( empty ( $contato['nome'] ) ) {
		$tem_erros = true;
		$erros_validacao['nome'] = 'O nome do contato é obrigatório!';
	}

	$contato['telefone'] = $_POST['telefone'] ?? '';
	if ( empty ( $contato['telefone'] ) ) {
		$tem_erros = true;
		$erros_validacao['telefone'] = 'O telefone do contato é obrigatório!';
	} else if ( !validar_telefone ( $contato['telefone'] ) ) {
		$tem_erros = true;
		$erros_validacao['telefone'] = 'O telefone do contato não é válido!';
	}

	$contato['email'] = $_POST['email'] ?? '';
	if ( empty ( $contato['email'] ) ) {
		$tem_erros = true;
		$erros_validacao['email'] = 'O email do contato é obrigatório!';
	}

	$contato['descricao'] = $_POST['descricao'] ?? '';
	$contato['data'] = $_POST['data'] ?? '';
	if ( !empty ( $contato['data'] ) AND !validar_data ( $contato['data'] ) ) {
		$tem_erros = true;
		$erros_validacao['data'] = 'A data de nascimento não é uma data válida!';
	}

	$contato['favorito'] = isset ( $_POST['favorito'] ) ? 1 : 0;

	if ( !$tem_erros ) {
		editar_contato ( $conexao, $contato );

		header ( 'Location: contatos.php' );
		die ( );
	}
	
}

$contato = buscar_contato ( $conexao, $_GET['id'] );

$contato['nome'] = $_POST['nome'] ?? $contato['nome'];
$contato['telefone'] = $_POST['telefone'] ?? $contato['telefone'];
$contato['email'] = $_POST['email'] ?? $contato['email'];
$contato['descricao'] = $_POST['descricao'] ?? $contato['descricao'];
$contato['data_nascimento'] = $_POST['data'] ?? $contato['data_nascimento'];
$contato['favorito'] = $_POST['favorito'] ?? $contato['favorito'];

include 'template.php';
