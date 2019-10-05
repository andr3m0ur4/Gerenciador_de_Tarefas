<?php  

session_start ( );

if ( !empty ( $_GET['nome'] ) ) {
	$contato = [];

	$contato['nome'] = $_GET['nome'] ?? '';
	$contato['telefone'] = $_GET['telefone'] ?? '';
	$contato['email'] = $_GET['email'] ?? '';
	$contato['descricao'] = $_GET['descricao'] ?? '';
	$contato['data'] = $_GET['data'] ?? '';
	$contato['favorito'] = $_GET['favorito'] ?? '';

	$_SESSION['lista_contatos'][] = $contato;
	
}

$lista_contatos = [];

if ( array_key_exists ( 'lista_contatos', $_SESSION ) ) {
	$lista_contatos = $_SESSION['lista_contatos'];
}

include 'template.php';
