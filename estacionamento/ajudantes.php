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

function tem_post ( ) {

	if ( count ( $_POST ) > 0 ) {
		return true;
	}

	return false;
	
}

function validar_placa ( $placa ) {

	$padrao = '/^[A-Z]{3}\-[0-9]{4}$/';
	$resultado = preg_match ( $padrao, $placa );

	return ( $resultado == 1 );
}

function tratar_foto ( $foto ) {

	if ( $foto['type'] == 'image/gif' OR $foto['type'] == 'image/jpeg' OR $foto['type'] == 'image/pjpeg' 
		OR $foto['type'] == 'image/png') {

		move_uploaded_file ( $foto['tmp_name'], "fotos/{$foto['name']}" );
		return true;		
	} else {
		return false;
	}
	
}
