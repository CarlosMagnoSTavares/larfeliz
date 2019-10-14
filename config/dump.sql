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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.

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

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela lar_feliz.filtros
DROP TABLE IF EXISTS `filtros`;
CREATE TABLE IF NOT EXISTS `filtros` (
  `TABLE_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `COLUMN_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `LABEL` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `DATA_TYPE` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.

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

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportação de dados foi desmarcado.

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

-- Exportação de dados foi desmarcado.

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

-- Copiando estrutura para view lar_feliz.vw_list_filiacao
DROP VIEW IF EXISTS `vw_list_filiacao`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_list_filiacao` (
  `nome_crianca` VARCHAR(555) NOT NULL COLLATE 'utf8_bin',
  `nome_parente` VARCHAR(500) NULL COLLATE 'utf8_bin',
  `id_parente` INT(11) NOT NULL,
  `id` INT(11) NOT NULL,
  `nome` TEXT NULL COLLATE 'utf8_bin',
  `caminho_foto` VARCHAR(555) NULL COLLATE 'utf8_bin'
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
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_atividade` AS SELECT d.nome,d.caminho_foto, a.* 
FROM atividade a INNER JOIN dados_pessoais d ON d.id = a.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_educacao
DROP VIEW IF EXISTS `vw_educacao`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_educacao`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_educacao` AS SELECT d.nome,d.caminho_foto, e.* FROM educacao e INNER JOIN dados_pessoais d ON d.id = e.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_filiacao
DROP VIEW IF EXISTS `vw_filiacao`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_filiacao`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_filiacao` AS SELECT d.nome, d.caminho_foto, f.* FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_list_filiacao
DROP VIEW IF EXISTS `vw_list_filiacao`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_list_filiacao`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_list_filiacao` AS SELECT
d.nome AS nome_crianca, f.nome_parente, 
f.id as id_parente,
f.id as id,
CONCAT 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)AS nome,

d.caminho_foto AS caminho_foto
 FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_ocorrencia
DROP VIEW IF EXISTS `vw_ocorrencia`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_ocorrencia`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_ocorrencia` AS SELECT d.nome,d.caminho_foto, 

o.* 

FROM 

ocorrencia o 

INNER JOIN dados_pessoais d ON d.id = 

o.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_registro_tecnico
DROP VIEW IF EXISTS `vw_registro_tecnico`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_registro_tecnico`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_registro_tecnico` AS SELECT d.nome as nome_crianca,d.caminho_foto, f.nivel_parentesco, f.nome_parente, 
CONCAT 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)AS nome,
r.* 
FROM registro_tecnico r
INNER JOIN filiacao f ON f.id = r.fk_id_filiacao_visita
INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;

-- Copiando estrutura para view lar_feliz.vw_saude
DROP VIEW IF EXISTS `vw_saude`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_saude`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vw_saude` AS SELECT s.`*`,d.nome, d.caminho_foto FROM saude s INNER JOIN dados_pessoais d ON d.id = s.fk_id_pessoal ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.admin: ~0 rows (aproximadamente)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `nome`, `email`, `senha`, `tipo_acesso`, `update_at`) VALUES
  (6, 'CARLOS MAGNO SILVA TAVARES', 'CARLOSCRLS@HOTMAIL.COM', 'CARLOSCRLS', 'ADMIN', '2019-10-14 19:54:31');




