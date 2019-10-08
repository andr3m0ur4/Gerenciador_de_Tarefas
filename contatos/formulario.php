<form method="POST">
	<input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
	<fieldset>
		<legend>Nova contato</legend>
		<label>
			Nome:
			<?php if ( $tem_erros AND isset ( $erros_validacao['nome'] ) ) : ?>
				<span class="erro">
					<?php echo $erros_validacao['nome']; ?>
				</span>
			<?php endif; ?>
			<input type="text" name="nome" value="<?php echo $contato['nome']; ?>">
		</label>
		<label>
			Telefone:
			<?php if ( $tem_erros AND isset ( $erros_validacao['telefone'] ) ) : ?>
				<span class="erro">
					<?php echo $erros_validacao['telefone']; ?>
				</span>
			<?php endif; ?>
			<input type="tel" name="telefone" value="<?php echo $contato['telefone']; ?>">
		</label>
		<label>
			Email:
			<?php if ( $tem_erros AND isset ( $erros_validacao['email'] ) ) : ?>
				<span class="erro">
					<?php echo $erros_validacao['email']; ?>
				</span>
			<?php endif; ?>
			<input type="email" name="email" value="<?php echo $contato['email']; ?>">
		</label>
		<label>
			Descrição (Opcional):
			<textarea name="descricao"><?php echo $contato['descricao']; ?></textarea>
		</label>
		<label>
			Data de nascimento:
			<input type="date" name="data" value="<?php echo $contato['data_nascimento']; ?>">
			<?php if ( $tem_erros AND isset ( $erros_validacao['data'] ) ) : ?>
				<span class="erro">
					<?php echo $erros_validacao['data']; ?>
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