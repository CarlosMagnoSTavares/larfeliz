<?php 
require_once('Crud.class.php');

$telaRedirect="saude.php";
$table = 'saude';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";


if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$id = !empty($_POST['id'])? $_POST['id'] : NULL;
	$fk_id_pessoal = !empty($_POST['fk_id_pessoal'])? $_POST['fk_id_pessoal'] : NULL;

	$tipo_consulta = !empty($_POST['tipo_consulta'])? $_POST['tipo_consulta'] : NULL;
	$data_da_consulta = !empty($_POST['data_da_consulta'])? $_POST['data_da_consulta'] : NULL;
	$data_do_retorno = !empty($_POST['data_do_retorno'])? $_POST['data_do_retorno'] : NULL;
	$medicamentos = !empty($_POST['medicamentos'])? $_POST['medicamentos'] : NULL;
	$exames = !empty($_POST['exames'])? $_POST['exames'] : NULL;
	$observacoes_medicas = !empty($_POST['observacoes_medicas'])? $_POST['observacoes_medicas'] : NULL;


	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	$values =  array
	(
		$fk_id_pessoal,
		$tipo_consulta,
		$data_da_consulta,
		$data_do_retorno,
		$medicamentos,
		$exames,
		$observacoes_medicas
	);

	$columns = array (
		'fk_id_pessoal',
		'tipo_consulta',
		'data_da_consulta',
		'data_do_retorno',
		'medicamentos',
		'exames',
		'observacoes_medicas'
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