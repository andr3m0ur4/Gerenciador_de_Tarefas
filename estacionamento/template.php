<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gerenciador de Estacionamento</title>
		<link rel="stylesheet" type="text/css" href="../tarefas.css">
	</head>
	<body>
		<h1>Gerenciador de Estacionamento</h1>

		<?php require 'formulario.php'; ?>

		<?php if ( $exibir_tabela ) : ?>
			<?php require 'tabela.php'; ?>
		<?php endif; ?>
		
	</body>
</html>