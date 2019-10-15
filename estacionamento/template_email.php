<h1>Veículo: <?= $veiculo -> getPlaca ( ) ?></h1>

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

<?php if ( !empty ( $veiculo -> getFotoEntrada ( ) ) OR !empty ( $veiculo -> getFotoSaida ( ) ) ) : ?>
	<p><strong>Atenção!</strong> Este veículo contém fotos!</p>
<?php endif; ?>

<p>
	Tenha um bom dia!
</p>