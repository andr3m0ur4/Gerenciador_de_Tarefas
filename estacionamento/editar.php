<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';
require 'classes/Veiculo.php';
require 'classes/RepositorioVeiculos.php';

$repositorio_veiculos = new RepositorioVeiculos ( $conexao );

$veiculo = $repositorio_veiculos -> buscar ( $_GET['id'] );

$exibir_tabela = false;

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	
	$veiculo -> setPlaca ( $_POST['placa'] ?? '' );
	if ( empty ( $veiculo -> getPlaca ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['placa'] = 'A placa do veículo é obrigatória!';
	} else if ( !validar_placa ( $veiculo -> getPlaca ( ) ) ) {
		$tem_erros = true;
		$erros_validacao['placa'] = 'A placa do veículo não é válida!';
	}

	$veiculo -> setMarca ( $_POST['marca'] ?? '' );
	$veiculo -> setModelo ( $_POST['modelo'] ?? '' );
	$veiculo -> setHoraEntrada ( $_POST['hora_entrada'] ?? '' );
	$veiculo -> setHoraSaida ( $_POST['hora_saida'] ?? '' );
	
	if ( !$tem_erros ) {
		$repositorio_veiculos -> atualizar ( $veiculo );

		header ( 'Location: veiculos.php' );
		die ( );
	}
	
}

include 'template.php';
