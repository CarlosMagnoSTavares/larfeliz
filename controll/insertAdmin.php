<?php 
require_once('Crud.class.php');

$telaRedirect="admin.php";
$table = 'admin';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";



if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$nome = !empty($_POST['nome'])? $_POST['nome'] : NULL;
	$email = !empty($_POST['email'])? $_POST['email'] : NULL;
	$senha = !empty($_POST['senha'])? $_POST['senha'] : NULL;
	$tipo_acesso = !empty($_POST['tipo_acesso'])? $_POST['tipo_acesso'] : NULL;

	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	$values =  array
	(
		$nome,
		$email,
		$senha,
		$tipo_acesso
	);

	$columns = array (
		'nome',
		'email',
		'senha',
		'tipo_acesso'
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