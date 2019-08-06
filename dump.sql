-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para lar_feliz
CREATE DATABASE IF NOT EXISTS `lar_feliz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `lar_feliz`;

-- Copiando estrutura para tabela lar_feliz.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo_acesso` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.atividade
CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `frequencia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `horario` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `local` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.dados_pessoais
CREATE TABLE IF NOT EXISTS `dados_pessoais` (
  `id_pessoal` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(555) COLLATE utf8_bin NOT NULL,
  `caminho_foto` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_acolhimento` datetime DEFAULT NULL,
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
  `data_desligamento` datetime DEFAULT NULL,
  `fk_id_filiacao_desligamento` int(11) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pessoal`),
  KEY `fk_filiacao_desligamento` (`fk_id_filiacao_desligamento`),
  CONSTRAINT `fk_filiacao_desligamento` FOREIGN KEY (`fk_id_filiacao_desligamento`) REFERENCES `filiacao` (`id_filiacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.educacao
CREATE TABLE IF NOT EXISTS `educacao` (
  `id_educacao` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_educacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.filiacao
CREATE TABLE IF NOT EXISTS `filiacao` (
  `id_filiacao` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `nivel_parentesco` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nome_parente` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `Endereco` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `atividade_profissional` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dinamica_familiar_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_filiacao`),
  KEY `fk_ref_dados_pessoais` (`fk_id_pessoal`),
  CONSTRAINT `fk_ref_dados_pessoais` FOREIGN KEY (`fk_id_pessoal`) REFERENCES `dados_pessoais` (`id_pessoal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.ocorrencia
CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `id_ocorrencia` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `fato` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_bo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descricao_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ocorrencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.registro_tecnico
CREATE TABLE IF NOT EXISTS `registro_tecnico` (
  `id_registro_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_filiacao_visita` int(11) DEFAULT NULL,
  `visita_domiciliar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `informacoes_sobre_visita` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_audiencia` datetime DEFAULT NULL,
  `audiencia_declaracao_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `data_visita_familiar` datetime DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_registro_tecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela lar_feliz.saude
CREATE TABLE IF NOT EXISTS `saude` (
  `id_saude` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `tipo_consulta` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_da_consulta` datetime DEFAULT NULL,
  `medicamentos` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `exames` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_do_retorno` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `observacoes_medicas` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_saude`),
  KEY `fk_saude_dados_pessoais` (`fk_id_pessoal`),
  CONSTRAINT `fk_saude_dados_pessoais` FOREIGN KEY (`fk_id_pessoal`) REFERENCES `dados_pessoais` (`id_pessoal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
