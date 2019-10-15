<form method="POST">
	<label>
		CEP:
		<input type="text" name="cep">
	</label>
	<input type="submit" name="submit" value="Validar">
</form>

<?php  

$cep = $_POST['cep'] ?? '';

if ( validar_cep ( $cep ) ) {
	echo 'CEP é válido';
} else {
	echo 'CEP é inválido';
}

function validar_cep ( $cep ) {

	$padrao = '/^[0-9]{5}\-[0-9]{3}$/';
	$resultado = preg_match ( $padrao, $cep );

	return ( $resultado == 1 );
}

?>