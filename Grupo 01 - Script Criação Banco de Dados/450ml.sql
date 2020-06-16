-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2020 às 16:36
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `450ml`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha`
--

CREATE TABLE `campanha` (
  `cod_campanha` int(10) NOT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `cod_hemocentro` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `cod_doacao` int(10) NOT NULL,
  `dt_hr_agendamento` datetime DEFAULT NULL,
  `cod_hemocentro` int(10) DEFAULT NULL,
  `cod_doador` int(10) DEFAULT NULL,
  `efetivada` tinyint(1) DEFAULT NULL,
  `cod_campanha` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doador`
--

CREATE TABLE `doador` (
  `cod_doador` int(10) NOT NULL,
  `nome` char(15) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `cpf` bigint(11) DEFAULT NULL,
  `cd_tp_sanguineo` int(11) DEFAULT NULL,
  `telefone` bigint(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `sigla_uf` char(2) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL,
  `logradouro` varchar(80) DEFAULT NULL,
  `numero` char(10) DEFAULT NULL,
  `complemento` char(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `form_pre_triagem`
--

CREATE TABLE `form_pre_triagem` (
  `cod_form` int(10) NOT NULL,
  `md5_formulario` varchar(23) DEFAULT NULL,
  `dt_preenchimento` datetime DEFAULT NULL,
  `cod_doacao` int(10) DEFAULT NULL,
  `cod_hemocentro` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hemocentro`
--

CREATE TABLE `hemocentro` (
  `cod_hemocentro` int(10) NOT NULL,
  `nome_fantasia` varchar(60) DEFAULT NULL,
  `razao_social` varchar(60) DEFAULT NULL,
  `cnpj` bigint(14) DEFAULT NULL,
  `telefone` bigint(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `cod_responsavel` int(10) DEFAULT NULL,
  `logradouro` varchar(80) DEFAULT NULL,
  `numero` char(10) DEFAULT NULL,
  `complemento` char(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `sigla_uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `cd_responsavel` int(10) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `cpf` bigint(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `senha_resp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_resp`
--

CREATE TABLE `telefone_resp` (
  `cod_telefone` int(10) NOT NULL,
  `cod_responsavel` int(10) DEFAULT NULL,
  `num_telefone` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sanguineo`
--

CREATE TABLE `tipo_sanguineo` (
  `cd_tipo` int(11) NOT NULL,
  `tp_sanguineo` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `sigla` char(2) NOT NULL,
  `nome` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`cod_campanha`),
  ADD KEY `FK_CAMPANHA_2` (`cod_hemocentro`);

--
-- Índices para tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`cod_doacao`),
  ADD KEY `FK_Doacao_2` (`cod_hemocentro`),
  ADD KEY `FK_Doacao_3` (`cod_doador`),
  ADD KEY `FK_Doacao_4` (`cod_campanha`);

--
-- Índices para tabela `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`cod_doador`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `FK_Doador_2` (`sigla_uf`),
  ADD KEY `FK_Doador_3` (`cd_tp_sanguineo`);

--
-- Índices para tabela `form_pre_triagem`
--
ALTER TABLE `form_pre_triagem`
  ADD PRIMARY KEY (`cod_form`),
  ADD KEY `FK_Form_Pre_Triagem_2` (`cod_doacao`),
  ADD KEY `FK_Form_Pre_Triagem_3` (`cod_hemocentro`);

--
-- Índices para tabela `hemocentro`
--
ALTER TABLE `hemocentro`
  ADD PRIMARY KEY (`cod_hemocentro`),
  ADD KEY `FK_Hemocentro_2` (`sigla_uf`),
  ADD KEY `FK_Hemocentro_3` (`cod_responsavel`);

--
-- Índices para tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`cd_responsavel`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `telefone_resp`
--
ALTER TABLE `telefone_resp`
  ADD PRIMARY KEY (`cod_telefone`),
  ADD KEY `FK_Telefone_Resp_2` (`cod_responsavel`);

--
-- Índices para tabela `tipo_sanguineo`
--
ALTER TABLE `tipo_sanguineo`
  ADD PRIMARY KEY (`cd_tipo`);

--
-- Índices para tabela `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`sigla`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `campanha`
--
ALTER TABLE `campanha`
  ADD CONSTRAINT `FK_CAMPANHA_2` FOREIGN KEY (`cod_hemocentro`) REFERENCES `hemocentro` (`cod_hemocentro`);

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `FK_Doacao_2` FOREIGN KEY (`cod_hemocentro`) REFERENCES `hemocentro` (`cod_hemocentro`),
  ADD CONSTRAINT `FK_Doacao_3` FOREIGN KEY (`cod_doador`) REFERENCES `doador` (`cod_doador`),
  ADD CONSTRAINT `FK_Doacao_4` FOREIGN KEY (`cod_campanha`) REFERENCES `campanha` (`cod_campanha`);

--
-- Limitadores para a tabela `doador`
--
ALTER TABLE `doador`
  ADD CONSTRAINT `FK_Doador_2` FOREIGN KEY (`sigla_uf`) REFERENCES `uf` (`sigla`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Doador_3` FOREIGN KEY (`cd_tp_sanguineo`) REFERENCES `tipo_sanguineo` (`cd_tipo`);

--
-- Limitadores para a tabela `form_pre_triagem`
--
ALTER TABLE `form_pre_triagem`
  ADD CONSTRAINT `FK_Form_Pre_Triagem_2` FOREIGN KEY (`cod_doacao`) REFERENCES `doacao` (`cod_doacao`),
  ADD CONSTRAINT `FK_Form_Pre_Triagem_3` FOREIGN KEY (`cod_hemocentro`) REFERENCES `hemocentro` (`cod_hemocentro`);

--
-- Limitadores para a tabela `hemocentro`
--
ALTER TABLE `hemocentro`
  ADD CONSTRAINT `FK_Hemocentro_2` FOREIGN KEY (`sigla_uf`) REFERENCES `uf` (`sigla`),
  ADD CONSTRAINT `FK_Hemocentro_3` FOREIGN KEY (`cod_responsavel`) REFERENCES `responsavel` (`cd_responsavel`);

--
-- Limitadores para a tabela `telefone_resp`
--
ALTER TABLE `telefone_resp`
  ADD CONSTRAINT `FK_Telefone_Resp_2` FOREIGN KEY (`cod_responsavel`) REFERENCES `responsavel` (`cd_responsavel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
