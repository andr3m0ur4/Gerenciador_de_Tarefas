<?php 

function traduz_data_para_banco ( $data ) {
	if ( $data == '' ) {
		return '';
	}

	$objeto_data = DateTime::createFromFormat ( 'd/m/Y', $data );

	return $objeto_data -> format ( 'Y-m-d' );
}

function traduz_data_para_exibir ( $data ) {
	if ( $data == '' OR $data == '0000-00-00' ) {
		return '';
	}

	$objeto_data = DateTime::createFromFormat ( 'Y-m-d', $data );

	return $objeto_data -> format ( 'd/m/Y' );
}

function traduz_hora_para_exibir ( $hora ) {
	if ( $hora == '' OR $hora == '00:00:00' ) {
		return '';
	}

	$objeto_hora = DateTime::createFromFormat ( 'H:i:s', $hora );

	return $objeto_hora -> format ( 'H:i' );
}

function traduz_favorito ( $favorito ) {
	if ( $favorito == 1 ) {
		return 'Sim';
	}

	return 'Não';
}
