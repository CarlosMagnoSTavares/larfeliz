<?php 

require_once('Crud.class.php');

// DELETE USUARIO ↓
	$table = $_POST['table'];
	$where = ' id = '.$_POST['id'];

	$crud = new Crud;
	$delete = $crud->delete($table,$where);

	header('Location:../dadosPessoais.php?start=delete_'.$delete);
?>
