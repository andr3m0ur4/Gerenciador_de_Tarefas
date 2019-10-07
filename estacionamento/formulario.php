<form>
	<input type="hidden" name="id" value="<?php echo $veiculo['id']; ?>">
	<fieldset>
		<legend>Nova veículo</legend>
		<label>
			Placa:
			<input type="text" name="placa" value="<?php echo $veiculo['placa']; ?>">
		</label>
		<label>
			Marca:
			<input type="text" name="marca" value="<?php echo $veiculo['marca']; ?>">
		</label>
		<label>
			Modelo:
			<input type="text" name="modelo" value="<?php echo $veiculo['modelo']; ?>">
		</label>
		<label>
			Hora da entrada:
			<input type="time" name="hora_entrada" value="<?php echo $veiculo['hora_entrada']; ?>">
		</label>
		<label>
			Hora da saída:
			<input type="time" name="hora_saida" value="<?php echo $veiculo['hora_saida']; ?>">
		</label>
		<input type="submit" value="<?php echo ( $veiculo['id'] > 0 ) ? 'Atualizar' : 'Cadastrar'; ?>">
	</fieldset>
</form>