<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gerenciador de Estacionamento</title>
		<link rel="stylesheet" type="text/css" href="../tarefas.css">
	</head>
	<body>
		<div class="bloco_principal">
			<h1>Veículo: <?= $veiculo -> getPlaca ( ) ?></h1>
			<p>
				<a href="veiculos.php">
					Voltar para a lista de veículos
				</a>
			</p>

			<p>
				<strong>Marca:</strong>
				<?= $veiculo -> getMarca ( ) ?>
			</p>
			<p>
				<strong>Modelo:</strong>
				<?= $veiculo -> getModelo ( ) ?>
			</p>
			<p>
				<strong>Hora da entrada:</strong>
				<?= traduz_hora_para_exibir ( $veiculo -> getHoraEntrada ( ) ) ?>
			</p>
			<p>
				<strong>Hora da saída:</strong>
				<?= traduz_hora_para_exibir ( $veiculo -> getHoraSaida ( ) ) ?>
			</p>

			<h2>Fotos</h2>

			<!-- lista de fotos -->

			<?php if ( !empty ( $veiculo -> getFotoEntrada ( ) ) OR !empty ( $veiculo -> getFotoSaida ( ) ) ) : ?>
				<table>
					<tr>
						<th>Foto de entrada</th>
						<th>Opções</th>
						<th>Foto de saída</th>
						<th>Opções</th>
					</tr>
					
					<tr>
						<?php if ( !empty ( $veiculo -> getFotoEntrada ( ) ) ) : ?>
							<td><?= $veiculo -> getFotoEntrada ( ) ?></td>
							<td>
								<a href="fotos/<?= $veiculo -> getFotoEntrada ( ) ?>">
									Visualizar
								</a>
								<a href="remover_foto.php?id=<?= $veiculo -> getId ( ) ?>&entrada">
									Remover
								</a>
							</td>
						<?php else : ?>
							<td></td>
							<td></td>
						<?php endif; ?>
						<?php if ( !empty ( $veiculo -> getFotoSaida ( ) ) ) : ?>
							<td><?= $veiculo -> getFotoSaida ( ) ?></td>
							<td>
								<a href="fotos/<?= $veiculo -> getFotoSaida ( ) ?>">
									Visualizar
								</a>
								<a href="remover_foto.php?id=<?= $veiculo -> getId ( ) ?>&saida">
									Remover
								</a>
							</td>
						<?php else : ?>
							<td></td>
							<td></td>
						<?php endif; ?>
					</tr>
					
				</table>
			<?php else : ?>
				<p>Não há fotos para este veículo.</p>
			<?php endif; ?>

			<!-- formulário para uma nova foto -->
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Nova foto</legend>

					<input type="hidden" name="id" value="<?= $veiculo -> getId ( ) ?>">
					<input type="hidden" name="foto_entrada" value="<?= $veiculo -> getFotoEntrada ( ) ?>">
					<input type="hidden" name="foto_saida" value="<?= $veiculo -> getFotoSaida ( ) ?>">

					<label>
						Foto da entrada:<br>
						<input type="file" name="foto_entrada">
						<?php if ( $tem_erros AND isset ( $erros_validacao['foto_entrada'] ) ) : ?>
							<span class="erro">
								<?php echo $erros_validacao['foto_entrada']; ?>
							</span>
						<?php endif; ?>
					</label>

					<label>
						Foto da saída:<br>
						<input type="file" name="foto_saida">
						<?php if ( $tem_erros AND isset ( $erros_validacao['foto_saida'] ) ) : ?>
							<span class="erro">
								<?php echo $erros_validacao['foto_saida']; ?>
							</span>
						<?php endif; ?>
					</label>
					<br>
					<?php if ( $tem_erros AND isset ( $erros_validacao['foto'] ) ) : ?>
						<span class="erro">
							<?php echo $erros_validacao['foto']; ?>
						</span>
					<?php endif; ?>

					<input type="submit" value="Cadastrar">
				</fieldset>
			</form>
			
		</div>
	</body>
</html>