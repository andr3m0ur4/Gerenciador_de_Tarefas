<table>
	<tr>
		<th>Placa</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Hora da entrada</th>
		<th>Hora da saída</th>
		<th>Opções</th>
	</tr>

	<?php foreach ( $lista_veiculos as $veiculo ) : ?>
		<tr>
			<td>
				<a href="veiculo.php?id=<?= $veiculo['id'] ?>">
					<?= $veiculo['placa'] ?>
				</a>
			</td>
			<td><?= $veiculo['marca'] ?></td>
			<td><?= $veiculo['modelo'] ?></td>
			<td><?= traduz_hora_para_exibir ( $veiculo['hora_entrada'] ) ?></td>
			<td><?= traduz_hora_para_exibir ( $veiculo['hora_saida'] ) ?></td>
			<td>
				<a href="editar.php?id=<?= $veiculo['id'] ?>">
					Editar
				</a>
				<a href="remover.php?id=<?= $veiculo['id'] ?>">
					Remover
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>