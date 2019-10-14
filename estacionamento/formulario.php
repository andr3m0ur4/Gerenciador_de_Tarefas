<form method="POST">
	<input type="hidden" name="id" value="<?= $veiculo -> getId ( ) ?>">
	<fieldset>
		<legend>Nova veículo</legend>
		<label>
			Placa:
			<?php if ( $tem_erros AND isset ( $erros_validacao['placa'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['placa'] ?>
				</span>
			<?php endif; ?>
			<input type="text" name="placa" value="<?= $veiculo -> getPlaca ( ) ?>">
		</label>
		<label>
			Marca:
			<input type="text" name="marca" value="<?= $veiculo -> getMarca () ?>">
		</label>
		<label>
			Modelo:
			<input type="text" name="modelo" value="<?= $veiculo -> getModelo ( ) ?>">
		</label>
		<label>
			Hora da entrada:
			<input type="time" name="hora_entrada" value="<?= $veiculo -> getHoraEntrada ( ) ?>">
		</label>
		<label>
			Hora da saída:
			<input type="time" name="hora_saida" value="<?= $veiculo -> getHoraSaida ( ) ?>">
		</label>
		<input type="submit" value="<?php echo ( $veiculo -> getId ( ) > 0 ) ? 'Atualizar' : 'Cadastrar'; ?>">
	</fieldset>
</form>