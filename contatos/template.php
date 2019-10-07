<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gerenciador de Contatos</title>
		<link rel="stylesheet" type="text/css" href="../tarefas.css">
	</head>
	<body>
		<h1>Gerenciador de Contatos</h1>

		<form>
			<fieldset>
				<legend>Nova contato</legend>
				<label>
					Nome:
					<input type="text" name="nome">
				</label>
				<label>
					Telefone:
					<input type="tel" name="telefone">
				</label>
				<label>
					Email:
					<input type="email" name="email">
				</label>
				<label>
					Descrição (Opcional):
					<textarea name="descricao"></textarea>
				</label>
				<label>
					Data de nascimento:
					<input type="date" name="data">
				</label>
				<label>
					Contato favorito:
					<input type="checkbox" name="favorito" value="1">
				</label>
				<input type="submit" value="Cadastrar">
			</fieldset>
		</form>

		<table>
			<tr>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Email</th>
				<th>Descrição</th>
				<th>Data de nascimento</th>
				<th>Favorito</th>
			</tr>

			<?php foreach ( $lista_contatos as $contato ) : ?>
				<tr>
					<td><?php echo $contato['nome']; ?></td>
					<td><?php echo $contato['telefone']; ?></td>
					<td><?php echo $contato['email']; ?></td>
					<td><?php echo $contato['descricao']; ?></td>
					<td><?php echo traduz_data_para_exibir ( $contato['data_nascimento'] ); ?></td>
					<td><?php echo traduz_favorito ( $contato['favorito'] ); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>

	</body>
</html>