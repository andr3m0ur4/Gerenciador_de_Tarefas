<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gerenciador de Contatos</title>
		<link rel="stylesheet" type="text/css" href="../tarefas.css">
	</head>
	<body>
		<div class="bloco_principal">
			<h1>Contato: <?= $contato['nome'] ?></h1>
			<p>
				<a href="contatos.php">
					Voltar para a lista de contatos
				</a>
			</p>

			<p>
				<strong>Telefone:</strong>
				<?= $contato['telefone'] ?>
			</p>
			<p>
				<strong>Email:</strong>
				<?= $contato['email'] ?>
			</p>
			<p>
				<strong>Descrição:</strong>
				<?= nl2br ( $contato['descricao'] ) ?>
			</p>
			<p>
				<strong>Data de nascimento:</strong>
				<?= traduz_data_para_exibir ( $contato['data_nascimento'] ) ?>
			</p>
			<p>
				<strong>Favorito:</strong>
				<?= traduz_favorito ( $contato['favorito'] ) ?>
			</p>

			<h2>Fotos</h2>

			<!-- lista de fotos -->

			<?php if ( count ( $fotos ) > 0 ) : ?>
				<table>
					<tr>
						<th>Foto</th>
						<th>Opções</th>
					</tr>

					<?php foreach ( $fotos as $foto ) : ?>
						<tr>
							<td><?= $foto['nome'] ?></td>
							<td>
								<a href="fotos/<?= $foto['arquivo'] ?>">
									Visualizar
								</a>
								<a href="remover_foto.php?id=<?= $foto['id'] ?>">
									Remover
								</a>
							</td>
						</tr>
					<?php endforeach; ?>

				</table>
			<?php else : ?>
				<p>Não há fotos para este contato.</p>
			<?php endif; ?>

			<!-- formulário para uma nova foto -->
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Nova foto</legend>

					<input type="hidden" name="contato_id" value="<?= $contato['id'] ?>">

					<label>
						<?php if ( $tem_erros AND isset ( $erros_validacao['foto'] ) ) : ?>
							<span class="erro">
								<?= $erros_validacao['foto'] ?>
							</span>
						<?php endif; ?>
						<br>
						<input type="file" name="foto">
					</label>

					<input type="submit" value="Cadastrar">
				</fieldset>
			</form>
			
		</div>
	</body>
</html>