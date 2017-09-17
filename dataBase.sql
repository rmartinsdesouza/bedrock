-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Set-2017 às 23:46
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bedrock`
--
CREATE DATABASE IF NOT EXISTS `bedrock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bedrock`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campo`
--

CREATE TABLE `campo` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL,
  `SISTEMA_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(45) DEFAULT NULL,
  `ESTADO_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`CODIGO`, `DESCRICAO`) VALUES
(1, 'Default'),
(2, 'SE'),
(3, 'CP'),
(4, 'ACA'),
(5, 'ASA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL,
  `LOGIN_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(150) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL,
  `LOGIN_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`CODIGO`, `NOME`, `CPF`, `DATA_NASCIMENTO`, `LOGIN_CODIGO`) VALUES
(1, 'Jonh Walker', NULL, NULL, 1),
(8, 'Maria', '154154187', '1954-05-08', 1),
(12, 'Grenda Kolovisk', '45112686329', '1988-05-04', 1),
(13, 'Bruna Silva', '78541653265', '1989-03-05', 2),
(14, 'Thor Schutz', '75841236523', '1996-04-01', 1),
(15, 'Tiago Silva', '78541653265', '1989-03-05', 4),
(17, 'Indianara Oliveira', '78415942156', '1988-01-20', 1),
(18, 'Erica Pessoa', '54216325841', '1989-08-22', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL,
  `PERFIL_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campo`
--
ALTER TABLE `campo`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `fk_CAMPO_SISTEMA1_idx` (`SISTEMA_CODIGO`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `fk_CIDADE_ESTADO1_idx` (`ESTADO_CODIGO`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `fk_PERFIL_LOGIN1_idx` (`LOGIN_CODIGO`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `fk_PESSOA_LOGIN_idx` (`LOGIN_CODIGO`);

--
-- Indexes for table `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `fk_SISTEMA_PERFIL1_idx` (`PERFIL_CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campo`
--
ALTER TABLE `campo`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sistema`
--
ALTER TABLE `sistema`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `fk_CAMPO_SISTEMA1` FOREIGN KEY (`SISTEMA_CODIGO`) REFERENCES `sistema` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_CIDADE_ESTADO1` FOREIGN KEY (`ESTADO_CODIGO`) REFERENCES `estado` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_PERFIL_LOGIN1` FOREIGN KEY (`LOGIN_CODIGO`) REFERENCES `login` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_PESSOA_LOGIN` FOREIGN KEY (`LOGIN_CODIGO`) REFERENCES `login` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sistema`
--
ALTER TABLE `sistema`
  ADD CONSTRAINT `fk_SISTEMA_PERFIL1` FOREIGN KEY (`PERFIL_CODIGO`) REFERENCES `perfil` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;
