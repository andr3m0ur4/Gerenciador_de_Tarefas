<h1>Contato: <?= $contato -> getNome ( ); ?></h1>

<p>
	<strong>Telefone:</strong>
	<?= $contato -> getTelefone ( ) ?>
</p>
<p>
	<strong>Email:</strong>
	<?= $contato -> getEmail ( ) ?>
</p>
<p>
	<strong>Descrição:</strong>
	<?= nl2br ( $contato -> getDescricao ( ) ) ?>
</p>
<p>
	<strong>Data de nascimento:</strong>
	<?= traduz_data_para_exibir ( $contato -> getDataNascimento ( ) ) ?>
</p>
<p>
	<strong>Favorito:</strong>
	<?= traduz_favorito ( $contato -> getFavorito ( ) ) ?>
</p>

<?php if ( count ( $contato -> getFotos ( ) ) > 0 ) : ?>
	<p><strong>Atenção!</strong> Este contato contém fotos!</p>
<?php endif; ?>

<p>
	Tenha um bom dia!
</p>