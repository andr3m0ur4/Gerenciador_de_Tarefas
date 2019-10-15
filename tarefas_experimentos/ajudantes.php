<?php 

function traduz_prioridade ( $codigo ) {
	$prioridade = '';

	switch ( $codigo ) {
		case 1:
			$prioridade = 'Baixa';
				break;
		
		case 2:
			$prioridade = 'Média';
				break;

		case 3:
			$prioridade = 'Alta';
				break;
	}

	return $prioridade;
}

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

function traduz_concluida ( $concluida ) {
	if ( $concluida == 1 ) {
		return 'Sim';
	}

	return 'Não';
}
