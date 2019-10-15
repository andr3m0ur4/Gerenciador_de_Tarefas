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

	<?php foreach ( $contatos as $contato ) : ?>
		<tr>
			<td>
				<a href="contato.php?id=<?= $contato -> getId ( ) ?>">
					<?= htmlentities ( $contato -> getNome ( ) ) ?>
				</a>
			</td>
			<td><?= htmlentities ( $contato -> getTelefone ( ) ) ?></td>
			<td><?= htmlentities ( $contato -> getEmail ( ) ) ?></td>
			<td><?= htmlentities ( $contato -> getDescricao ( ) ) ?></td>
			<td><?= traduz_data_para_exibir ( $contato -> getDataNascimento ( ) ) ?></td>
			<td><?= traduz_favorito ( $contato -> getFavorito ( ) ) ?></td>
			<td>
				<a href="editar.php?id=<?= $contato -> getId ( ) ?>">
					Editar
				</a>
				<a href="remover.php?id=<?= $contato -> getId ( ) ?>">
					Remover
				</a><br>
				<a href="enviar_email.php?id=<?= $contato -> getId ( ) ?>">
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