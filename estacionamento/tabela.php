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
			<td><?php echo $veiculo['placa']; ?></td>
			<td><?php echo $veiculo['marca']; ?></td>
			<td><?php echo $veiculo['modelo']; ?></td>
			<td><?php echo traduz_hora_para_exibir ( $veiculo['hora_entrada'] ); ?></td>
			<td><?php echo traduz_hora_para_exibir ( $veiculo['hora_saida'] ); ?></td>
			<td>
				<a href="remover.php?id=<?php echo $veiculo['id']; ?>">
					Remover
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>