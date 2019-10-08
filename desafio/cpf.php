<form method="POST">
	<label>
		CPF:
		<input type="text" name="cpf">
	</label>
	<input type="submit" name="submit" value="Validar">
</form>

<?php  

$cpf = $_POST['cpf'] ?? '';

if ( validar_cpf ( $cpf ) ) {
	echo 'CPF é válido';
} else {
	echo 'CPF é inválido';
}

function validar_cpf ( $cpf ) {

	$padrao = '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/';
	$resultado = preg_match ( $padrao, $cpf );

	return ( $resultado == 1 );
}

?>