<?php 

// arquivo classes/RepositorioTarefas.php

class RepositorioTarefas
{

	private $pdo;

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function salvar(Tarefa $tarefa)
	{
		$prazo = $tarefa->getPrazo();
		
		if (is_object($prazo)) {
			$prazo = $prazo->format('Y-m-d');
		}

		// Definindo SQL com Prepared Statements
		$sqlGravar = "INSERT INTO tarefas
			(nome, descricao, prioridade, prazo, concluida)
			VALUES
			(:nome, :descricao, :prioridade, :prazo, :concluida)
		";

		// Preparando a query
		$query = $this->pdo->prepare($sqlGravar);

		// Executando a query com os parâmetros nomeados
		$query->execute ([
			'nome' => strip_tags($tarefa->getNome()),
			'descricao' => strip_tags($tarefa->getDescricao()),
			'prioridade' => $tarefa->getPrioridade(),
			'prazo' => $prazo,
			'concluida' =>($tarefa->getConcluida()) ? 1 : 0,
		]);
	}

	public function atualizar(Tarefa $tarefa)
	{
		$prazo = $tarefa->getPrazo();
		
		if (is_object($prazo)) {
			$prazo = $prazo->format('Y-m-d');
		}

		// Lembre-se de que no update precisamos do WHERE
		$sqlEditar = "UPDATE tarefas SET
				nome = :nome,
				descricao = :descricao,
				prioridade = :prioridade,
				prazo = :prazo,
				concluida = :concluida
			WHERE id = :id
		";

		$query = $this->pdo->prepare($sqlEditar);

		// O parâmetro do WHERE também é incluído na execução
		$query->execute([
			'nome' => strip_tags($tarefa->getNome()),
			'descricao' => strip_tags($tarefa->getDescricao()),
			'prioridade' => $tarefa->getPrioridade(),
			'prazo' => $prazo,
			'concluida' =>($tarefa->getConcluida()) ? 1 : 0,
			'id' => $tarefa->getId(),
		]);
	}

	public function buscar($tarefa_id = 0)
	{
		if ($tarefa_id > 0) {
			return $this->buscarTarefa($tarefa_id);
		} else {
			return $this->buscarTarefas();
		}
	}

	private function buscarTarefas()
	{
		// Aqui não precisamos de parâmetros adicionais, pois buscamos todas as tarefas

		$sqlBusca = 'SELECT * FROM tarefas';

		$resultado = $this->pdo->query($sqlBusca, PDO::FETCH_CLASS, 'Tarefa');

		$tarefas = [];

		foreach ($resultado as $tarefa) {
			$tarefa->setAnexos($this->buscarAnexos($tarefa->getId()));
			$tarefas[] = $tarefa;
		}
		
		return $tarefas;
	}

	private function buscarTarefa($id)
	{
		$sqlBusca = "SELECT * FROM tarefas WHERE id = :id";
		$query = $this->pdo->prepare($sqlBusca);
		$query->execute([
			'id' => $id,
		]);

		$tarefa = $query->fetchObject('Tarefa');

		// Delegamos a busca dos anexos para o método buscar_anexos()

		$tarefa->setAnexos($this->buscarAnexos($tarefa->getId()));

		return $tarefa;
	}

	public function salvarAnexo(Anexo $anexo)
	{
		$sqlGravar = "INSERT INTO anexos
			(tarefa_id, nome, arquivo)
			VALUES
			(:tarefa_id, :nome, :arquivo)
		";

		$query = $this->pdo->prepare($sqlGravar);
		$query->execute([
			'tarefa_id' => $anexo->getTarefaId(),
			'nome' => strip_tags($anexo->getNome()),
			'arquivo' => strip_tags($anexo->getArquivo()),
		]);
	}

	public function buscarAnexos($tarefa_id)
	{
		$sqlBusca = "SELECT * FROM anexos WHERE tarefa_id = :tarefa_id";

		$query = $this->pdo->prepare($sqlBusca);
		$query->execute([
			"tarefa_id" => $tarefa_id,
		]);

		$anexos = [];

		while ($anexo = $query->fetchObject('Anexo')) {
			$anexos[] = $anexo;
		}

		return $anexos;
	}

	public function buscarAnexo($anexo_id)
	{
		$sqlBusca = "SELECT * FROM anexos WHERE id = :id";
		$query = $this->pdo->prepare($sqlBusca);
		$query->execute([
			'id' => $anexo_id,
		]);

		return $query->fetchObject('Anexo');
	}

	public function remover($id)
	{
		// Na remoção é muito importante usar o WHERE
		$sqlRemover = "DELETE FROM tarefas WHERE id = :id";
		$query = $this->pdo->prepare($sqlRemover);
		$query->execute([
			'id' => $id,
		]);
	}
	
	public function removerAnexo($id)
	{
		$sqlRemover = "DELETE FROM anexos WHERE id = :id";
		$query = $this->pdo->prepare($sqlRemover);
		$query->execute([
			'id' => $id,
		]);
	}
}
