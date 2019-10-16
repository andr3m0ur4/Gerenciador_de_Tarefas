<?php 

require 'config.php';
include 'banco.php';
require 'classes/Foto.php';
require 'classes/RepositorioContatos.php';

$repositorio_contatos = new RepositorioContatos ( $pdo );

$foto = $repositorio_contatos -> buscar_foto ( $_GET['id'] );
$repositorio_contatos -> remover_foto ( $foto -> getId ( ) );
unlink ( 'fotos/' . $foto -> getArquivo ( ) );

header ( 'Location: contato.php?id=' . $foto -> getContatoId ( ) );
