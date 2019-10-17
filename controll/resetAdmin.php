<?php 
require_once('Crud.class.php');

echo "reset -> true or false?";

$telaRedirect="admin.php";
$table = 'admin';

$acao = isset($_GET['reset'])? $_GET['reset']:"vazio";



if (!empty($_GET)) {

	$crud = new Crud;

	// Recebe dados do POST ↓
	$nome = "Admin Inicial";
	$email = "admin@admin.com";
	$senha = "admin";
	$tipo_acesso = "ADMIN";

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
		$setValues .= $separador.$columns[$i]." = '".$values[$i]."' ";
		$separador = ", ";
	}

	if ($acao =='true') {
		$insert = $crud->insert($table,$columns,$values);
		echo "Admin default criado com sucesso";
	}
	
	
}
?>