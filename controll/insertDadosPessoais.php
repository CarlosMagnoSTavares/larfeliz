<?php 

require_once('Crud.class.php');

// Recebe dados do POST ↓
if (!empty($_POST)) {
	
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$data_acolhimento = $_POST['data_acolhimento'];
	$data_desligamento = $_POST['data_desligamento'];
	$motivo_acolhimento = $_POST['motivo_acolhimento'];
	$dados_bancarios = $_POST['dados_bancarios'];
	$tipo_sanguineo = $_POST['tipo_sanguineo'];
	$aspectos_gerais_obs = $_POST['aspectos_gerais_obs'];
	$visitas_familiares_obs = $_POST['visitas_familiares_obs'];
	$foto = $_POST['foto'];
	$anexo_certidao = $_POST['anexo_certidao'];
	$anexo_CPF = $_POST['anexo_CPF'];
	$anexo_cartao_cidadao = $_POST['anexo_cartao_cidadao'];
	$anexo_carteira_vacinacao = $_POST['anexo_carteira_vacinacao'];
	$anexo_guia_recolhimento = $_POST['anexo_guia_recolhimento'];
	$anexo_determinacao_acolhimento = $_POST['anexo_determinacao_acolhimento'];
	$anexo_historico_escolar = $_POST['anexo_historico_escolar'];

	$values =  array($nome,$endereco,$data_acolhimento,$data_desligamento,$motivo_acolhimento,$dados_bancarios,$tipo_sanguineo,$aspectos_gerais_obs,$visitas_familiares_obs,$foto,$anexo_certidao,$anexo_CPF,$anexo_cartao_cidadao,$anexo_carteira_vacinacao,$anexo_guia_recolhimento,$anexo_determinacao_acolhimento,$anexo_historico_escolar);

	$columns = array ('nome','endereco','data_acolhimento','data_desligamento','motivo_acolhimento','dados_bancarios','tipo_sanguineo','aspectos_gerais_obs','visitas_familiares_obs','foto','anexo_certidao','anexo_CPF','anexo_cartao_cidadao','anexo_carteira_vacinacao','anexo_guia_recolhimento','anexo_determinacao_acolhimento','anexo_historico_escolar');
	$table = 'dados_pessoais';
	$crud = new Crud;
	$insert = $crud->insert($table,$columns,$values);

	header('Location:../dadosPessoais.php?start=insert_'.$insert);
}
?>

<!-- Formulário gera post -->
<form method="POST" action="">
	<br>NOME<input type="text" name="nome">
	<br>Sobrenome:<input type="text" name="sobrenome">
	<br><input type="submit" name="">
</form>