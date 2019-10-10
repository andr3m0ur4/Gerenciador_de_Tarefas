<?php

include 'banco.php';
include 'ajudantes.php';

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	// upload das fotos
	$id = $_POST['id'];
	$foto_entrada = $_POST['foto_entrada'];
	$foto_saida = $_POST['foto_saida'];

	if ( isset ( $_FILES['foto_entrada'] ) OR isset ( $_FILES['foto_saida'] ) ) {
		if ( !empty ( $_FILES['foto_entrada']['name'] ) ) {
			if ( tratar_foto ( $_FILES['foto_entrada'] ) ) {
				$foto_entrada = $_FILES['foto_entrada']['name'];
			} else {
				$tem_erros = true;
				$erros_validacao['foto_entrada'] = 'Envie fotos nos formatos jpg, png ou gif';
			}
		}
		if ( !empty ( $_FILES['foto_saida']['name'] ) ) {
			if ( tratar_foto ( $_FILES['foto_saida'] ) ) {
				$foto_saida = $_FILES['foto_saida']['name'];
			} else {
				$tem_erros = true;
				$erros_validacao['foto_saida'] = 'Envie fotos nos formatos jpg, png ou gif';
			}
		}
	} else {
		$tem_erros = true;
		$erros_validacao['foto'] = 'Você deve adicionar uma foto do veículo';
	}

	$foto = [];
	$foto['id'] = $id;
	$foto['foto_entrada'] = $foto_entrada;
	$foto['foto_saida'] = $foto_saida;
	
	if ( !$tem_erros ) {
		gravar_foto ( $conexao, $foto );
	}
}

$veiculo = buscar_veiculo ( $conexao, $_GET['id'] );
$fotos = buscar_fotos ( $conexao, $_GET['id'] );
$foto_entrada = $fotos['foto_entrada'];
$foto_saida = $fotos['foto_saida'];

include 'template_veiculo.php';
