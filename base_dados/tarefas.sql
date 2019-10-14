-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2019 às 20:05
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tarefas`
--

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
  `descricao` text DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `prioridade` int(1) DEFAULT NULL,
  `concluida` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome`, `descricao`, `prazo`, `prioridade`, `concluida`) VALUES
(1, 'Estudar PHP', 'Continuar meus estudos	de PHP e MySQL', '2019-10-20', 3, 0),
(3, 'Comprar leite', 'Desnatado', '0000-00-00', 1, 0),
(4, 'Arrumar as fotos da ', 'SÃ³ quando der tempo', '0000-00-00', 3, 0),
(5, 'Estudar MySQL', 'Cadasrado pelo formulÃ¡rio', NULL, 1, NULL),
(8, 'Prova de PHP 2', 'Estudar atÃ© o prazo', '0000-00-00', 1, 0),
(9, 'Prova de PHP', 'Estudar atÃ© o prazo', '2019-10-15', 2, NULL),
(11, 'Estudar HTML', 'HTML Ã© muito importante', '2019-10-16', 2, 0),
(12, 'Teste', 'Realizando um teste', '2019-12-08', 1, 0),
(14, 'Testar arquivo base', 'CriaÃ§Ã£o do arquivo base.php contendo dados do formulÃ¡rio', '2019-10-07', 3, 1),
(15, 'Estudar CSS', 'DescriÃ§Ã£o da minha tarefa', '2019-10-22', 2, 0),
(17, 'Estudar CSS', 'DescriÃ§Ã£o da minha tarefa', '2019-10-22', 2, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
