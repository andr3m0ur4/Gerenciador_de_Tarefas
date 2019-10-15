<?php 

require 'config.php';
require 'banco.php';
require 'classes/Veiculo.php';
require 'classes/RepositorioVeiculos.php';

$repositorio_veiculos = new RepositorioVeiculos ( $conexao );

$repositorio_veiculos -> remover ( $_GET['id'] );

header ( 'Location: veiculos.php' );
