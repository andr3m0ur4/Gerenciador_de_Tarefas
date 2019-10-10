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

function validar_telefone ( $telefone ) {

	$padrao = '/^\([0-9]{2}\)[0-9]{4,5}\-[0-9]{4}$/';
	$resultado = preg_match ( $padrao, $telefone );

	return ( $resultado == 1 );
}

function validar_data ( $data ) {

	$padrao = '/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/';
	$resultado = preg_match ( $padrao, $data );

	if ( $resultado == 0 ) {
		return false;
	}

	$dados = explode ( '-', $data );

	$dia = $dados[2];
	$mes = $dados[1];
	$ano = $dados[0];

	$resultado = checkdate ( $mes, $dia, $ano );

	return $resultado;

}

function tratar_foto ( $foto ) {

	$padrao = '/^.+(\.jpg|\.png|\.gif)$/';
	$resultado = preg_match ( $padrao, $foto['name'] );

	if ( $resultado == 0 ) {
		return false;
	}

	move_uploaded_file ( $foto['tmp_name'], "fotos/{$foto['name']}" );

	return true;
	
}
