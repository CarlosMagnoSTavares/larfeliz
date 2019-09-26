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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.atividade: ~1 rows (aproximadamente)
DELETE FROM `atividade`;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` (`id`, `fk_id_pessoal`, `frequencia`, `dia`, `horario`, `local`) VALUES
  (2, '15', 'DanÃ§a de funk 2 vezes ao dia ', '10,15,20', '10:55', 'Centro CESP');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.dados_pessoais: ~2 rows (aproximadamente)
DELETE FROM `dados_pessoais`;
/*!40000 ALTER TABLE `dados_pessoais` DISABLE KEYS */;
INSERT INTO `dados_pessoais` (`id`, `nome`, `caminho_foto`, `endereco`, `data_acolhimento`, `motivo_acolhimento`, `anexo_certidao`, `anexo_CPF`, `anexo_cartao_cidadao`, `anexo_carteira_vacinacao`, `anexo_guia_recolhimento`, `anexo_determinacao_acolhimento`, `anexo_historico_escolar`, `dados_bancarios`, `tipo_sanguineo`, `aspectos_gerais_obs`, `visitas_familiares_obs`, `data_desligamento`, `update_at`) VALUES
  (14, 'Teste joÃ£o', 'b119ab22c579eb3c65268d20421a33ec.jpg', '', '2019-08-14', '', '', '', '', '', '', '', '', '', '', '  ', '  ', '', '2019-09-25 15:44:12'),
  (15, 'Luquinhas', 'foto_2019.09.25-19.34.35.jpg', 'aoskda', '0012-03-12', 'Sem motivo', '', '', '', '', '', '', '', '123123-12312', 'A+', 'Sem aspectos', 'Sem familiares', '0102-03-12', '2019-09-25 19:34:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.educacao: ~1 rows (aproximadamente)
DELETE FROM `educacao`;
/*!40000 ALTER TABLE `educacao` DISABLE KEYS */;
INSERT INTO `educacao` (`id`, `fk_id_pessoal`, `ano`, `tipo_escolaridade`, `escola`, `nome_pessoa_contato`, `numero_tel`, `numero_cel`, `anexo_rel_prim_semestre`, `anexo_rel_segun_semestre`, `atividade_compl`, `update_at`) VALUES
  (2, 14, '2019', 'Teste', 'asdas', 'asdas', '123123', '  123123', 'anexo_rel_prim_semestre_2019.09.25-19.56.35.jpg', '', NULL, '2019-09-25 19:56:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.filiacao: ~2 rows (aproximadamente)
DELETE FROM `filiacao`;
/*!40000 ALTER TABLE `filiacao` DISABLE KEYS */;
INSERT INTO `filiacao` (`id`, `fk_id_pessoal`, `nivel_parentesco`, `nome_parente`, `Endereco`, `telefone`, `atividade_profissional`, `dinamica_familiar_obs`, `update_at`) VALUES
  (3, 15, 'Pai', 'JÃ£o marcos', 'RUa', '132131', 'Teste', ' Normazinho ', '2019-08-14 23:02:30'),
  (4, 14, 'Pai do jÃ£o pai', 'Jao pai', 'end', 'tel', 'ativ', ' dinami  ', '2019-08-14 23:02:12'),
  (5, 14, 'Mae', 'MÃ£e do JÃ£o', 'asjdkasj', '10923901283', 'nada', 'legal  ', '2019-09-25 14:18:50');
/*!40000 ALTER TABLE `filiacao` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.ocorrencia
DROP TABLE IF EXISTS `ocorrencia`;
CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `fato` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_bo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descricao_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.ocorrencia: ~0 rows (aproximadamente)
DELETE FROM `ocorrencia`;
/*!40000 ALTER TABLE `ocorrencia` DISABLE KEYS */;
INSERT INTO `ocorrencia` (`id`, `fk_id_pessoal`, `tipo`, `data`, `fato`, `anexo_bo`, `descricao_obs`, `update_at`) VALUES
  (1, 14, 'Policial', '2019-09-27', 'Fincou a faca no amigo', '', 'Deve passar acompanhamento mÃ©dico', '2019-09-25 20:54:22');
/*!40000 ALTER TABLE `ocorrencia` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.registro_tecnico
DROP TABLE IF EXISTS `registro_tecnico`;
CREATE TABLE IF NOT EXISTS `registro_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_filiacao_visita` int(11) DEFAULT NULL,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `visita_domiciliar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `informacoes_sobre_visita` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_audiencia` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `audiencia_declaracao_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `data_visita_familiar` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.registro_tecnico: ~0 rows (aproximadamente)
DELETE FROM `registro_tecnico`;
/*!40000 ALTER TABLE `registro_tecnico` DISABLE KEYS */;
INSERT INTO `registro_tecnico` (`id`, `fk_id_filiacao_visita`, `fk_id_pessoal`, `visita_domiciliar`, `informacoes_sobre_visita`, `data_audiencia`, `audiencia_declaracao_obs`, `data_visita_familiar`, `update_at`) VALUES
  (1, 4, 14, 'Sim', 'Muito bom', '16/03/2020', 'Sem obs', '2019-09-25', '2019-09-25 21:09:33');
/*!40000 ALTER TABLE `registro_tecnico` ENABLE KEYS */;

