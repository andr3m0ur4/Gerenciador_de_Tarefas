<?php 

require 'config.php';
require 'banco.php';
require 'classes/Veiculo.php';
require 'classes/RepositorioVeiculos.php';

$repositorio_veiculos = new RepositorioVeiculos ( $pdo );

if ( isset ( $_GET['entrada'] ) ) {
	$veiculo = $repositorio_veiculos -> buscar_foto ( $_GET['id'], 'foto_entrada' );
	$repositorio_veiculos -> remover_foto_entrada ( $veiculo -> getId ( ) );
	unlink ( 'fotos/' . $veiculo -> getFotoEntrada ( ) );
} else if ( isset ( $_GET['saida'] ) ) {
	$veiculo = $repositorio_veiculos -> buscar_foto ( $_GET['id'], 'foto_saida' );
	$repositorio_veiculos -> remover_foto_saida ( $veiculo -> getId ( ) );
	unlink ( 'fotos/' . $veiculo -> getFotoSaida ( ) );
}

header ( 'Location: veiculo.php?id=' . $veiculo -> getId ( ) );
