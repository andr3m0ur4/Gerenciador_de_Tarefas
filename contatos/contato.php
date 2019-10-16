<?php

require 'config.php';
include 'banco.php';
include 'ajudantes.php';
require 'classes/Contato.php';
require 'classes/Foto.php';
require 'classes/RepositorioContatos.php';

$repositorio_contatos = new RepositorioContatos ( $pdo );

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	
	$contato_id = $_POST['contato_id'];

	if ( !isset ( $_FILES['foto'] ) ) {
		$tem_erros = true;
		$erros_validacao['foto'] = 'Você deve selecionar uma foto para upload';
	} else {
		$dados_foto = $_FILES['foto'];

		if ( tratar_foto ( $dados_foto ) ) {
			$foto = new Foto ( );
			$foto -> setContatoId ( $contato_id );
			$foto -> setNome ( substr ( $dados_foto['name'], 0, -4 ) );
			$foto -> setArquivo ( $dados_foto['name'] );
		} else {
			$tem_erros = true;
			$erros_validacao['foto'] = 'Envie fotos nos formatos jpg, png ou gif';
		}
	}

	if ( !$tem_erros ) {
		$repositorio_contatos -> salvar_foto ( $foto );
	}
}

$contato = $repositorio_contatos -> buscar ( $_GET['id'] );

include 'template_contato.php';
