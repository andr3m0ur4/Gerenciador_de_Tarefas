<?php 

$anexo = $repositorio_tarefas->buscarAnexo ( $_GET['id'] );
$repositorio_tarefas->removerAnexo ( $anexo->getId ( ) );
unlink ( __DIR__ . '/../anexos/' . $anexo->getArquivo ( ) );

header ( 'Location: index.php?rota=tarefa&id=' . $anexo->getTarefaId ( ) );
