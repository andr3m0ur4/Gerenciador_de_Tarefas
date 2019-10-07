<table>
	<tr>
		<th>Tarefas</th>
		<th>Descrição</th>
		<th>Prazo</th>
		<th>Prioridade</th>
		<th>Concluída</th>
		<th>Opções</th>
	</tr>

	<?php foreach ( $lista_tarefas as $tarefa ) : ?>
		<tr>
			<td><?php echo $tarefa['nome']; ?></td>
			<td><?php echo $tarefa['descricao']; ?></td>
			<td><?php echo traduz_data_para_exibir ( $tarefa['prazo'] ); ?></td>
			<td><?php echo traduz_prioridade ( $tarefa['prioridade'] ); ?></td>
			<td><?php echo traduz_concluida ( $tarefa['concluida'] ); ?></td>
			<td>
				<a href="editar.php?id=<?php echo $tarefa['id']; ?>">
					Editar
				</a>
				<a href="remover.php?id=<?php echo $tarefa['id']; ?>">
					Remover
				</a><br>
				<a href="duplicar.php?id=<?php echo $tarefa['id']; ?>">
					Duplicar Tarefa
				</a>
			</td>
		</tr>
	<?php endforeach; ?>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2">
			<a href="remover_concluidas.php">Apagar todas as tarefas concluídas</a>
		</td>
	</tr>
</table>