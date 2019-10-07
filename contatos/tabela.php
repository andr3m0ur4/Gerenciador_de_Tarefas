<table>
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Email</th>
		<th>Descrição</th>
		<th>Data de nascimento</th>
		<th>Favorito</th>
		<th>Opções</th>
	</tr>

	<?php foreach ( $lista_contatos as $contato ) : ?>
		<tr>
			<td><?php echo $contato['nome']; ?></td>
			<td><?php echo $contato['telefone']; ?></td>
			<td><?php echo $contato['email']; ?></td>
			<td><?php echo $contato['descricao']; ?></td>
			<td><?php echo traduz_data_para_exibir ( $contato['data_nascimento'] ); ?></td>
			<td><?php echo traduz_favorito ( $contato['favorito'] ); ?></td>
			<td>
				<a href="editar.php?id=<?php echo $contato['id']; ?>">
					Editar
				</a>
				<a href="remover.php?id=<?php echo $contato['id']; ?>">
					Remover
				</a>
			</td>
		</tr>
	<?php endforeach; ?>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>
			<a href="contatos.php">
				Listar todos os contatos
			</a>
		</td>
		<td colspan="2">
			<a href="contatos.php?favoritos=1">
				Listar contatos favoritos
			</a>
		</td>
	</tr>
</table>