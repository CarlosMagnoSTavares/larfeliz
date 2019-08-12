<?php 

require_once('Crud.class.php');

// Recebe dados do POST ↓
if (!empty($_POST)) {

	$crud = new Crud;
	
	$nome = !empty($_POST['nome'])? $_POST['nome'] : NULL;
	$endereco = !empty($_POST['endereco'])? $_POST['endereco'] : NULL;
	$data_acolhimento = !empty($_POST['data_acolhimento'])? $_POST['data_acolhimento'] : NULL;
	$data_desligamento = !empty($_POST['data_desligamento'])? $_POST['data_desligamento'] : NULL;
	$motivo_acolhimento = !empty($_POST['motivo_acolhimento'])? $_POST['motivo_acolhimento'] : NULL;
	$dados_bancarios = !empty($_POST['dados_bancarios'])? $_POST['dados_bancarios'] : NULL;
	$tipo_sanguineo = !empty($_POST['tipo_sanguineo'])? $_POST['tipo_sanguineo'] : NULL;
	$aspectos_gerais_obs = !empty($_POST['aspectos_gerais_obs'])? $_POST['aspectos_gerais_obs'] : NULL;
	$visitas_familiares_obs = !empty($_POST['visitas_familiares_obs'])? $_POST['visitas_familiares_obs'] : NULL;
	
	$foto = isset($_FILES['foto'])? $crud->saveFile("foto",$_FILES['foto']): NULL;
	$anexo_certidao = isset($_FILES['anexo_certidao'])? $crud->saveFile("anexo_certidao",$_FILES['anexo_certidao']): NULL;
	$anexo_CPF = isset($_FILES['anexo_CPF'])? $crud->saveFile("anexo_CPF",$_FILES['anexo_CPF']): NULL;
	$anexo_cartao_cidadao = isset($_FILES['anexo_cartao_cidadao'])? $crud->saveFile("anexo_cartao_cidadao",$_FILES['anexo_cartao_cidadao']): NULL;
	$anexo_carteira_vacinacao = isset($_FILES['anexo_carteira_vacinacao'])? $crud->saveFile("anexo_carteira_vacinacao",$_FILES['anexo_carteira_vacinacao']): NULL;
	$anexo_guia_recolhimento = isset($_FILES['anexo_guia_recolhimento'])? $crud->saveFile("anexo_guia_recolhimento",$_FILES['anexo_guia_recolhimento']): NULL;
	$anexo_determinacao_acolhimento = isset($_FILES['anexo_determinacao_acolhimento'])? $crud->saveFile("anexo_determinacao_acolhimento",$_FILES['anexo_determinacao_acolhimento']): NULL;
	$anexo_historico_escolar = isset($_FILES['anexo_historico_escolar'])? $crud->saveFile("anexo_historico_escolar",$_FILES['anexo_historico_escolar']): NULL;

	$values =  array
	(
		$nome,
		$endereco,
		$data_acolhimento,
		$data_desligamento,
		$motivo_acolhimento,
		$dados_bancarios,
		$tipo_sanguineo,
		$aspectos_gerais_obs,
		$visitas_familiares_obs,
		$foto,
		$anexo_certidao,
		$anexo_CPF,
		$anexo_cartao_cidadao,
		$anexo_carteira_vacinacao,
		$anexo_guia_recolhimento,
		$anexo_determinacao_acolhimento,
		$anexo_historico_escolar
	);

	$columns = array ('nome','endereco','data_acolhimento','data_desligamento','motivo_acolhimento','dados_bancarios','tipo_sanguineo','aspectos_gerais_obs','visitas_familiares_obs','caminho_foto','anexo_certidao','anexo_CPF','anexo_cartao_cidadao','anexo_carteira_vacinacao','anexo_guia_recolhimento','anexo_determinacao_acolhimento','anexo_historico_escolar');
	$table = 'dados_pessoais';
	
	$insert = $crud->insert($table,$columns,$values);

	header('Location:../dadosPessoais.php?start=insert_'.$insert);
	
}
?>




<?php












?>