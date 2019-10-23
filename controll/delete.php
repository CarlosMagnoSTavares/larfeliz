<?php 

require_once('Crud.class.php');

// DELETE USUARIO ↓
	$table = $_POST['table'];
	$where = ' id = '.$_POST['id'];
	$telaRedirect = $_POST['telaRedirect'];

	$crud = new Crud;
	$select = $crud->select($table,$where);//traz os dados para deletar depois

	$delete = $crud->delete($table,$where);

	header('Location:../'.$telaRedirect.'?start=delete_'.$delete);
?>
