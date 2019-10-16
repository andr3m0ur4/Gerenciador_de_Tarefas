<?php 

require 'config.php';
require 'banco.php';
require 'classes/RepositorioContatos.php';

$repositorio_contatos = new RepositorioContatos ( $pdo );

$repositorio_contatos -> remover ( $_GET['id'] );

header ( 'Location: contatos.php' );
