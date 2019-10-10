<?php  

require 'config.php';
require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = [];

if ( tem_post ( ) ) {
	$veiculo = [];

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
		gravar_veiculo ( $conexao, $veiculo );

		header ( 'Location: veiculos.php' );
		die ( );
	}
	
}

$lista_veiculos = buscar_veiculos ( $conexao );

$veiculo = [
	'id' => 0,
	'placa' => $_POST['placa'] ?? '',
	'marca' => $_POST['marca'] ?? '',
	'modelo' => $_POST['modelo'] ?? '',
	'hora_entrada' => $_POST['hora_entrada'] ?? '',
	'hora_saida' => $_POST['hora_saida'] ?? ''
];

include 'template.php';
