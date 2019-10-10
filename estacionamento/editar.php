<?php 

session_start ( );

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = false;

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	$veiculo = [];

	$veiculo['id'] = $_POST['id'];
	$veiculo['placa'] = $_POST['placa'] ?? '';
	if ( empty ( $veiculo['placa'] ) ) {
		$tem_erros = true;
		$erros_validacao['placa'] = 'A placa do veículo é obrigatória!';
	} else if ( !validar_placa ( $veiculo['placa'] ) ) {
		$tem_erros = true;
		$erros_validacao['placa'] = 'A placa do veículo não é válida!';
	}

	$veiculo['marca'] = $_POST['marca'] ?? '';
	$veiculo['modelo'] = $_POST['modelo'] ?? '';
	$veiculo['hora_entrada'] = $_POST['hora_entrada'] ?? '';
	$veiculo['hora_saida'] = $_POST['hora_saida'] ?? '';
	
	if ( !$tem_erros ) {
		editar_veiculo ( $conexao, $veiculo );

		header ( 'Location: veiculos.php' );
		die ( );
	}
	
}

$veiculo = buscar_veiculo ( $conexao, $_GET['id'] );

$veiculo['placa'] = $_POST['placa'] ?? $veiculo['placa'];
$veiculo['marca'] = $_POST['marca'] ?? $veiculo['marca'];
$veiculo['modelo'] = $_POST['modelo'] ?? $veiculo['modelo'];
$veiculo['hora_entrada'] = $_POST['hora_entrada'] ?? $veiculo['hora_entrada'];
$veiculo['hora_saida'] = $_POST['hora_saida'] ?? $veiculo['hora_saida'];

include 'template.php';
