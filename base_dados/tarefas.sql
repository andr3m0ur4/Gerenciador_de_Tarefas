-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Mar-2021 às 12:31
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarefas`
--
CREATE DATABASE IF NOT EXISTS `tarefas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tarefas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexos`
--

CREATE TABLE `anexos` (
  `id` int(11) NOT NULL,
  `tarefa_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anexos`
--

INSERT INTO `anexos` (`id`, `tarefa_id`, `nome`, `arquivo`) VALUES
(1, 1, 'Desenvolvimento web com PHP e MySQL - Casa do Codigo EdiÃ§Ã£o Atualizada', 'Desenvolvimento web com PHP e MySQL - Casa do Codigo EdiÃ§Ã£o Atualizada.pdf'),
(3, 11, 'html5 e css3 domine a web do futuro - Casa do Codigo', 'html5 e css3 domine a web do futuro - Casa do Codigo.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` text,
  `prazo` date DEFAULT NULL,
  `prioridade` int(1) DEFAULT NULL,
  `concluida` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome`, `descricao`, `prazo`, `prioridade`, `concluida`) VALUES
(3, 'Comprar leite', 'Desnatado', '0000-00-00', 1, 0),
(4, 'Arrumar as fotos da ', 'Só quando der tempo', '0000-00-00', 3, 0),
(5, 'Estudar MySQL', 'Cadastrado pelo formulário', '0000-00-00', 1, 0),
(8, 'Prova de PHP 2', 'Estudar até o prazo', '0000-00-00', 1, 0),
(9, 'Prova de PHP', 'Estudar até o prazo', '2019-10-15', 2, 0),
(11, 'Estudar HTML', 'HTML é muito importante', '2019-10-16', 2, 0),
(12, 'Teste', 'Realizando um teste', '2019-12-08', 1, 0),
(14, 'Testar arquivo base', 'Criação do arquivo base.php contendo dados do formulário', '2019-10-07', 3, 1),
(15, 'Estudar CSS', 'Descrição da minha tarefa', '2019-10-22', 2, 0),
(17, 'Estudar CSS', 'Descrição da minha tarefa', '2019-10-22', 2, 0),
(18, 'README', 'Criar arquivo README para este projeto', '2021-03-09', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
