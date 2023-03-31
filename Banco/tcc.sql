-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Mar-2023 às 20:07
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `car_cod` int(11) NOT NULL,
  `car_marca` varchar(200) NOT NULL,
  `car_modelo` varchar(200) NOT NULL,
  `car_anomod` smallint(6) NOT NULL,
  `car_anofab` smallint(6) NOT NULL,
  `car_versao` varchar(200) NOT NULL,
  `car_tipo` varchar(200) NOT NULL,
  `car_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_cod` int(11) NOT NULL,
  `usu_email` varchar(200) NOT NULL,
  `usu_nome` varchar(45) NOT NULL,
  `usu_sobrenome` varchar(200) NOT NULL,
  `usu_senha` varchar(200) NOT NULL,
  `usu_tel` varchar(17) NOT NULL,
  `usu_dtnasc` date NOT NULL,
  `usu_cpf` varchar(14) NOT NULL,
  `usu_endereco` varchar(200) NOT NULL,
  `usu_cidade` varchar(100) NOT NULL,
  `usu_estado` varchar(10) NOT NULL,
  `usu_genero` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usu_cod`, `usu_email`, `usu_nome`, `usu_sobrenome`, `usu_senha`, `usu_tel`, `usu_dtnasc`, `usu_cpf`, `usu_endereco`, `usu_cidade`, `usu_estado`, `usu_genero`) VALUES
(5, 'matheusmendes2005@outlook.com', 'Matheus', 'Mendes', '81dc9bdb52d04dc20036dbd8313ed055', '18988027203', '2005-08-26', '82137129712', 'Rua 01', 'Pirapozinho', 'SP', 'Masculino');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`car_cod`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `car_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
