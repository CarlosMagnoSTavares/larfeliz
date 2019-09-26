<?php 
require_once('Crud.class.php');

$telaRedirect="ocorrencias.php";
$table = 'ocorrencia';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";


if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$id = !empty($_POST['id'])? $_POST['id'] : NULL;
	$fk_id_pessoal = !empty($_POST['fk_id_pessoal'])? $_POST['fk_id_pessoal'] : NULL;


	$tipo = !empty($_POST['tipo'])? $_POST['tipo'] : NULL;
	$data = !empty($_POST['data'])? $_POST['data'] : NULL;
	$fato = !empty($_POST['fato'])? $_POST['fato'] : NULL;
	$descricao_obs = !empty($_POST['descricao_obs'])? $_POST['descricao_obs'] : NULL;

	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	//Guarda anexo_bo vindo do POST na pasta e pega o caminho como resposta para salvar no banco↓
	$anexo_bo = isset($_FILES['anexo_bo']) && $_FILES['anexo_bo']['size'] > 0 ? 
			$crud->saveFile("anexo_bo", $_FILES['anexo_bo']): "";

	//Garante a persistencia dos anexo_bos na edição (Caso não informe o anexo_bo ele mantem o antigo)
	if ($acao == 'editar') {
		$where = " id = ".$_POST['id'];
		$query = $crud->select($table,$where,NULL,NULL);
		foreach ($files as $key => $file) 
		{
			$anexo_bo = ($anexo_bo=="")? $file['anexo_bo'] : $anexo_bo ;
		}
	}



	$values =  array
	(
		$fk_id_pessoal,
		$tipo,
		$data,
		$fato,
		$descricao_obs,
		$anexo_bo
	);

	$columns = array (
		'fk_id_pessoal',
		'tipo',
		'data',
		'fato',
		'descricao_obs',
		'anexo_bo'
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