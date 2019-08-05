<?php 

require_once('Crud.class.php');

// DELETE USUARIO ↓
	$table = 'usuarios';
	$where = ' id = '.$_GET['id'];

	$crud = new Crud;
	$delete = $crud->delete($table,$where);

	header('Location:index.php?start=delete_'.$delete);
?>
