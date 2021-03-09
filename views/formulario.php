<form method="POST">
	<input type="hidden" name="id" value="<?= $tarefa->getId(); ?>">
	<fieldset>
		<legend>Nova tarefa</legend>
		<label>
			Tarefa:
			<?php if ($tem_erros AND array_key_exists('nome', $erros_validacao)) : ?>
				<span class="erro">
					<?= $erros_validacao['nome'] ?>
				</span>
			<?php endif ?>
			<input type="text" name="nome" value="<?= htmlentities($tarefa->getNome() ); ?>">
		</label>
		<label>
			Descrição (Opcional):
			<textarea name="descricao"><?= htmlentities($tarefa->getDescricao()) ?></textarea>
		</label>
		<label>
			Prazo (Opcional):
			<?php if ($tem_erros AND array_key_exists('prazo', $erros_validacao)) : ?>
				<span class="erro">
					<?= $erros_validacao['prazo'] ?>
				</span>
			<?php endif ?>
			<input type="text" name="prazo" 
				value="<?= traduz_data_para_exibir($tarefa->getPrazo()) ?>">
		</label>
		<fieldset>
			<legend>Prioridade</legend>
			<label>
				<input type="radio" name="prioridade" value="1"
					<?= ($tarefa->getPrioridade() == 1) ? 'checked' : '' ?>>Baixa
				<input type="radio" name="prioridade" value="2"
					<?= ($tarefa->getPrioridade() == 2) ? 'checked' : '' ?>>Média
				<input type="radio" name="prioridade" value="3"
					<?= ($tarefa->getPrioridade() == 3) ? 'checked' : '' ?>>Alta
			</label>
		</fieldset>
		<label>
			<!-- Agora o campo de concluída -->
			Tarefa concluída:
			<input type="checkbox" name="concluida" value="1"
				<?= ($tarefa->getConcluida()) ? 'checked' : '' ?>>
		</label>
		<label>
			Lembrete por e-mail:
			<input type="checkbox" name="lembrete" value="1">
		</label>
		<button type="submit" class="botao">
			<?= ($tarefa->getId() > 0) ? 'Atualizar' : 'Cadastrar' ?>
		</button>
	</fieldset>
</form>