<?php

include 'banco.php';
include 'ajudantes.php';

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	// upload das fotos
	$contato_id = $_POST['contato_id'];

	if ( !isset ( $_FILES['foto'] ) ) {
		$tem_erros = true;
		$erros_validacao['foto'] = 'Você deve selecionar uma foto para upload';
	} else {
		if ( tratar_foto ( $_FILES['foto'] ) ) {
			$nome = $_FILES['foto']['name'];
			$foto = [
				'contato_id' => $contato_id,
				'nome' => substr ( $nome, 0, -4),
				'arquivo' => $nome
			];
		} else {
			$tem_erros = true;
			$erros_validacao['foto'] = 'Envie fotos nos formatos jpg, png ou gif';
		}
	}

	if ( !$tem_erros ) {
		gravar_foto ( $conexao, $foto );
	}
}

$contato = buscar_contato ( $conexao, $_GET['id'] );
$fotos = buscar_fotos ( $conexao, $_GET['id'] );

include 'template_contato.php';
