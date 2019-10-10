<h1>Veículo: <?= $veiculo['placa'] ?></h1>

<p>
	<strong>Marca:</strong>
	<?= $veiculo['marca'] ?>
</p>
<p>
	<strong>Modelo:</strong>
	<?= $veiculo['modelo'] ?>
</p>
<p>
	<strong>Hora da entrada:</strong>
	<?= traduz_hora_para_exibir ( $veiculo['hora_entrada'] ) ?>
</p>
<p>
	<strong>Hora da saída:</strong>
	<?= traduz_hora_para_exibir ( $veiculo['hora_saida'] ) ?>
</p>

<?php if ( !empty ( $veiculo['foto_entrada'] ) OR !empty ( $veiculo['foto_saida'] ) ) : ?>
	<p><strong>Atenção!</strong> Este veículo contém fotos!</p>
<?php endif; ?>

<p>
	Tenha um bom dia!
</p>