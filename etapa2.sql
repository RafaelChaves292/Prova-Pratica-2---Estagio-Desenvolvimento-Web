-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10-Fev-2020 às 00:26
-- Versão do servidor: 10.2.31-MariaDB-log
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `etapa2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cliente`
--

CREATE TABLE `tab_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_cliente`
--

INSERT INTO `tab_cliente` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `uf`, `cep`, `email`, `cpf`, `telefone`, `site`) VALUES
(8, 'Cliente 1', 'Travessa Mariano de Moura', '23', 'Centro', 'Nova Iguaçu', NULL, 'RJ', '26210-160', 'cliente1@cliente.com.br', '15793803017', '2132720107', 'www.vipgol.com.br'),
(9, 'Cliente 2', 'Rua São Engelmar', '12', 'Pavuna', 'Rio de Janeiro', NULL, 'RJ', '21650-380', 'cliente2@cliente.com.br', '74091522068', '2138225735', ''),
(10, 'Cliente 3', 'Rua Virgília Líra', '26', 'Sepetiba', 'Rio de Janeiro', NULL, 'RJ', '23535-814', 'cliente3@cliente.com.br', '55111631046', '2136890876', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(70) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id`, `login`, `nome`, `senha`) VALUES
(6, 'Rachco', 'Rafael Chaves', '5811lanceada'),
(8, 'Paola123', 'Paola Andrea', '5811lanceada');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_cliente`
--
ALTER TABLE `tab_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