-- Copiando estrutura para tabela lar_feliz.saude
DROP TABLE IF EXISTS `saude`;
CREATE TABLE IF NOT EXISTS `saude` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `tipo_consulta` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_da_consulta` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `medicamentos` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `exames` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_do_retorno` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `observacoes_medicas` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.saude: ~2 rows (aproximadamente)
DELETE FROM `saude`;
/*!40000 ALTER TABLE `saude` DISABLE KEYS */;
INSERT INTO `saude` (`id`, `fk_id_pessoal`, `tipo_consulta`, `data_da_consulta`, `medicamentos`, `exames`, `data_do_retorno`, `observacoes_medicas`, `anexo`, `update_at`) VALUES
  (4, 14, 'Pediatrica2', '2019-09-27', '', 'asdasd', '2019-09-12', '                ', '345b5bae2c35ad227cf8e10b89564dee.jpg', '2019-09-25 15:44:43'),
  (5, 15, 'asdasd', '2019-09-12', '', '', '', '    ', 'anexo_2019.09.25-19.56.55.jpg', '2019-09-25 19:56:55');
/*!40000 ALTER TABLE `saude` ENABLE KEYS */;

-- Copiando estrutura para view lar_feliz.vw_atividade
DROP VIEW IF EXISTS `vw_atividade`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_atividade` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `frequencia` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `dia` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `horario` VARCHAR(10) NULL COLLATE 'utf8_bin',
  `local` VARCHAR(255) NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Copiando estrutura para view lar_feliz.vw_educacao
DROP VIEW IF EXISTS `vw_educacao`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_educacao` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` INT(11) NULL,
  `ano` VARCHAR(4) NULL COLLATE 'utf8_bin',
  `tipo_escolaridade` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `escola` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `nome_pessoa_contato` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `numero_tel` VARCHAR(25) NULL COLLATE 'utf8_bin',
  `numero_cel` VARCHAR(25) NULL COLLATE 'utf8_bin',
  `anexo_rel_prim_semestre` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `anexo_rel_segun_semestre` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `atividade_compl` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `update_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view lar_feliz.vw_filiacao
DROP VIEW IF EXISTS `vw_filiacao`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_filiacao` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` INT(11) NULL,
  `nivel_parentesco` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `nome_parente` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `Endereco` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `telefone` VARCHAR(50) NULL COLLATE 'utf8_bin',
  `atividade_profissional` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `dinamica_familiar_obs` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `update_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view lar_feliz.vw_ocorrencia
DROP VIEW IF EXISTS `vw_ocorrencia`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_ocorrencia` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` INT(11) NULL,
  `tipo` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `data` VARCHAR(10) NULL COLLATE 'utf8_bin',
  `fato` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `anexo_bo` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `descricao_obs` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `update_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view lar_feliz.vw_registro_tecnico
DROP VIEW IF EXISTS `vw_registro_tecnico`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_registro_tecnico` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `nivel_parentesco` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `nome_parente` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_filiacao_visita` INT(11) NULL,
  `fk_id_pessoal` INT(11) NULL,
  `visita_domiciliar` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `informacoes_sobre_visita` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `data_audiencia` VARCHAR(50) NULL COLLATE 'utf8_bin',
  `audiencia_declaracao_obs` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `data_visita_familiar` VARCHAR(50) NULL COLLATE 'utf8_bin',
  `update_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view lar_feliz.vw_saude
DROP VIEW IF EXISTS `vw_saude`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_saude` (
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` INT(11) NULL,
  `tipo_consulta` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `data_da_consulta` VARCHAR(50) NULL COLLATE 'utf8_bin',
  `medicamentos` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `exames` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `data_do_retorno` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `observacoes_medicas` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `anexo` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `update_at` TIMESTAMP NULL,
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Copiando estrutura para view lar_feliz.vw_atividade
DROP VIEW IF EXISTS `vw_atividade`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_atividade`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_atividade` AS SELECT d.nome,d.caminho_foto, a.* 
FROM atividade a INNER JOIN dados_pessoais d ON d.id = a.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_educacao
DROP VIEW IF EXISTS `vw_educacao`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_educacao`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_educacao` AS SELECT d.nome,d.caminho_foto, e.* FROM educacao e INNER JOIN dados_pessoais d ON d.id = e.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_filiacao
DROP VIEW IF EXISTS `vw_filiacao`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_filiacao`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_filiacao` AS SELECT d.nome, d.caminho_foto, f.* FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_ocorrencia
DROP VIEW IF EXISTS `vw_ocorrencia`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_ocorrencia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocorrencia` AS SELECT d.nome,d.caminho_foto, 

o.* 

FROM 

ocorrencia o 

INNER JOIN dados_pessoais d ON d.id = 

o.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_registro_tecnico
DROP VIEW IF EXISTS `vw_registro_tecnico`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_registro_tecnico`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_registro_tecnico` AS SELECT d.nome,d.caminho_foto, f.nivel_parentesco, f.nome_parente, r.* 
FROM registro_tecnico r
INNER JOIN dados_pessoais d ON d.id = r.fk_id_pessoal 
INNER JOIN filiacao f ON f.id = r.fk_id_filiacao_visita ;

-- Copiando estrutura para view lar_feliz.vw_saude
DROP VIEW IF EXISTS `vw_saude`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_saude`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_saude` AS SELECT s.`*`,d.nome, d.caminho_foto FROM saude s INNER JOIN dados_pessoais d ON d.id = s.fk_id_pessoal ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
