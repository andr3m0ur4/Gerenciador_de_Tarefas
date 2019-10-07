<?php  

session_start ( );

require 'banco.php';
require 'ajudantes.php';

if ( !empty ( $_GET['placa'] ) ) {
	$veiculo = [];

	$veiculo['placa'] = $_GET['placa'] ?? '';
	$veiculo['marca'] = $_GET['marca'] ?? '';
	$veiculo['modelo'] = $_GET['modelo'] ?? '';
	$veiculo['hora_entrada'] = $_GET['hora_entrada'] ?? '';
	$veiculo['hora_saida'] = $_GET['hora_saida'] ?? '';
	
	gravar_veiculo ( $conexao, $veiculo );
	
}

$lista_veiculos = buscar_veiculos ( $conexao );

include 'template.php';
