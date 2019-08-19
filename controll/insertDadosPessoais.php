<?php 
require_once('Crud.class.php');

$acao = isset($_POST['salvar']) && !empty($_POST['salvar'])? $_POST['salvar']:"vazio";
$table = 'dados_pessoais';
$telaRedirect="dadosPessoais.php";


if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$nome = !empty($_POST['nome'])? $_POST['nome'] : NULL;
	$endereco = !empty($_POST['endereco'])? $_POST['endereco'] : NULL;
	$data_acolhimento = !empty($_POST['data_acolhimento'])? $_POST['data_acolhimento'] : NULL;
	$data_desligamento = !empty($_POST['data_desligamento'])? $_POST['data_desligamento'] : NULL;
	$motivo_acolhimento = !empty($_POST['motivo_acolhimento'])? $_POST['motivo_acolhimento'] : NULL;
	$dados_bancarios = !empty($_POST['dados_bancarios'])? $_POST['dados_bancarios'] : NULL;
	$tipo_sanguineo = !empty($_POST['tipo_sanguineo'])? $_POST['tipo_sanguineo'] : NULL;
	$aspectos_gerais_obs = !empty($_POST['aspectos_gerais_obs'])? $_POST['aspectos_gerais_obs'] : NULL;
	$visitas_familiares_obs = !empty($_POST['visitas_familiares_obs'])? $_POST['visitas_familiares_obs'] : NULL;
	

	//Guarda anexo vindo do POST na pasta e pega o caminho como resposta para salvar no banco↓
	$foto = isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 ? 
			$crud->saveFile("foto", $_FILES['foto']): "zero";

	$anexo_certidao = isset($_FILES['anexo_certidao']) && $_FILES['anexo_certidao']['size'] > 0 ? 
			$crud->saveFile("anexo_certidao", $_FILES['anexo_certidao']): "zero";

	$anexo_CPF = isset($_FILES['anexo_CPF']) && $_FILES['anexo_CPF']['size'] > 0 ? 
			$crud->saveFile("anexo_CPF", $_FILES['anexo_CPF']): "zero";

	$anexo_cartao_cidadao = isset($_FILES['anexo_cartao_cidadao']) && $_FILES['anexo_cartao_cidadao']['size'] > 0 ? 
			$crud->saveFile("anexo_cartao_cidadao", $_FILES['anexo_cartao_cidadao']): "zero";

	$anexo_carteira_vacinacao = isset($_FILES['anexo_carteira_vacinacao']) && $_FILES['anexo_carteira_vacinacao']['size'] > 0 ? 
			$crud->saveFile("anexo_carteira_vacinacao", $_FILES['anexo_carteira_vacinacao']): "zero";

	$anexo_guia_recolhimento = isset($_FILES['anexo_guia_recolhimento']) && $_FILES['anexo_guia_recolhimento']['size'] > 0 ? 
			$crud->saveFile("anexo_guia_recolhimento", $_FILES['anexo_guia_recolhimento']): "zero";

	$anexo_determinacao_acolhimento = isset($_FILES['anexo_determinacao_acolhimento']) && $_FILES['anexo_determinacao_acolhimento']['size'] > 0 ? 
			$crud->saveFile("anexo_determinacao_acolhimento", $_FILES['anexo_determinacao_acolhimento']): "zero";

	$anexo_historico_escolar = isset($_FILES['anexo_historico_escolar']) && $_FILES['anexo_historico_escolar']['size'] > 0 ? 
			$crud->saveFile("anexo_historico_escolar", $_FILES['anexo_historico_escolar']): "zero";


	//Garante a persistencia dos anexos na edição (Caso não informe o anexo ele mantem o antigo)
	if ($acao == 'editar') {
		$where = " id = ".$_POST['id'];
		$anexos = $crud->select($table,$where,NULL,NULL);
		foreach ($anexos as $key => $anexo) 
		{
			$foto = ($foto=="zero")? $anexo['caminho_foto'] : $foto ;
			$anexo_certidao = ($anexo_certidao=="zero")? $anexo['anexo_certidao'] : $anexo_certidao ;
			$anexo_CPF = ($anexo_CPF=="zero")? $anexo['anexo_CPF'] : $anexo_CPF ;
			$anexo_cartao_cidadao = ($anexo_cartao_cidadao=="zero")? $anexo['anexo_cartao_cidadao'] : $anexo_cartao_cidadao ;
			$anexo_carteira_vacinacao = ($anexo_carteira_vacinacao=="zero")? $anexo['anexo_carteira_vacinacao'] : $anexo_carteira_vacinacao ;
			$anexo_guia_recolhimento = ($anexo_guia_recolhimento=="zero")? $anexo['anexo_guia_recolhimento'] : $anexo_guia_recolhimento ;
			$anexo_determinacao_acolhimento = ($anexo_determinacao_acolhimento=="zero")? $anexo['anexo_determinacao_acolhimento'] : $anexo_determinacao_acolhimento ;
			$anexo_historico_escolar = ($anexo_historico_escolar=="zero")? $anexo['anexo_historico_escolar'] : $anexo_historico_escolar ;
		}
	}


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

	$columns = array 
	(
		'nome',
		'endereco',
		'data_acolhimento',
		'data_desligamento',
		'motivo_acolhimento',
		'dados_bancarios',
		'tipo_sanguineo',
		'aspectos_gerais_obs',
		'visitas_familiares_obs',
		'caminho_foto',
		'anexo_certidao',
		'anexo_CPF',
		'anexo_cartao_cidadao',
		'anexo_carteira_vacinacao',
		'anexo_guia_recolhimento',
		'anexo_determinacao_acolhimento',
		'anexo_historico_escolar'
	);
	

	$count = count($columns);
	$separador = "";
	$setValues = "";
	for ($i=0; $i < $count ; $i++) 
	{ 
		$setValues .= $separador.$columns[$i]." = '".$values[$i]."' ";
		$separador = ", ";
	}

	if ($acao =='inserir') 
	{
		$insert = $crud->insert($table,$columns,$values);
		header('Location:../'.$telaRedirect.'?start=insert_'.$insert);
	}
	else if ($acao == 'editar') 
	{
		$where = " id = ".$_POST['id'];
		$update= $crud->update($table,$setValues,$where);
		header('Location:../'.$telaRedirect.'?start=update_'.$update);
	}
	
}
?>