<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';

if ( isset ( $_GET['id'] ) ) {
	$veiculo = buscar_veiculo ( $conexao, $_GET['id'] );
	$fotos = buscar_fotos ( $conexao, $veiculo['id'] );
	enviar_email ( $veiculo, $fotos );
}

header ( 'Location: veiculos.php' );
