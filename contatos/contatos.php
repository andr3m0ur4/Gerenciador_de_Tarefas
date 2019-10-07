<?php  

session_start ( );

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

if ( !empty ( $_GET['nome'] ) ) {
	$contato = [];

	$contato['nome'] = $_GET['nome'] ?? '';
	$contato['telefone'] = $_GET['telefone'] ?? '';
	$contato['email'] = $_GET['email'] ?? '';
	$contato['descricao'] = $_GET['descricao'] ?? '';
	$contato['data'] = $_GET['data'] ?? '';
	$contato['favorito'] = isset ( $_GET['favorito'] ) ? 1 : 0;

	gravar_contato ( $conexao, $contato );

	header ( 'Location: contatos.php' );
	die ( );
	
}

if ( !isset ( $_GET['favoritos'] ) ) {
	$lista_contatos = buscar_contatos ( $conexao );
} else {
	$lista_contatos = buscar_contatos_favoritos ( $conexao );
}

$contato = [
	'id' => 0,
	'nome' => '',
	'telefone' => '',
	'email' => '',
	'descricao' => '',
	'data_nascimento' => '',
	'favorito' => ''
];

include 'template.php';
