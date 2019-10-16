<?php  

require 'config.php';
require 'banco.php';
require 'ajudantes.php';
require 'classes/Contato.php';
require 'classes/Foto.php';
require 'classes/RepositorioContatos.php';

$repositorio_contatos = new RepositorioContatos ( $pdo );

$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = [];

$contato = new Contato ( );

if ( tem_post ( ) ) {
	
	$contato -> setNome ( $_POST['nome'] ?? '' );
	if ( empty ( $contato -> getNome ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['nome'] = 'O nome do contato é obrigatório!';
	}

	$contato -> setTelefone ( $_POST['telefone'] ?? '' );
	if ( empty ( $contato -> getTelefone ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['telefone'] = 'O telefone do contato é obrigatório!';
	} else if ( !validar_telefone ( $contato -> getTelefone ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['telefone'] = 'O telefone do contato não é válido!';
	}

	$contato -> setEmail ( $_POST['email'] ?? '' );
	if ( empty ( $contato -> getEmail ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['email'] = 'O email do contato é obrigatório!';
	}

	$contato -> setDescricao ( $_POST['descricao'] ?? '' );
	$contato -> setDataNascimento ( $_POST['data'] ?? '' );
	if ( !empty ( $contato -> getDataNascimento ( ) ) AND !validar_data ( $contato -> getDataNascimento ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['data'] = 'A data de nascimento não é uma data válida!';
	}

	$contato -> setFavorito ( isset ( $_POST['favorito'] ) ? true : false );

	if ( !$tem_erros ) {
		$repositorio_contatos -> salvar ( $contato );

		header ( 'Location: contatos.php' );
		die ( );
	}
	
}

if ( !isset ( $_GET['favoritos'] ) ) {
	$contatos = $repositorio_contatos -> buscar ( );
} else {
	$contatos = $repositorio_contatos -> buscar ( null, 1 );
}

include 'template.php';
