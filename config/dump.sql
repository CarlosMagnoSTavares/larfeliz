-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para lar_feliz
DROP DATABASE IF EXISTS `lar_feliz`;
CREATE DATABASE IF NOT EXISTS `lar_feliz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `lar_feliz`;

-- Copiando estrutura para tabela lar_feliz.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo_acesso` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.admin: ~0 rows (aproximadamente)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.atividade
DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `frequencia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `horario` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `local` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.atividade: ~0 rows (aproximadamente)
DELETE FROM `atividade`;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.dados_pessoais
DROP TABLE IF EXISTS `dados_pessoais`;
CREATE TABLE IF NOT EXISTS `dados_pessoais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(555) COLLATE utf8_bin NOT NULL,
  `caminho_foto` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_acolhimento` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `motivo_acolhimento` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `anexo_certidao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_CPF` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_cartao_cidadao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_carteira_vacinacao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_guia_recolhimento` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_determinacao_acolhimento` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_historico_escolar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dados_bancarios` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo_sanguineo` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `aspectos_gerais_obs` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `visitas_familiares_obs` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_desligamento` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.dados_pessoais: ~0 rows (aproximadamente)
DELETE FROM `dados_pessoais`;
/*!40000 ALTER TABLE `dados_pessoais` DISABLE KEYS */;
INSERT INTO `dados_pessoais` (`id`, `nome`, `caminho_foto`, `endereco`, `data_acolhimento`, `motivo_acolhimento`, `anexo_certidao`, `anexo_CPF`, `anexo_cartao_cidadao`, `anexo_carteira_vacinacao`, `anexo_guia_recolhimento`, `anexo_determinacao_acolhimento`, `anexo_historico_escolar`, `dados_bancarios`, `tipo_sanguineo`, `aspectos_gerais_obs`, `visitas_familiares_obs`, `data_desligamento`, `update_at`) VALUES
  (6, 'Jorge da Silva', '', '', '2019-08-12', '', '', '', '', '', '', '', '', '', '', '  ', '  ', '', '2019-08-12 16:33:57'),
  (7, 'Marcos Ferro', '', '', '2019-08-14', '', '', '', '', '', '', '', '', '', '', '  ', '  ', '', '2019-08-12 16:34:07'),
  (8, 'Lucas Silvino', '53d57b22cf049dbbb83736152cbdde22.jpg', '', '2019-08-12', '', '', '', '', '', '', '', '', '', '', '  ', '  ', '', '2019-08-12 16:34:21');
/*!40000 ALTER TABLE `dados_pessoais` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.educacao
DROP TABLE IF EXISTS `educacao`;
CREATE TABLE IF NOT EXISTS `educacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `ano` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `tipo_escolaridade` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `escola` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nome_pessoa_contato` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `numero_tel` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `numero_cel` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `anexo_rel_prim_semestre` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_rel_segun_semestre` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `atividade_compl` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.educacao: ~0 rows (aproximadamente)
DELETE FROM `educacao`;
/*!40000 ALTER TABLE `educacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `educacao` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.filiacao
DROP TABLE IF EXISTS `filiacao`;
CREATE TABLE IF NOT EXISTS `filiacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `nivel_parentesco` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nome_parente` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `Endereco` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `atividade_profissional` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dinamica_familiar_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.filiacao: ~0 rows (aproximadamente)
DELETE FROM `filiacao`;
/*!40000 ALTER TABLE `filiacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `filiacao` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.ocorrencia
DROP TABLE IF EXISTS `ocorrencia`;
CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `fato` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_bo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descricao_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.ocorrencia: ~0 rows (aproximadamente)
DELETE FROM `ocorrencia`;
/*!40000 ALTER TABLE `ocorrencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ocorrencia` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.registro_tecnico
DROP TABLE IF EXISTS `registro_tecnico`;
CREATE TABLE IF NOT EXISTS `registro_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_filiacao_visita` int(11) DEFAULT NULL,
  `visita_domiciliar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `informacoes_sobre_visita` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_audiencia` datetime DEFAULT NULL,
  `audiencia_declaracao_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `data_visita_familiar` datetime DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.registro_tecnico: ~0 rows (aproximadamente)
DELETE FROM `registro_tecnico`;
/*!40000 ALTER TABLE `registro_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_tecnico` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.saude
DROP TABLE IF EXISTS `saude`;
CREATE TABLE IF NOT EXISTS `saude` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `tipo_consulta` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_da_consulta` datetime DEFAULT NULL,
  `medicamentos` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `exames` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_do_retorno` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `observacoes_medicas` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.saude: ~0 rows (aproximadamente)
DELETE FROM `saude`;
/*!40000 ALTER TABLE `saude` DISABLE KEYS */;
/*!40000 ALTER TABLE `saude` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
