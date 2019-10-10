<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';

if ( isset ( $_GET['id'] ) ) {
	$contato = buscar_contato ( $conexao, $_GET['id'] );
	$fotos = buscar_fotos ( $conexao, $contato['id'] );
	enviar_email ( $contato, $fotos );
}

header ( 'Location: contatos.php' );
