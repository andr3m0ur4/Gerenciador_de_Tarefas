<?php 

require 'config.php';
require 'banco.php';
require 'ajudantes.php';
require 'classes/Contato.php';
require 'classes/Foto.php';
require 'classes/RepositorioContatos.php';

$repositorio_contatos = new RepositorioContatos ( $conexao );

if ( isset ( $_GET['id'] ) ) {
	$contato = $repositorio_contatos -> buscar ( $_GET['id'] );
	enviar_email ( $contato );
}

header ( 'Location: contatos.php' );
