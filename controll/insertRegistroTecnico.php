<?php 
require_once('Crud.class.php');

$telaRedirect="registroTecnico.php";
$table = 'registro_tecnico';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";


if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$id = !empty($_POST['id'])? $_POST['id'] : NULL;
	$fk_id_filiacao_visita = !empty($_POST['fk_id_filiacao_visita'])? $_POST['fk_id_filiacao_visita'] : NULL;

	$visita_domiciliar = !empty($_POST['visita_domiciliar'])? $_POST['visita_domiciliar'] : NULL;
	$data_audiencia = !empty($_POST['data_audiencia'])? $_POST['data_audiencia'] : NULL;
	$data_visita_familiar = !empty($_POST['data_visita_familiar'])? $_POST['data_visita_familiar'] : NULL;
	$informacoes_sobre_visita = !empty($_POST['informacoes_sobre_visita'])? $_POST['informacoes_sobre_visita'] : NULL;
	$audiencia_declaracao_obs = !empty($_POST['audiencia_declaracao_obs'])? $_POST['audiencia_declaracao_obs'] : NULL;

	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	

	$values =  array
	(
		$fk_id_filiacao_visita,
		$visita_domiciliar,
		$data_audiencia,
		$data_visita_familiar,
		$informacoes_sobre_visita,
		$audiencia_declaracao_obs
	);

	$columns = array (
		'fk_id_filiacao_visita',
		'visita_domiciliar',
		'data_audiencia',
		'data_visita_familiar',
		'informacoes_sobre_visita',
		'audiencia_declaracao_obs'
	);
	


	$count = count($columns);
	$separador = "";
	$setValues = "";
	for ($i=0; $i < $count ; $i++) { 
		$setValues .= $separador.htmlspecialchars($columns[$i])." = '".htmlspecialchars($values[$i])."' ";
		$separador = ", ";
	}

	if ($acao =='inserir') {
		$insert = $crud->insert($table,$columns,$values);
		header('Location:../'.htmlspecialchars($telaRedirect).'?start=insert_'.htmlspecialchars($insert);
	}
	else if ($acao == 'editar') {
		$where = " id = ".htmlspecialchars($_POST['id']);
		$update= $crud->update($table,$setValues,$where);
		header('Location:../'.htmlspecialchars($telaRedirect).'?start=update_'.htmlspecialchars($update);
	}
	
}
?>