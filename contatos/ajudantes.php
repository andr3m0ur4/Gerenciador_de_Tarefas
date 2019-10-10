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

function enviar_email ( $contato, $fotos = [] ) {

	// Acessar a aplicação de e-mails;
	require '../bibliotecas/PHPMailer/PHPMailerAutoload.php';

	// Acessar o servidor de e-mails;
	// Fazer a autenticação com usuário e senha;
	// Usar a opção para escrever um e-mail;
	$email = new PHPMailer ( );	// Esta é a criação do objeto

	$email -> isSMTP ( );
	$email -> CharSet = 'utf-8';
	$email -> Host = "smtp.gmail.com";
	$email -> Port = 587;
	$email -> SMTPSecure = 'tls';
	$email -> SMTPAuth = true;
	$email -> Username = USUARIO;
	$email -> Password = SENHA;
	$email -> setFrom ( EMAIL_REMETENTE, REMETENTE );

	// Digitar o e-mail	do destinatário;
	$email -> addAddress ( EMAIL_NOTIFICACAO );

	// Digitar o assunto do	e-mail;
	$email -> Subject = "Notificador de contato: {$contato['nome']}";

	// Escrever	o corpo	do e-mail;
	$corpo = preparar_corpo_email ( $contato, $fotos );
	$email -> msgHTML ( $corpo );

	// Adicionar os	anexos,	quando necessário;
	foreach ( $fotos as $foto ) {
		$email -> addAttachment ( "fotos/{$foto['arquivo']}" );
	}

	// Usar	a opção	de enviar o	e-mail.
	if ( !$email -> send ( ) ) {
		// Salvar o erro em um arquivo de log
		gravar_log ( $email -> ErrorInfo );
	}

}

function preparar_corpo_email ( $contato, $fotos ) {

	// Aqui vamos pegar o conteúdo processado do arquivo template_email.php

	// Falar para o PHP que não é para enviar o resultado do processamento para o navegador:
	ob_start ( );

	// Incluir o arquivo template_email.php:
	include 'template_email.php';

	// Guardar o conteúdo do arquivo em uma variável:
	$corpo = ob_get_clean ( );

	return $corpo;

}

function gravar_log ( $mensagem ) {

	$datahora = date ( "Y-m-d H:i:s" );
	$mensagem = "{$datahora} {$mensagem}\n";

	file_put_contents ( 'mensagens.log', $mensagem, FILE_APPEND );
}
