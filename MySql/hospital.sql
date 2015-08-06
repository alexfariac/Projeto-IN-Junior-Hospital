-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Ago-2015 às 14:51
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `fk_usuario` int(10) unsigned NOT NULL,
  `fk_tipo_funcionario` int(10) unsigned NOT NULL,
  `nome` varchar(64) NOT NULL,
  `cpf` char(11) NOT NULL,
  `endereço` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`fk_usuario`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_tipo_funcionario` (`fk_tipo_funcionario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`fk_usuario`, `fk_tipo_funcionario`, `nome`, `cpf`, `endereço`, `email`) VALUES
(1, 1, 'Sr Admin', '11111111111', '', 'emailAdmin'),
(2, 2, 'Dr funcionario', '44444444444', '', 'emailFunc'),
(3, 3, 'Sra Recepcionista', '55555555555', '', 'emailRec');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) NOT NULL,
  `cpf` char(11) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome`, `cpf`) VALUES
(1, 'Cliente', '22222222222'),
(2, 'Chatinho', '33333333333');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE IF NOT EXISTS `ponto` (
  `id_ponto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(10) unsigned NOT NULL,
  `data_hora_entrada` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_hora_saida` datetime DEFAULT NULL,
  `horas_trabalhadas` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_ponto`),
  KEY `fk_usuario_ponto` (`fk_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`id_ponto`, `fk_usuario`, `data_hora_entrada`, `data_hora_saida`, `horas_trabalhadas`) VALUES
(1, 1, '2015-07-30 09:00:00', '2015-07-30 11:00:00', NULL),
(2, 2, '2015-07-30 09:00:00', '2015-07-30 17:00:00', NULL),
(3, 3, '2015-07-30 09:00:00', '2015-07-30 16:00:00', NULL),
(4, 1, '2015-07-30 09:00:00', '2015-07-30 11:00:00', NULL),
(5, 2, '2015-07-30 09:00:00', '2015-07-30 17:00:00', NULL),
(6, 3, '2015-07-30 09:00:00', '2015-07-30 16:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS `prontuario` (
  `id_prontuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_quarto` int(10) unsigned NOT NULL,
  `fk_usuario` int(10) unsigned NOT NULL,
  `fk_paciente` int(10) unsigned NOT NULL,
  `fk_status_saude` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_prontuario`),
  KEY `fk_quarto` (`fk_quarto`),
  KEY `fk_usuario_prontuario` (`fk_usuario`),
  KEY `fk_paciente` (`fk_paciente`),
  KEY `fk_status_saude` (`fk_status_saude`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`id_prontuario`, `fk_quarto`, `fk_usuario`, `fk_paciente`, `fk_status_saude`) VALUES
(1, 1, 1, 1, 4),
(2, 2, 1, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE IF NOT EXISTS `quarto` (
  `id_quarto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_tipo_quarto` int(10) unsigned NOT NULL,
  `fk_status_quarto` int(10) unsigned NOT NULL DEFAULT '1',
  `quarto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_quarto`),
  UNIQUE KEY `quarto` (`quarto`),
  KEY `fk_tipo_quarto` (`fk_tipo_quarto`),
  KEY `fk_status_quarto` (`fk_status_quarto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`id_quarto`, `fk_tipo_quarto`, `fk_status_quarto`, `quarto`) VALUES
(1, 2, 3, 1),
(2, 1, 2, 2),
(3, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_quarto`
--

CREATE TABLE IF NOT EXISTS `status_quarto` (
  `id_status_quarto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_quarto` varchar(64) NOT NULL,
  PRIMARY KEY (`id_status_quarto`),
  UNIQUE KEY `status_quarto` (`status_quarto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_quarto`
--

INSERT INTO `status_quarto` (`id_status_quarto`, `status_quarto`) VALUES
(1, 'Com vaga'),
(2, 'Sem vaga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_saude`
--

CREATE TABLE IF NOT EXISTS `status_saude` (
  `id_status_saude` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_saude` varchar(64) NOT NULL,
  PRIMARY KEY (`id_status_saude`),
  UNIQUE KEY `status_saude` (`status_saude`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status_saude`
--

INSERT INTO `status_saude` (`id_status_saude`, `status_saude`) VALUES
(1, 'Alta'),
(2, 'Urgencia'),
(3, 'Emergencia'),
(4, 'Observacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_usuario`
--

CREATE TABLE IF NOT EXISTS `status_usuario` (
  `id_status_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_usuario` varchar(64) NOT NULL,
  PRIMARY KEY (`id_status_usuario`),
  UNIQUE KEY `status_usuario` (`status_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_usuario`
--

INSERT INTO `status_usuario` (`id_status_usuario`, `status_usuario`) VALUES
(1, 'Ativado'),
(2, 'Desativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_funcionario`
--

CREATE TABLE IF NOT EXISTS `tipo_funcionario` (
  `id_tipo_funcionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_funcionario` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_funcionario`),
  UNIQUE KEY `tipo_funcionario` (`tipo_funcionario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_funcionario`
--

INSERT INTO `tipo_funcionario` (`id_tipo_funcionario`, `tipo_funcionario`) VALUES
(1, 'Admin'),
(2, 'funcionario'),
(3, 'Recepcionista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_quarto`
--

CREATE TABLE IF NOT EXISTS `tipo_quarto` (
  `id_tipo_quarto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_quarto` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_quarto`),
  UNIQUE KEY `tipo_quarto` (`tipo_quarto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipo_quarto`
--

INSERT INTO `tipo_quarto` (`id_tipo_quarto`, `tipo_quarto`) VALUES
(1, 'Individual'),
(2, 'Coletivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `fk_status_usuario` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login` (`login`),
  KEY `fk_status_usuario` (`fk_status_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `fk_status_usuario`) VALUES
(1, 'Admin', 'Admin', 1),
(2, 'Medico', 'Medico', 1),
(3, 'Recepcionista', 'Recepcionista', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
