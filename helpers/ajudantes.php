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

	$partes = explode ( '/', $data );

	if ( count ( $partes ) != 3 ) {
		return $data;
	}

	$objeto_data = DateTime::createFromFormat ( 'd/m/Y', $data );

	return $objeto_data -> format ( 'Y-m-d' );

}

function traduz_data_br_para_objeto ( $data ) {

	if ( $data == '' ) {
		return '';
	}

	$dados = explode ( '/', $data );

	if ( count ( $dados ) != 3 ) {
		return $data;
	}

	$objeto_data = DateTime::createFromFormat ( 'd/m/Y', $data );

	return $objeto_data -> format ( 'Y-m-d' );

}

function traduz_data_para_exibir ( $data ) {

	if ( $data == '' OR $data == '0000-00-00' ) {
		return '';
	}

	$partes = explode ( '-', $data );

	if ( count ( $partes ) != 3 ) {
		return $data;
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

function tem_post ( ) {

	if ( count ( $_POST ) > 0 ) {
		return true;
	}

	return false;
	
}

function validar_data ( $data ) {

	$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
	$resultado = preg_match ( $padrao, $data );

	if ( $resultado == 0 ) {
		return false;
	}

	$dados = explode ( '/', $data );

	$dia = $dados[0];
	$mes = $dados[1];
	$ano = $dados[2];

	$resultado = checkdate ( $mes, $dia, $ano );

	return $resultado;

}

function tratar_anexo ( $anexo ) {

	$padrao = '/^.+(\.pdf$|\.zip$)$/';
	$resultado = preg_match ( $padrao, $anexo['name'] );

	if ( $resultado == 0 ) {
		return false;
	}

	move_uploaded_file ( $anexo['tmp_name'], __DIR__ . "/../anexos/{$anexo['name']}" );

	return true;
	
}

function enviar_email ( Tarefa $tarefa ) {

	// Acessar a aplicação de e-mails;
	include __DIR__ . '/../libs/PHPMailer/PHPMailerAutoload.php';

	// Acessar o servidor de e-mails;
	// Fazer a autenticação com usuário e senha;
	// Usar a opção para escrever um e-mail;
	$email = new PHPMailer ( );	// Esta é a criação do objeto

	$email -> isSMTP ( );
	$email -> Host = "smtp.gmail.com";
	$email -> Port = 587;
	$email -> SMTPSecure = 'tls';
	$email -> SMTPAuth = true;
	$email -> Username = 'mouraandre2500@gmail.com';
	$email -> Password = '$andr3_m0ur4';
	$email -> setFrom ( "mouraandre2500@gmail.com", "Avisador de Tarefas" );

	// Digitar o e-mail	do destinatário;
	$email -> addAddress ( EMAIL_NOTIFICACAO );

	// Digitar o assunto do	e-mail;
	$email -> Subject = "Aviso de tarefa: {$tarefa -> getNome ( )}";

	// Escrever	o corpo	do e-mail;
	$corpo = preparar_corpo_email ( $tarefa );
	$email -> msgHTML ( $corpo );

	// Adicionar os	anexos,	quando necessário;
	foreach ( $tarefa -> getAnexos ( ) as $anexo ) {
		$email -> addAttachment ( __DIR__ . "/../anexos/{$anexo -> getArquivo ( )}" );
	}

	// Usar	a opção	de enviar o	e-mail.
	if ( !$email -> send ( ) ) {
		// Salvar o erro em um arquivo de log
		gravar_log ( $email -> ErrorInfo );
	}

}

function preparar_corpo_email ( Tarefa $tarefa ) {

	// Aqui vamos pegar o conteúdo processado do arquivo template_email.php

	// Falar para o PHP que não é para enviar o resultado do processamento para o navegador:
	ob_start ( );

	// Incluir o arquivo template_email.php:
	include __DIR__ . '/../views/template_email.php';

	// Guardar o conteúdo do arquivo em uma variável:
	$corpo = ob_get_contents ( );

	// Falar para o PHP que ele pode voltar a mandar conteúdos para o nevegador.
	ob_end_clean ( );

	return $corpo;

}

function gravar_log ( $mensagem ) {

	$datahora = date ( "Y-m-d H:i:s" );
	$mensagem = "{$datahora} {$mensagem}\n";

	file_put_contents ( 'mensagens.log', $mensagem, FILE_APPEND );
}
