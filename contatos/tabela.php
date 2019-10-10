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
			<td>
				<a href="contato.php?id=<?=$contato['id']?>">
					<?= $contato['nome'] ?>
				</a>
			</td>
			<td><?= $contato['telefone'] ?></td>
			<td><?= $contato['email'] ?></td>
			<td><?= $contato['descricao'] ?></td>
			<td><?= traduz_data_para_exibir ( $contato['data_nascimento'] ) ?></td>
			<td><?= traduz_favorito ( $contato['favorito'] ) ?></td>
			<td>
				<a href="editar.php?id=<?= $contato['id'] ?>">
					Editar
				</a>
				<a href="remover.php?id=<?= $contato['id'] ?>">
					Remover
				</a><br>
				<a href="enviar_email.php?id=<?= $contato['id'] ?>">
					Enviar e-mail
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