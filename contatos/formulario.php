<form method="POST">
	<input type="hidden" name="id" value="<?= $contato['id'] ?>">
	<fieldset>
		<legend>Nova contato</legend>
		<label>
			Nome:
			<?php if ( $tem_erros AND isset ( $erros_validacao['nome'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['nome'] ?>
				</span>
			<?php endif; ?>
			<input type="text" name="nome" value="<?= $contato['nome'] ?>">
		</label>
		<label>
			Telefone:
			<?php if ( $tem_erros AND isset ( $erros_validacao['telefone'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['telefone'] ?>
				</span>
			<?php endif; ?>
			<input type="tel" name="telefone" value="<?= $contato['telefone'] ?>">
		</label>
		<label>
			Email:
			<?php if ( $tem_erros AND isset ( $erros_validacao['email'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['email'] ?>
				</span>
			<?php endif; ?>
			<input type="email" name="email" value="<?= $contato['email'] ?>">
		</label>
		<label>
			Descrição (Opcional):
			<textarea name="descricao"><?= $contato['descricao'] ?></textarea>
		</label>
		<label>
			Data de nascimento:
			<input type="date" name="data" value="<?= $contato['data_nascimento'] ?>">
			<?php if ( $tem_erros AND isset ( $erros_validacao['data'] ) ) : ?>
				<span class="erro">
					<?= $erros_validacao['data'] ?>
				</span>
			<?php endif; ?>
		</label>
		<label>
			Contato favorito:
			<input type="checkbox" name="favorito" value="1"
				<?php echo ( $contato['favorito'] == 1 ) ? 'checked' : ''; ?> >
		</label>
		<input type="submit" value="<?php echo ( $contato['id'] > 0 ) ? 'Atualizar' : 'Cadastrar'; ?>">
	</fieldset>
</form>