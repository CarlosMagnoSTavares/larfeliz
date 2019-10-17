drop database if exists voar_feliz;

create database voar_feliz; 

-- coloque aqui o nome do banco
use `voar_feliz`; 


drop table if exists `admin`;
drop table if exists `atividade`;
drop table if exists `dados_pessoais`;
drop table if exists `educacao`;
drop table if exists `filiacao`;
drop table if exists `filtros`;
drop table if exists `hist_acolhidos`;
drop table if exists `ocorrencia`;
drop table if exists `registro_tecnico`;
drop table if exists `saude`;
drop table if exists `vw_atividade`;
drop table if exists `vw_educacao`;
drop table if exists `vw_filiacao`;
drop table if exists `vw_list_filiacao`;
drop table if exists `vw_ocorrencia`;
drop table if exists `vw_registro_tecnico`;
drop table if exists `vw_saude`;

drop view if exists `vw_atividade`;
drop view if exists `vw_educacao`;
drop view if exists `vw_filiacao`;
drop view if exists `vw_list_filiacao`;
drop view if exists `vw_ocorrencia`;
drop view if exists `vw_registro_tecnico`;
drop view if exists `vw_saude`;



create table  `admin` (
  `id` int(11) not null auto_increment,
  `nome` varchar(255) collate utf8_bin default null,
  `email` varchar(255) collate utf8_bin default null,
  `senha` varchar(255) collate utf8_bin default null,
  `tipo_acesso` varchar(255) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=8 default charset=utf8 collate=utf8_bin;



create table  `atividade` (
  `id` int(11) not null auto_increment,
  `fk_id_pessoal` varchar(255) collate utf8_bin default null,
  `frequencia` varchar(255) collate utf8_bin default null,
  `dia` varchar(255) collate utf8_bin default null,
  `horario` varchar(10) collate utf8_bin default null,
  `local` varchar(255) collate utf8_bin default null,
  primary key (`id`)
) engine=innodb auto_increment=5 default charset=utf8 collate=utf8_bin;



create table  `dados_pessoais` (
  `id` int(11) not null auto_increment,
  `nome` varchar(555) collate utf8_bin not null,
  `caminho_foto` varchar(555) collate utf8_bin default null,
  `endereco` varchar(500) collate utf8_bin default null,
  `data_acolhimento` varchar(10) collate utf8_bin default null,
  `motivo_acolhimento` varchar(500) collate utf8_bin default null,
  `anexo_certidao` varchar(255) collate utf8_bin default null,
  `anexo_cpf` varchar(255) collate utf8_bin default null,
  `anexo_cartao_cidadao` varchar(255) collate utf8_bin default null,
  `anexo_carteira_vacinacao` varchar(255) collate utf8_bin default null,
  `anexo_guia_recolhimento` varchar(255) collate utf8_bin default null,
  `anexo_determinacao_acolhimento` varchar(255) collate utf8_bin default null,
  `anexo_historico_escolar` varchar(255) collate utf8_bin default null,
  `dados_bancarios` varchar(255) collate utf8_bin default null,
  `tipo_sanguineo` varchar(5) collate utf8_bin default null,
  `aspectos_gerais_obs` varchar(500) collate utf8_bin default null,
  `visitas_familiares_obs` varchar(500) collate utf8_bin default null,
  `data_desligamento` varchar(10) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=18 default charset=utf8 collate=utf8_bin;



create table  `educacao` (
  `id` int(11) not null auto_increment,
  `fk_id_pessoal` int(11) default null,
  `ano` varchar(4) collate utf8_bin default null,
  `tipo_escolaridade` varchar(255) collate utf8_bin default null,
  `escola` varchar(255) collate utf8_bin default null,
  `nome_pessoa_contato` varchar(255) collate utf8_bin default null,
  `numero_tel` varchar(25) collate utf8_bin default null,
  `numero_cel` varchar(25) collate utf8_bin default null,
  `anexo_rel_prim_semestre` varchar(255) collate utf8_bin default null,
  `anexo_rel_segun_semestre` varchar(255) collate utf8_bin default null,
  `atividade_compl` varchar(555) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=5 default charset=utf8 collate=utf8_bin;



create table  `filiacao` (
  `id` int(11) not null auto_increment,
  `fk_id_pessoal` int(11) default null,
  `nivel_parentesco` varchar(255) collate utf8_bin default null,
  `nome_parente` varchar(500) collate utf8_bin default null,
  `endereco` varchar(500) collate utf8_bin default null,
  `telefone` varchar(50) collate utf8_bin default null,
  `atividade_profissional` varchar(255) collate utf8_bin default null,
  `dinamica_familiar_obs` varchar(555) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=6 default charset=utf8 collate=utf8_bin;




create table  `filtros` (
  `table_name` varchar(64) character set utf8 not null default '',
  `column_name` varchar(64) character set utf8 not null default '',
  `label` varchar(64) character set utf8 not null default '',
  `data_type` varchar(64) character set utf8 not null default ''
) engine=innodb default charset=utf8 collate=utf8_bin;



create table  `hist_acolhidos` (
  `id` int(11) not null auto_increment,
  `nome` varchar(255) collate utf8_bin default null,
  `data_acolhimento` varchar(50) collate utf8_bin default null,
  `origem` varchar(50) collate utf8_bin default null,
  `data_nascimento` varchar(50) collate utf8_bin default null,
  `nome_pai` varchar(50) collate utf8_bin default null,
  `nome_mae` varchar(50) collate utf8_bin default null,
  `data_desligamento` varchar(50) collate utf8_bin default null,
  `destino` longtext collate utf8_bin,
  `info_diversas` longtext collate utf8_bin,
  primary key (`id`)
) engine=innodb auto_increment=2 default charset=utf8 collate=utf8_bin;




create table  `ocorrencia` (
  `id` int(11) not null auto_increment,
  `fk_id_pessoal` int(11) default null,
  `tipo` varchar(255) collate utf8_bin default null,
  `data` varchar(10) collate utf8_bin default null,
  `fato` varchar(255) collate utf8_bin default null,
  `anexo_bo` varchar(255) collate utf8_bin default null,
  `descricao_obs` varchar(555) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=2 default charset=utf8 collate=utf8_bin;



create table  `registro_tecnico` (
  `id` int(11) not null auto_increment,
  `fk_id_filiacao_visita` int(11) default null,
  `fk_id_pessoal` int(11) default null,
  `visita_domiciliar` varchar(255) collate utf8_bin default null,
  `informacoes_sobre_visita` varchar(255) collate utf8_bin default null,
  `data_audiencia` varchar(50) collate utf8_bin default null,
  `audiencia_declaracao_obs` varchar(555) collate utf8_bin default null,
  `data_visita_familiar` varchar(50) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=3 default charset=utf8 collate=utf8_bin;




create table  `saude` (
  `id` int(11) not null auto_increment,
  `fk_id_pessoal` int(11) default null,
  `tipo_consulta` varchar(255) collate utf8_bin default null,
  `data_da_consulta` varchar(50) collate utf8_bin default null,
  `medicamentos` varchar(255) collate utf8_bin default null,
  `exames` varchar(255) collate utf8_bin default null,
  `data_do_retorno` varchar(255) collate utf8_bin default null,
  `observacoes_medicas` varchar(255) collate utf8_bin default null,
  `anexo` varchar(255) collate utf8_bin default null,
  `update_at` timestamp null default current_timestamp on update current_timestamp,
  primary key (`id`)
) engine=innodb auto_increment=6 default charset=utf8 collate=utf8_bin;




create view `vw_atividade` as
   select d.nome,d.caminho_foto, a.* 
from atividade a inner join dados_pessoais d on d.id = a.fk_id_pessoal ;



create view `vw_educacao` as
   select d.nome,d.caminho_foto, e.* from educacao e inner join dados_pessoais d on d.id = e.fk_id_pessoal ;



create view `vw_filiacao` as
   select d.nome, d.caminho_foto, f.* from filiacao f inner join dados_pessoais d on d.id = f.fk_id_pessoal ;




create view `vw_list_filiacao` as
   select
d.nome as nome_crianca, f.nome_parente, 
f.id as id_parente,
f.id as id,
concat 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)as nome,

d.caminho_foto as caminho_foto
 from filiacao f inner join dados_pessoais d on d.id = f.fk_id_pessoal ;



create view `vw_ocorrencia` as
   select d.nome,d.caminho_foto, 
o.*  from 
ocorrencia o 
inner join dados_pessoais d on d.id = 
o.fk_id_pessoal ;



create view `vw_registro_tecnico` as
   select d.nome as nome_crianca,d.caminho_foto, f.nivel_parentesco, f.nome_parente, 
concat 
(f.nome_parente," - ", f.nivel_parentesco, " de ", d.nome)as nome,
r.* 
from registro_tecnico r
inner join filiacao f on f.id = r.fk_id_filiacao_visita
inner join dados_pessoais d on d.id = f.fk_id_pessoal ;



create view `vw_saude` as
   select s.* ,d.nome, d.caminho_foto from saude s inner join dados_pessoais d on d.id = s.fk_id_pessoal ;



delete from filtros where 1=1;
delete from admin where 1=1;

insert into `filtros` (`table_name`, `column_name`, `label`, `data_type`) values
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
  ('vw_filiacao', 'endereco', 'endereco', 'varchar'),
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



  insert into `admin` (`id`, `nome`, `email`, `senha`, `tipo_acesso`, `update_at`) values
  (7, 'usuario inicial ', 'admin@admin.com', 'admin', 'admin', '2019-10-14 21:00:02');