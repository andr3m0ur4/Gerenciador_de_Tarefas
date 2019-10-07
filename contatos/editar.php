<?php 

session_start ( );

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = false;

if ( !empty ( $_GET['nome'] ) ) {
	$contato = [];

	$contato['id'] = $_GET['id'];
	$contato['nome'] = $_GET['nome'] ?? '';
	$contato['telefone'] = $_GET['telefone'] ?? '';
	$contato['email'] = $_GET['email'] ?? '';
	$contato['descricao'] = $_GET['descricao'] ?? '';
	$contato['data'] = $_GET['data'] ?? '';
	$contato['favorito'] = isset ( $_GET['favorito'] ) ? 1 : 0;

	editar_contato ( $conexao, $contato );

	header ( 'Location: contatos.php' );
	die ( );
	
}

$contato = buscar_contato ( $conexao, $_GET['id'] );

include 'template.php';
