<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';
require 'classes/Veiculo.php';
require 'classes/RepositorioVeiculos.php';

$repositorio_veiculos = new RepositorioVeiculos ( $conexao );

if ( isset ( $_GET['id'] ) ) {
	$veiculo = $repositorio_veiculos -> buscar ( $_GET['id'] );
	enviar_email ( $veiculo );
}

header ( 'Location: veiculos.php' );
