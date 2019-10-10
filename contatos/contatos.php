<?php  

require 'config.php';
require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	$contato = [];

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
		gravar_contato ( $conexao, $contato );

		header ( 'Location: contatos.php' );
		die ( );
	}
	
}

if ( !isset ( $_GET['favoritos'] ) ) {
	$lista_contatos = buscar_contatos ( $conexao );
} else {
	$lista_contatos = buscar_contatos_favoritos ( $conexao );
}

$contato = [
	'id' => 0,
	'nome' => $_POST['nome'] ?? '',
	'telefone' => $_POST['telefone'] ?? '',
	'email' => $_POST['email'] ?? '',
	'descricao' => $_POST['descricao'] ?? '',
	'data_nascimento' => $_POST['data'] ?? '',
	'favorito' => $_POST['favorito'] ?? ''
];

include 'template.php';
