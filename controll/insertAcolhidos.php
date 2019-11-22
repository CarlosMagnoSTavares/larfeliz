<?php 
require_once('Crud.class.php');

$telaRedirect="histAcolhidos.php";
$table = 'hist_acolhidos';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";



if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$nome = !empty($_POST['nome']) ? $_POST['nome'] : NULL;
	$data_acolhimento = !empty($_POST['data_acolhimento']) ? $_POST['data_acolhimento'] : NULL;
	$data_desligamento = !empty($_POST['data_desligamento']) ? $_POST['data_desligamento'] : NULL;
	$data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : NULL;
	$origem = !empty($_POST['origem']) ? $_POST['origem'] : NULL;
	$nome_pai = !empty($_POST['nome_pai']) ? $_POST['nome_pai'] : NULL;
	$nome_mae = !empty($_POST['nome_mae']) ? $_POST['nome_mae'] : NULL;
	$destino = !empty($_POST['destino']) ? $_POST['destino'] : NULL;
	$info_diversas = !empty($_POST['info_diversas']) ? $_POST['info_diversas'] : NULL;

		//Guarda anexo vindo do POST na pasta e pega o caminho como resposta para salvar no banco↓
	$anexo = isset($_FILES['anexo']) && $_FILES['anexo']['size'] > 0 ? 
			$crud->saveFile("anexo", $_FILES['anexo']): "";

	//Garante a persistencia dos anexos na edição (Caso não informe o anexo ele mantem o antigo)
	if ($acao == 'editar') {
		$where = " id = ".$_POST['id'];
		$query = $crud->select($table,$where,NULL,NULL);
		foreach ($files as $key => $file) 
		{
			$anexo = ($anexo=="")? $file['anexo'] : $anexo ;
		}
	}

	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	$values =  array
	(
		$nome,
		$data_acolhimento,
		$data_desligamento,
		$data_nascimento,
		$origem,
		$nome_pai,
		$nome_mae,
		$destino,
		$info_diversas,
		$anexo
	);

	$columns = array (
		'nome',
		'data_acolhimento',
		'data_desligamento',
		'data_nascimento',
		'origem',
		'nome_pai',
		'nome_mae',
		'destino',
		'info_diversas',
		'anexo'
	);
	


	$count = count($columns);
	$separador = "";
	$setValues = "";
	for ($i=0; $i < $count ; $i++) { 
		$setValues .= $separador.$columns[$i]." = '".$values[$i]."' ";
		$separador = ", ";
	}

	if ($acao =='inserir') {
		$insert = $crud->insert($table,$columns,$values);
		header('Location:../'.$telaRedirect.'?start=insert_'.$insert);
	}
	else if ($acao == 'editar') {
		$where = " id = ".$_POST['id'];
		$update= $crud->update($table,$setValues,$where);
		header('Location:../'.$telaRedirect.'?start=update_'.$update);
	}
	
}
?>