<?php 
require_once('Crud.class.php');

$telaRedirect="educacao.php";
$table = 'educacao';

$acao = isset($_POST['salvar'])? $_POST['salvar']:"vazio";



if (!empty($_POST)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$id = !empty($_POST['id'])? $_POST['id'] : NULL;
	$fk_id_pessoal = !empty($_POST['fk_id_pessoal'])? $_POST['fk_id_pessoal'] : NULL;

	$ano = !empty($_POST['ano'])? $_POST['ano'] : NULL;
	$tipo_escolaridade = !empty($_POST['tipo_escolaridade'])? $_POST['tipo_escolaridade'] : NULL;
	$escola = !empty($_POST['escola'])? $_POST['escola'] : NULL;
	$nome_pessoa_contato = !empty($_POST['nome_pessoa_contato'])? $_POST['nome_pessoa_contato'] : NULL;
	$numero_tel = !empty($_POST['numero_tel'])? $_POST['numero_tel'] : NULL;
	$numero_cel = !empty($_POST['numero_cel'])? $_POST['numero_cel'] : NULL;

	$limpar = !empty($_POST['limpar'])? $_POST['limpar'] : NULL;
	$salvar = !empty($_POST['salvar'])? $_POST['salvar'] : NULL;

	//Guarda anexo vindo do POST na pasta e pega o caminho como resposta para salvar no banco↓
	$anexo_rel_prim_semestre = isset($_FILES['anexo_rel_prim_semestre']) && $_FILES['anexo_rel_prim_semestre']['size'] > 0 ? 
			$crud->saveFile("anexo_rel_prim_semestre", $_FILES['anexo_rel_prim_semestre']): "";
	$anexo_rel_segun_semestre = isset($_FILES['anexo_rel_segun_semestre']) && $_FILES['anexo_rel_segun_semestre']['size'] > 0 ? 
			$crud->saveFile("anexo_rel_segun_semestre", $_FILES['anexo_rel_segun_semestre']): "";
	

	//Garante a persistencia dos files na edição (Caso não informe o anexo_rel_prim_semestre ele mantem o antigo)
	if ($acao == 'editar') {
		$where = " id = ".$_POST['id'];
		$query = $crud->select($table,$where,NULL,NULL);
		foreach ($files as $key => $file) 
		{
			$anexo_rel_prim_semestre = ($anexo_rel_prim_semestre=="")? $file['anexo_rel_prim_semestre'] : $anexo_rel_prim_semestre ;
			$anexo_rel_segun_semestre = ($anexo_rel_segun_semestre=="")? $file['anexo_rel_segun_semestre'] : $anexo_rel_segun_semestre ;
		}
	}



	$values =  array
	(
		$fk_id_pessoal,
		$ano,
		$tipo_escolaridade,
		$escola,
		$nome_pessoa_contato,
		$numero_tel,
		$numero_cel,
		$anexo_rel_prim_semestre,
		$anexo_rel_segun_semestre
	);

	$columns = array (
		'fk_id_pessoal',
		'ano',
		'tipo_escolaridade',
		'escola',
		'nome_pessoa_contato',
		'numero_tel',
		'numero_cel',
		'anexo_rel_prim_semestre',
		'anexo_rel_segun_semestre'
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