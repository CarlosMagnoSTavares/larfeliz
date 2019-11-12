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



-- NOVOS CAMPOS
ALTER TABLE `dados_pessoais`
  ADD COLUMN `data_nascimento` VARCHAR(10) NULL DEFAULT NULL AFTER `data_desligamento`,
  ADD COLUMN `numero_processo` VARCHAR(255) NULL DEFAULT NULL AFTER `data_nascimento`;
-- NOVOS CAMPOS



-- Copiando estrutura do banco de dados para voar_feliz
CREATE DATABASE IF NOT EXISTS `voar_feliz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `voar_feliz`;

-- Copiando estrutura para tabela voar_feliz.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo_acesso` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.atividade
CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `frequencia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `horario` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `local` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.dados_pessoais
CREATE TABLE IF NOT EXISTS `dados_pessoais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(555) COLLATE utf8_bin NOT NULL,
  `caminho_foto` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_acolhimento` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `motivo_acolhimento` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `anexo_certidao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `anexo_cpf` varchar(255) COLLATE utf8_bin DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.educacao
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.filiacao
CREATE TABLE IF NOT EXISTS `filiacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` int(11) DEFAULT NULL,
  `nivel_parentesco` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nome_parente` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `atividade_profissional` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dinamica_familiar_obs` varchar(555) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.filtros
CREATE TABLE IF NOT EXISTS `filtros` (
  `table_name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `column_name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `label` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `data_type` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.hist_acolhidos
CREATE TABLE IF NOT EXISTS `hist_acolhidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_acolhimento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `origem` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `data_nascimento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nome_pai` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nome_mae` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `data_desligamento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `destino` longtext COLLATE utf8_bin,
  `info_diversas` longtext COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.ocorrencia
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

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.registro_tecnico
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

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela voar_feliz.saude
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para view voar_feliz.vw_atividade
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_atividade` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `frequencia` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `dia` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `horario` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `local` VARCHAR(255) NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Copiando estrutura para view voar_feliz.vw_educacao
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

-- Copiando estrutura para view voar_feliz.vw_filiacao
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_filiacao` (
  `nome` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `id` INT(11) NOT NULL,
  `fk_id_pessoal` INT(11) NULL,
  `nivel_parentesco` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `nome_parente` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `endereco` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `telefone` VARCHAR(50) NULL COLLATE 'utf8_bin',
  `atividade_profissional` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `dinamica_familiar_obs` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `update_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view voar_feliz.vw_list_filiacao
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_list_filiacao` (
  `nome_crianca` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `nome_parente` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `id_parente` INT(11) NOT NULL,
  `id` INT(11) NOT NULL,
  `nome` TEXT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Copiando estrutura para view voar_feliz.vw_ocorrencia
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

-- Copiando estrutura para view voar_feliz.vw_registro_tecnico
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_registro_tecnico` (
  `nome_crianca` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin',
  `nivel_parentesco` VARCHAR(255) NULL COLLATE 'utf8_bin',
  `nome_parente` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `nome` TEXT NULL COLLATE 'utf8_bin',
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

-- Copiando estrutura para view voar_feliz.vw_saude
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

-- Copiando estrutura para view voar_feliz.vw_atividade
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_atividade`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_atividade` AS SELECT d.nome,d.caminho_foto, a.* 
FROM atividade a INNER JOIN dados_pessoais d ON d.id = a.fk_id_pessoal ;

-- Copiando estrutura para view voar_feliz.vw_educacao
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_educacao`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_educacao` AS SELECT d.nome,d.caminho_foto, e.* FROM educacao e INNER JOIN dados_pessoais d ON d.id = e.fk_id_pessoal ;

-- Copiando estrutura para view voar_feliz.vw_filiacao
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_filiacao`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_filiacao` AS SELECT d.nome, d.caminho_foto, f.* FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view voar_feliz.vw_list_filiacao
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_list_filiacao`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_list_filiacao` AS SELECT
d.nome AS nome_crianca, f.nome_parente, 
f.id as id_parente,
f.id as id,
CONCAT 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)AS nome,

d.caminho_foto AS caminho_foto
 FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view voar_feliz.vw_ocorrencia
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_ocorrencia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocorrencia` AS SELECT d.nome,d.caminho_foto, 
o.*  FROM 
ocorrencia o 
INNER JOIN dados_pessoais d ON d.id = 
o.fk_id_pessoal ;

-- Copiando estrutura para view voar_feliz.vw_registro_tecnico
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_registro_tecnico`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_registro_tecnico` AS SELECT d.nome as nome_crianca,d.caminho_foto, f.nivel_parentesco, f.nome_parente, 
CONCAT 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)AS nome,
r.* 
FROM registro_tecnico r
INNER JOIN filiacao f ON f.id = r.fk_id_filiacao_visita
INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view voar_feliz.vw_saude
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_saude`;
CREATE ALGORITHM=UNDEFINED DEFINER=`larf_feliz`@`localhost` SQL SECURITY DEFINER VIEW `vw_saude` AS SELECT s.* ,d.nome, d.caminho_foto FROM saude s INNER JOIN dados_pessoais d ON d.id = s.fk_id_pessoal ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
