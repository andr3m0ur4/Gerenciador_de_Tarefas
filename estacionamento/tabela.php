<table>
	<tr>
		<th>Placa</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Hora da entrada</th>
		<th>Hora da saída</th>
		<th>Opções</th>
	</tr>

	<?php foreach ( $veiculos as $veiculo ) : ?>
		<tr>
			<td>
				<a href="veiculo.php?id=<?= $veiculo -> getId ( ) ?>">
					<?= $veiculo -> getPlaca ( ) ?>
				</a>
			</td>
			<td><?= $veiculo -> getMarca ( ) ?></td>
			<td><?= $veiculo -> getModelo ( ) ?></td>
			<td><?= traduz_hora_para_exibir ( $veiculo -> getHoraEntrada ( ) ) ?></td>
			<td><?= traduz_hora_para_exibir ( $veiculo -> getHoraSaida ( ) ) ?></td>
			<td>
				<a href="editar.php?id=<?= $veiculo -> getId ( ) ?>">
					Editar
				</a>
				<a href="remover.php?id=<?= $veiculo -> getId ( ) ?>">
					Remover
				</a><br>
				<a href="enviar_email.php?id=<?= $veiculo -> getId ( ) ?>">
					Enviar email
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>