<?php 

require 'banco.php';

duplicar_tarefa ( $conexao, $_GET['id'] );

header ( 'Location: tarefas.php' );
