<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';
require 'classes/Contato.php';
require 'classes/Foto.php';
require 'classes/RepositorioContatos.php';

$repositorio_contatos = new RepositorioContatos ( $conexao );
$contato = $repositorio_contatos -> buscar ( $_GET['id'] );

$exibir_tabela = false;

$tem_erros = false;
$erros_validacao = [];

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
		$repositorio_contatos -> atualizar ( $contato );

		header ( 'Location: contatos.php' );
		die ( );
	}
	
}

include 'template.php';
