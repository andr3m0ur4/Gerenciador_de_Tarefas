<?php 

require 'config.php';
include 'banco.php';

$foto = buscar_foto ( $conexao, $_GET['id'] );
remover_foto ( $conexao, $foto['id'] );
unlink ( 'fotos/' . $foto['arquivo'] );

header ( 'Location: contato.php?id=' . $foto['contato_id'] );
