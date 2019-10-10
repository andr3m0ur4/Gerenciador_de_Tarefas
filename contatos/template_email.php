<h1>Contato: <?= $contato['nome']; ?></h1>

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

<?php if ( count ( $fotos ) > 0 ) : ?>
	<p><strong>Atenção!</strong> Este contato contém fotos!</p>
<?php endif; ?>

<p>
	Tenha um bom dia!
</p>