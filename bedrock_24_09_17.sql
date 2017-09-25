-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2017 às 00:29
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bedrock`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campo`
--

CREATE TABLE `campo` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL,
  `SISTEMA_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campo`
--

INSERT INTO `campo` (`CODIGO`, `DESCRICAO`, `SISTEMA_CODIGO`) VALUES
(1, 'NOME', 2),
(2, 'CPF', 2),
(3, 'VEICULO', 2),
(4, 'RG', 3),
(5, 'CEP', 3),
(6, 'LOGRADOURO', 3),
(7, 'NOME', 1),
(8, 'CPF', 1),
(9, 'DTNASCIMENTO', 1),
(10, 'RG', 1),
(12, 'LOGRADOURO', 1),
(13, 'PROFISSAO', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL,
  `ESTADO_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`CODIGO`, `DESCRICAO`, `ESTADO_CODIGO`) VALUES
(5, 'SINOP ção', 5),
(16, 'RIO DE JANEIRO', 6),
(17, 'RONDONÓPOLIS', 7),
(18, 'BRASÍLIA', 9),
(19, 'SORRISO', 5),
(20, 'CÁCERES', 5),
(21, 'NOVA MUTUM', 5),
(22, 'POCONE', 5),
(24, 'SÃO PAULO', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`CODIGO`, `DESCRICAO`) VALUES
(1, 'ÇÕÃS'),
(5, 'NAGOIA KEN'),
(6, 'MOÇORÓ'),
(7, 'MATO GROSSO'),
(8, 'SÃO PAULO'),
(9, 'RIO DE JANEIRO'),
(10, 'BRASIL'),
(11, 'MATO DO SUL'),
(12, 'GOIAS'),
(13, 'MATO GROSSO'),
(14, 'SÃO PAULO'),
(15, 'RIO DE JANEIRO'),
(16, 'BRASIL'),
(17, 'MATO DO SUL'),
(18, 'GOIAS'),
(19, 'MATO GROSSO'),
(20, 'SÃO PAULO'),
(21, 'RIO DE JANEIRO'),
(22, 'BRASIL'),
(23, 'MATO DO SUL'),
(24, 'GOIAS'),
(25, 'MATO GROSSO'),
(26, 'SÃO PAULO'),
(27, 'RIO DE JANEIRO'),
(28, 'BRASIL'),
(29, 'MATO DO SUL'),
(30, 'GOIAS'),
(31, 'HISROSHIMA KEN');

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
(1, 'GDR'),
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

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`CODIGO`, `DESCRICAO`, `LOGIN_CODIGO`) VALUES
(2, 'ADMINISTRACAO', 1),
(3, 'ESTAGIARIO', 1),
(4, 'GERENTE', 1),
(5, 'DIRETORIA', 1),
(6, 'TI', 1);

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
(18, 'Erica Pessoa', '54216325841', '1989-08-22', 5),
(19, 'Postman USA', '78415948722', '1980-09-08', 1),
(20, 'Video Show', '78415948722', '1980-09-08', 1),
(21, 'Laura Marta', '15714826952', '1980-09-08', 1),
(25, 'Tiago Silva', '78541653265', '1989-03-05', 4);

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
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`CODIGO`, `DESCRICAO`, `PERFIL_CODIGO`) VALUES
(1, 'DICIONARIO', 2),
(2, 'GESFORM', 2),
(3, 'INTERCONECT', 2),
(4, 'SGE', 2),
(5, 'EDUCACIONAL', 2),
(7, 'GESPONTO', 2);

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
  ADD PRIMARY KEY (`CODIGO`,`ESTADO_CODIGO`),
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
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sistema`
--
ALTER TABLE `sistema`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Limitadores para a tabela `sistema`
--
ALTER TABLE `sistema`
  ADD CONSTRAINT `fk_SISTEMA_PERFIL1` FOREIGN KEY (`PERFIL_CODIGO`) REFERENCES `perfil` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
