<?php 
require_once('Crud.class.php');

$telaRedirect="atividades.php";
$table = 'atividade';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";



if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$id = !empty($_POST['id'])? $_POST['id'] : NULL;
	$fk_id_pessoal = !empty($_POST['fk_id_pessoal'])? $_POST['fk_id_pessoal'] : NULL;


	$frequencia = !empty($_POST['frequencia'])? $_POST['frequencia'] : NULL;
	$dia = !empty($_POST['dia'])? $_POST['dia'] : NULL;
	$horario = !empty($_POST['horario'])? $_POST['horario'] : NULL;
	$local = !empty($_POST['local'])? $_POST['local'] : NULL;


	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;




	$values =  array
	(
		$fk_id_pessoal,
		$frequencia,
		$dia,
		$horario,
		$local
	);

	$columns = array (
		'fk_id_pessoal',
		'frequencia',
		'dia',
		'horario',
		'local'
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