<form method="POST">
	<input type="hidden" name="id" value="<?= $contato -> getId ( ) ?>">
	<fieldset>
		<legend>Nova contato</legend>
		<label>
			Nome:
			<?php if ( $tem_erros AND isset ( $erros_validacao['nome'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['nome'] ?>
				</span>
			<?php endif; ?>
			<input type="text" name="nome" value="<?= htmlentities ( $contato -> getNome ( ) ) ?>">
		</label>
		<label>
			Telefone:
			<?php if ( $tem_erros AND isset ( $erros_validacao['telefone'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['telefone'] ?>
				</span>
			<?php endif; ?>
			<input type="tel" name="telefone" value="<?= htmlentities ( $contato -> getTelefone ( ) ) ?>">
		</label>
		<label>
			Email:
			<?php if ( $tem_erros AND isset ( $erros_validacao['email'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['email'] ?>
				</span>
			<?php endif; ?>
			<input type="email" name="email" value="<?= htmlentities ( $contato -> getEmail ( ) ) ?>">
		</label>
		<label>
			Descrição (Opcional):
			<textarea name="descricao"><?= htmlentities ( $contato -> getDescricao ( ) ) ?></textarea>
		</label>
		<label>
			Data de nascimento:
			<input type="date" name="data" value="<?= $contato -> getDataNascimento ( ) ?>">
			<?php if ( $tem_erros AND isset ( $erros_validacao['data'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['data'] ?>
				</span>
			<?php endif; ?>
		</label>
		<label>
			Contato favorito:
			<input type="checkbox" name="favorito" value="1"
				<?php echo ( $contato -> getFavorito ( ) == true ) ? 'checked' : ''; ?> >
		</label>
		<input type="submit" value="<?php echo ( $contato -> getId ( ) > 0 ) ? 'Atualizar' : 'Cadastrar'; ?>">
	</fieldset>
</form>