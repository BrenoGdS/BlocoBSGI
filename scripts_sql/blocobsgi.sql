-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blocobsgi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `id_cidade` int(4) NOT NULL,
  `id_UF` char(2) DEFAULT NULL,
  `desc_cidade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_evento`
--

CREATE TABLE `tb_evento` (
  `id_evento` varchar(30) NOT NULL,
  `id_organizacao` int(11) NOT NULL,
  `id_tipo_evento` tinyint(2) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `data_evento` date NOT NULL,
  `CEP_evento` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_cidade_evento` int(4) DEFAULT NULL,
  `logradouro_evento` varchar(60) DEFAULT NULL,
  `num_evento` int(3) DEFAULT NULL,
  `complemento_evento` varchar(30) DEFAULT NULL,
  `bairro_evento` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lider_organizacional`
--

CREATE TABLE `tb_lider_organizacional` (
  `id_lider_organizacional` int(11) NOT NULL,
  `id_organizacao` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_organizacao`
--

CREATE TABLE `tb_organizacao` (
  `id_organizacao` int(11) NOT NULL,
  `id_tipo_org` tinyint(2) NOT NULL,
  `id_organizacao_pai` int(11) DEFAULT NULL,
  `nome_org` varchar(30) NOT NULL,
  `tel_fixo_org` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `tel_cel_org` bigint(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `email_org` varchar(60) DEFAULT NULL,
  `CEP_org` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_cidade_org` int(4) NOT NULL,
  `logradouro_org` varchar(60) DEFAULT NULL,
  `num_org` int(3) DEFAULT NULL,
  `complemento_org` varchar(30) DEFAULT NULL,
  `bairro_org` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_regiao`
--

CREATE TABLE `tb_regiao` (
  `id_regiao` tinyint(1) NOT NULL,
  `desc_regiao` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipo_evento`
--

CREATE TABLE `tb_tipo_evento` (
  `id_tipo_evento` tinyint(2) NOT NULL,
  `desc_tipo_evento` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipo_organizacao`
--

CREATE TABLE `tb_tipo_organizacao` (
  `id_tipo_org` tinyint(2) NOT NULL,
  `desc_tipo_org` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipo_sexo`
--

CREATE TABLE `tb_tipo_sexo` (
  `cod_tipo_sexo` tinyint(1) NOT NULL,
  `desc_tipo_sexo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_uf`
--

CREATE TABLE `tb_uf` (
  `id_UF` char(2) NOT NULL,
  `nome_UF` varchar(30) NOT NULL,
  `id_regiao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(60) NOT NULL,
  `email_usuario` varchar(60) NOT NULL,
  `senha_usuario` varchar(60) NOT NULL,
  `bol_administrador` smallint(6) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `telefone_usuario` bigint(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_tipo_sexo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario_organizacao`
--

CREATE TABLE `tb_usuario_organizacao` (
  `id_usuario_organizacao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_organizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`id_cidade`),
  ADD KEY `FK_Tb_Cidade_2` (`id_UF`);

--
-- Indexes for table `tb_evento`
--
ALTER TABLE `tb_evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `FK_Tb_Evento_2` (`id_tipo_evento`),
  ADD KEY `FK_Tb_Evento_3` (`id_cidade_evento`),
  ADD KEY `FK_Tb_Evento_4` (`id_organizacao`);

--
-- Indexes for table `tb_lider_organizacional`
--
ALTER TABLE `tb_lider_organizacional`
  ADD PRIMARY KEY (`id_lider_organizacional`),
  ADD KEY `FK_Tb_Lider_Organizacional_1` (`id_organizacao`),
  ADD KEY `FK_Tb_Lider_Organizacional_2` (`id_usuario`);

--
-- Indexes for table `tb_organizacao`
--
ALTER TABLE `tb_organizacao`
  ADD PRIMARY KEY (`id_organizacao`),
  ADD KEY `FK_Tb_Organizacao_2` (`id_tipo_org`),
  ADD KEY `FK_Tb_Organizacao_3` (`id_cidade_org`),
  ADD KEY `FK_Tb_Organizacao_4` (`id_organizacao_pai`);

--
-- Indexes for table `tb_regiao`
--
ALTER TABLE `tb_regiao`
  ADD PRIMARY KEY (`id_regiao`);

--
-- Indexes for table `tb_tipo_evento`
--
ALTER TABLE `tb_tipo_evento`
  ADD PRIMARY KEY (`id_tipo_evento`);

--
-- Indexes for table `tb_tipo_organizacao`
--
ALTER TABLE `tb_tipo_organizacao`
  ADD PRIMARY KEY (`id_tipo_org`);

--
-- Indexes for table `tb_tipo_sexo`
--
ALTER TABLE `tb_tipo_sexo`
  ADD PRIMARY KEY (`cod_tipo_sexo`);

--
-- Indexes for table `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD PRIMARY KEY (`id_UF`),
  ADD KEY `FK_Tb_UF_2` (`id_regiao`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_Tb_Usuario_2` (`cod_tipo_sexo`);

--
-- Indexes for table `tb_usuario_organizacao`
--
ALTER TABLE `tb_usuario_organizacao`
  ADD PRIMARY KEY (`id_usuario_organizacao`),
  ADD KEY `FK_Tb_Usuario_Organizacao_1` (`id_organizacao`),
  ADD KEY `FK_Tb_Usuario_Organizacao_2` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lider_organizacional`
--
ALTER TABLE `tb_lider_organizacional`
  MODIFY `id_lider_organizacional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_organizacao`
--
ALTER TABLE `tb_organizacao`
  MODIFY `id_organizacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tipo_evento`
--
ALTER TABLE `tb_tipo_evento`
  MODIFY `id_tipo_evento` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tipo_organizacao`
--
ALTER TABLE `tb_tipo_organizacao`
  MODIFY `id_tipo_org` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuario_organizacao`
--
ALTER TABLE `tb_usuario_organizacao`
  MODIFY `id_usuario_organizacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD CONSTRAINT `FK_Tb_Cidade_2` FOREIGN KEY (`id_UF`) REFERENCES `tb_uf` (`id_UF`);

--
-- Constraints for table `tb_evento`
--
ALTER TABLE `tb_evento`
  ADD CONSTRAINT `FK_Tb_Evento_2` FOREIGN KEY (`id_tipo_evento`) REFERENCES `tb_tipo_evento` (`id_tipo_evento`),
  ADD CONSTRAINT `FK_Tb_Evento_3` FOREIGN KEY (`id_cidade_evento`) REFERENCES `tb_cidade` (`id_cidade`),
  ADD CONSTRAINT `FK_Tb_Evento_4` FOREIGN KEY (`id_organizacao`) REFERENCES `tb_organizacao` (`id_organizacao`);

--
-- Constraints for table `tb_lider_organizacional`
--
ALTER TABLE `tb_lider_organizacional`
  ADD CONSTRAINT `FK_Tb_Lider_Organizacional_1` FOREIGN KEY (`id_organizacao`) REFERENCES `tb_organizacao` (`id_organizacao`),
  ADD CONSTRAINT `FK_Tb_Lider_Organizacional_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Constraints for table `tb_organizacao`
--
ALTER TABLE `tb_organizacao`
  ADD CONSTRAINT `FK_Tb_Organizacao_2` FOREIGN KEY (`id_tipo_org`) REFERENCES `tb_tipo_organizacao` (`id_tipo_org`),
  ADD CONSTRAINT `FK_Tb_Organizacao_3` FOREIGN KEY (`id_cidade_org`) REFERENCES `tb_cidade` (`id_cidade`),
  ADD CONSTRAINT `FK_Tb_Organizacao_4` FOREIGN KEY (`id_organizacao_pai`) REFERENCES `tb_organizacao` (`id_organizacao`);

--
-- Constraints for table `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD CONSTRAINT `FK_Tb_UF_2` FOREIGN KEY (`id_regiao`) REFERENCES `tb_regiao` (`id_regiao`);

--
-- Constraints for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `FK_Tb_Usuario_2` FOREIGN KEY (`cod_tipo_sexo`) REFERENCES `tb_tipo_sexo` (`cod_tipo_sexo`);

--
-- Constraints for table `tb_usuario_organizacao`
--
ALTER TABLE `tb_usuario_organizacao`
  ADD CONSTRAINT `FK_Tb_Usuario_Organizacao_1` FOREIGN KEY (`id_organizacao`) REFERENCES `tb_organizacao` (`id_organizacao`),
  ADD CONSTRAINT `FK_Tb_Usuario_Organizacao_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
