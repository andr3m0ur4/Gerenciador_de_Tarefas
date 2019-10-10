<form method="POST">
	<input type="hidden" name="id" value="<?= $veiculo['id'] ?>">
	<fieldset>
		<legend>Nova veículo</legend>
		<label>
			Placa:
			<?php if ( $tem_erros AND isset ( $erros_validacao['placa'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['placa'] ?>
				</span>
			<?php endif; ?>
			<input type="text" name="placa" value="<?= $veiculo['placa'] ?>">
		</label>
		<label>
			Marca:
			<input type="text" name="marca" value="<?= $veiculo['marca'] ?>">
		</label>
		<label>
			Modelo:
			<input type="text" name="modelo" value="<?= $veiculo['modelo'] ?>">
		</label>
		<label>
			Hora da entrada:
			<input type="time" name="hora_entrada" value="<?= $veiculo['hora_entrada'] ?>">
		</label>
		<label>
			Hora da saída:
			<input type="time" name="hora_saida" value="<?= $veiculo['hora_saida'] ?>">
		</label>
		<input type="submit" value="<?php echo ( $veiculo['id'] > 0 ) ? 'Atualizar' : 'Cadastrar'; ?>">
	</fieldset>
</form>