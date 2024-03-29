<?php 
require_once('Crud.class.php');

$telaRedirect="filiacao.php";

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";


if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$id = !empty($_POST['id'])? $_POST['id'] : NULL;
	$fk_id_pessoal = !empty($_POST['fk_id_pessoal'])? $_POST['fk_id_pessoal'] : NULL;
	$nivel_parentesco = !empty($_POST['nivel_parentesco'])? $_POST['nivel_parentesco'] : NULL;
	$nome_parente = !empty($_POST['nome_parente'])? $_POST['nome_parente'] : NULL;
	$endereco = !empty($_POST['endereco'])? $_POST['endereco'] : NULL;
	$telefone = !empty($_POST['telefone'])? $_POST['telefone'] : NULL;
	$atividade_profissional = !empty($_POST['atividade_profissional'])? $_POST['atividade_profissional'] : NULL;
	$dinamica_familiar_obs = !empty($_POST['dinamica_familiar_obs'])? $_POST['dinamica_familiar_obs'] : NULL;
	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	$values =  array
	(
		$fk_id_pessoal,
		$nivel_parentesco,
		$nome_parente,
		$endereco,
		$telefone,
		$atividade_profissional,
		$dinamica_familiar_obs
	);

	$columns = array (
		'fk_id_pessoal',
		'nivel_parentesco',
		'nome_parente',
		'endereco',
		'telefone',
		'atividade_profissional',
		'dinamica_familiar_obs'
	);
	
	$table = 'filiacao';


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




<?php












?>