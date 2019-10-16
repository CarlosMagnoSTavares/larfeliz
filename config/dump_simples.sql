
-- Coloque aqui o nome do banco
USE `larf_feliz`; 


DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `atividade`;
DROP TABLE IF EXISTS `dados_pessoais`;
DROP TABLE IF EXISTS `educacao`;
DROP TABLE IF EXISTS `filiacao`;
DROP TABLE IF EXISTS `filtros`;
DROP TABLE IF EXISTS `hist_acolhidos`;
DROP TABLE IF EXISTS `ocorrencia`;
DROP TABLE IF EXISTS `registro_tecnico`;
DROP TABLE IF EXISTS `saude`;
DROP TABLE IF EXISTS `vw_atividade`;
DROP TABLE IF EXISTS `vw_educacao`;
DROP TABLE IF EXISTS `vw_filiacao`;
DROP TABLE IF EXISTS `vw_list_filiacao`;
DROP TABLE IF EXISTS `vw_ocorrencia`;
DROP TABLE IF EXISTS `vw_registro_tecnico`;
DROP TABLE IF EXISTS `vw_saude`;

DROP VIEW IF EXISTS `vw_atividade`;
DROP VIEW IF EXISTS `vw_educacao`;
DROP VIEW IF EXISTS `vw_filiacao`;
DROP VIEW IF EXISTS `vw_list_filiacao`;
DROP VIEW IF EXISTS `vw_ocorrencia`;
DROP VIEW IF EXISTS `vw_registro_tecnico`;
DROP VIEW IF EXISTS `vw_saude`;



CREATE TABLE  `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo_acesso` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



CREATE TABLE  `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoal` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `frequencia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `horario` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `local` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



CREATE TABLE  `dados_pessoais` (
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



CREATE TABLE  `educacao` (
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



CREATE TABLE  `filiacao` (
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




CREATE TABLE  `filtros` (
  `TABLE_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `COLUMN_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `LABEL` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `DATA_TYPE` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



CREATE TABLE  `hist_acolhidos` (
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




CREATE TABLE  `ocorrencia` (
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



CREATE TABLE  `registro_tecnico` (
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




CREATE TABLE  `saude` (
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




CREATE VIEW `vw_atividade` AS
   SELECT d.nome,d.caminho_foto, a.* 
FROM atividade a INNER JOIN dados_pessoais d ON d.id = a.fk_id_pessoal ;



CREATE VIEW `vw_educacao` AS
   SELECT d.nome,d.caminho_foto, e.* FROM educacao e INNER JOIN dados_pessoais d ON d.id = e.fk_id_pessoal ;



CREATE VIEW `vw_filiacao` AS
   SELECT d.nome, d.caminho_foto, f.* FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;




CREATE VIEW `vw_list_filiacao` AS
   SELECT
d.nome AS nome_crianca, f.nome_parente, 
f.id as id_parente,
f.id as id,
CONCAT 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)AS nome,

d.caminho_foto AS caminho_foto
 FROM filiacao f INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;



CREATE VIEW `vw_ocorrencia` AS
   SELECT d.nome,d.caminho_foto, 
o.*  FROM 
ocorrencia o 
INNER JOIN dados_pessoais d ON d.id = 
o.fk_id_pessoal ;



CREATE VIEW `vw_registro_tecnico` AS
   SELECT d.nome as nome_crianca,d.caminho_foto, f.nivel_parentesco, f.nome_parente, 
CONCAT 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)AS nome,
r.* 
FROM registro_tecnico r
INNER JOIN filiacao f ON f.id = r.fk_id_filiacao_visita
INNER JOIN dados_pessoais d ON d.id = f.fk_id_pessoal ;



CREATE VIEW `vw_saude` AS
   SELECT s.* ,d.nome, d.caminho_foto FROM saude s INNER JOIN dados_pessoais d ON d.id = s.fk_id_pessoal ;



delete from filtros where 1=1;
delete from admin where 1=1;

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
  ('admin', 'update_at', 'update_at', 'timestamp'),
  ('hist_acolhidos', 'id', 'id', 'int'),
  ('hist_acolhidos', 'nome', 'nome', 'varchar'),
  ('hist_acolhidos', 'data_acolhimento', 'data_acolhimento', 'varchar'),
  ('hist_acolhidos', 'origem', 'origem', 'varchar'),
  ('hist_acolhidos', 'data_nascimento', 'data_nascimento', 'varchar'),
  ('hist_acolhidos', 'nome_pai', 'nome_pai', 'varchar'),
  ('hist_acolhidos', 'nome_mae', 'nome_mae', 'varchar'),
  ('hist_acolhidos', 'data_desligamento', 'data_desligamento', 'varchar'),
  ('hist_acolhidos', 'destino', 'destino', 'longtext'),
  ('hist_acolhidos', 'info_diversas', 'info_diversas', 'longtext');



  INSERT INTO `admin` (`id`, `nome`, `email`, `senha`, `tipo_acesso`, `update_at`) VALUES
  (7, 'USUARIO INICIAL ', 'ADMIN@ADMIN.COM', 'ADMIN', 'ADMIN', '2019-10-14 21:00:02');