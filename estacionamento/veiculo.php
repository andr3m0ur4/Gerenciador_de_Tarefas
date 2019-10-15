<?php

require 'config.php';
require 'banco.php';
require 'ajudantes.php';
require 'classes/Veiculo.php';
require 'classes/RepositorioVeiculos.php';

$repositorio_veiculos = new RepositorioVeiculos ( $conexao );
$veiculo = $repositorio_veiculos -> buscar ( $_GET['id'] );

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	
	$id = $_POST['id'];
	$foto_entrada = $_POST['foto_entrada'];
	$foto_saida = $_POST['foto_saida'];

	if ( !empty ( $_FILES['foto_entrada']['name'] ) OR !empty ( $_FILES['foto_saida']['name'] ) ) {
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
	
	$veiculo -> setFotoEntrada ( $foto_entrada );
	$veiculo -> setFotoSaida ( $foto_saida );
	
	if ( !$tem_erros ) {
		$repositorio_veiculos -> salvar_foto ( $veiculo );
	}
}

include 'template_veiculo.php';
