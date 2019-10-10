<?php 

include 'banco.php';

if ( isset ( $_GET['entrada'] ) ) {
	$foto = buscar_foto ( $conexao, $_GET['id'], 'foto_entrada' );
	remover_foto_entrada ( $conexao, $foto['id'] );
	unlink ( 'fotos/' . $foto['foto_entrada'] );
} else if ( isset ( $_GET['saida'] ) ) {
	$foto = buscar_foto ( $conexao, $_GET['id'], 'foto_saida' );
	remover_foto_saida ( $conexao, $foto['id'] );
	unlink ( 'fotos/' . $foto['foto_saida'] );
}

header ( 'Location: veiculo.php?id=' . $foto['id'] );