-- Copiando estrutura para tabela lar_feliz.filtros
DROP TABLE IF EXISTS `filtros`;
CREATE TABLE IF NOT EXISTS `filtros` (
  `TABLE_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `COLUMN_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `LABEL` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `DATA_TYPE` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela lar_feliz.filtros: ~56 rows (aproximadamente)
DELETE FROM `filtros`;
/*!40000 ALTER TABLE `filtros` DISABLE KEYS */;
INSERT INTO `filtros` (`TABLE_NAME`, `COLUMN_NAME`, `LABEL`, `DATA_TYPE`) VALUES
  ('dados_pessoais', 'nome', 'nome', 'varchar'),
  ('dados_pessoais', 'endereco', 'endereco', 'varchar'),
  ('dados_pessoais', 'data_acolhimento', 'data_acolhimento', 'varchar'),
  ('dados_pessoais', 'motivo_acolhimento', 'motivo_acolhimento', 'varchar'),
  ('dados_pessoais', 'dados_bancarios', 'dados_bancarios', 'varchar'),
  ('dados_pessoais', 'tipo_sanguineo', 'tipo_sanguineo', 'varchar'),
  ('dados_pessoais', 'aspectos_gerais_obs', 'aspectos_gerais_obs', 'varchar'),
  ('dados_pessoais', 'visitas_familiares_obs', 'visitas_familiares_obs', 'varchar'),
  ('dados_pessoais', 'data_desligamento', 'data_desligamento', 'varchar'),
  ('vw_atividade', 'nome', 'nome', 'varchar'),
  ('vw_atividade', 'frequencia', 'frequencia', 'varchar'),
  ('vw_atividade', 'dia', 'dia', 'varchar'),
  ('vw_atividade', 'horario', 'horario', 'varchar'),
  ('vw_atividade', 'local', 'local', 'varchar'),
  ('vw_educacao', 'nome', 'nome', 'varchar'),
  ('vw_educacao', 'ano', 'ano', 'varchar'),
  ('vw_educacao', 'escola', 'escola', 'varchar'),
  ('vw_educacao', 'nome_pessoa_contato', 'nome_pessoa_contato', 'varchar'),
  ('vw_educacao', 'numero_tel', 'numero_tel', 'varchar'),
  ('vw_educacao', 'numero_cel', 'numero_cel', 'varchar'),
  ('vw_filiacao', 'nome', 'nome', 'varchar'),
  ('vw_filiacao', 'nivel_parentesco', 'nivel_parentesco', 'varchar'),
  ('vw_filiacao', 'nome_parente', 'nome_parente', 'varchar'),
  ('vw_filiacao', 'Endereco', 'Endereco', 'varchar'),
  ('vw_filiacao', 'telefone', 'telefone', 'varchar'),
  ('vw_filiacao', 'dinamica_familiar_obs', 'dinamica_familiar_obs', 'varchar'),
  ('vw_list_filiacao', 'nome_crianca', 'nome_crianca', 'varchar'),
  ('vw_list_filiacao', 'nome_parente', 'nome_parente', 'varchar'),
  ('vw_list_filiacao', 'nome', 'nome', 'text'),
  ('vw_ocorrencia', 'nome', 'nome', 'varchar'),
  ('vw_ocorrencia', 'tipo', 'tipo', 'varchar'),
  ('vw_ocorrencia', 'data', 'data', 'varchar'),
  ('vw_ocorrencia', 'fato', 'fato', 'varchar'),
  ('vw_ocorrencia', 'descricao_obs', 'descricao_obs', 'varchar'),
  ('vw_registro_tecnico', 'nome_crianca', 'nome_crianca', 'varchar'),
  ('vw_registro_tecnico', 'nivel_parentesco', 'nivel_parentesco', 'varchar'),
  ('vw_registro_tecnico', 'nome_parente', 'nome_parente', 'varchar'),
  ('vw_registro_tecnico', 'nome', 'nome', 'text'),
  ('vw_registro_tecnico', 'visita_domiciliar', 'visita_domiciliar', 'varchar'),
  ('vw_registro_tecnico', 'informacoes_sobre_visita', 'informacoes_sobre_visita', 'varchar'),
  ('vw_registro_tecnico', 'data_audiencia', 'data_audiencia', 'varchar'),
  ('vw_registro_tecnico', 'audiencia_declaracao_obs', 'audiencia_declaracao_obs', 'varchar'),
  ('vw_registro_tecnico', 'data_visita_familiar', 'data_visita_familiar', 'varchar'),
  ('vw_saude', 'tipo_consulta', 'tipo_consulta', 'varchar'),
  ('vw_saude', 'data_da_consulta', 'data_da_consulta', 'varchar'),
  ('vw_saude', 'medicamentos', 'medicamentos', 'varchar'),
  ('vw_saude', 'exames', 'exames', 'varchar'),
  ('vw_saude', 'data_do_retorno', 'data_do_retorno', 'varchar'),
  ('vw_saude', 'observacoes_medicas', 'observacoes_medicas', 'varchar'),
  ('vw_saude', 'nome', 'nome', 'varchar'),
  ('admin', 'id', 'id', 'int'),
  ('admin', 'nome', 'nome', 'varchar'),
  ('admin', 'email', 'email', 'varchar'),
  ('admin', 'senha', 'senha', 'varchar'),
  ('admin', 'tipo_acesso', 'tipo_acesso', 'varchar'),
  ('admin', 'update_at', 'update_at', 'timestamp');
/*!40000 ALTER TABLE `filtros` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

