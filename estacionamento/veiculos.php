<?php  

session_start ( );

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

if ( !empty ( $_GET['placa'] ) ) {
	$veiculo = [];

	$veiculo['placa'] = $_GET['placa'] ?? '';
	$veiculo['marca'] = $_GET['marca'] ?? '';
	$veiculo['modelo'] = $_GET['modelo'] ?? '';
	$veiculo['hora_entrada'] = $_GET['hora_entrada'] ?? '';
	$veiculo['hora_saida'] = $_GET['hora_saida'] ?? '';
	
	gravar_veiculo ( $conexao, $veiculo );

	header ( 'Location: veiculos.php' );
	die ( );
	
}

$lista_veiculos = buscar_veiculos ( $conexao );

$veiculo = [
	'id' => 0,
	'placa' => '',
	'marca' => '',
	'modelo' => '',
	'hora_entrada' => '',
	'hora_saida' => ''
];

include 'template.php';
