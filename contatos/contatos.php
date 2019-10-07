<?php  

session_start ( );

require 'banco.php';
require 'ajudantes.php';

if ( !empty ( $_GET['nome'] ) ) {
	$contato = [];

	$contato['nome'] = $_GET['nome'] ?? '';
	$contato['telefone'] = $_GET['telefone'] ?? '';
	$contato['email'] = $_GET['email'] ?? '';
	$contato['descricao'] = $_GET['descricao'] ?? '';
	$contato['data'] = $_GET['data'] ?? '';
	$contato['favorito'] = isset ( $_GET['favorito'] ) ? 1 : 0;

	gravar_contato ( $conexao, $contato );
	
}

$lista_contatos = buscar_contatos ( $conexao );

include 'template.php';
