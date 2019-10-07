<form>
	<input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
	<fieldset>
		<legend>Nova contato</legend>
		<label>
			Nome:
			<input type="text" name="nome" value="<?php echo $contato['nome']; ?>">
		</label>
		<label>
			Telefone:
			<input type="tel" name="telefone" value="<?php echo $contato['telefone']; ?>">
		</label>
		<label>
			Email:
			<input type="email" name="email" value="<?php echo $contato['email']; ?>">
		</label>
		<label>
			Descrição (Opcional):
			<textarea name="descricao"><?php echo $contato['descricao']; ?></textarea>
		</label>
		<label>
			Data de nascimento:
			<input type="date" name="data" value="<?php echo $contato['data_nascimento']; ?>">
		</label>
		<label>
			Contato favorito:
			<input type="checkbox" name="favorito" value="1"
				<?php echo ( $contato['favorito'] == 1 ) ? 'checked' : ''; ?> >
		</label>
		<input type="submit" value="<?php echo ( $contato['id'] > 0 ) ? 'Atualizar' : 'Cadastrar'; ?>">
	</fieldset>
</form>