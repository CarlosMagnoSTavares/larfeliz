<?php 

require_once('Crud.class.php');

if (!empty($_POST)) 
{
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$table = 'usuarios';
	$setValues = " nome = '".$nome."', sobrenome = '".$sobrenome."' ";
	$where = " id = '$id' ";

	$crud = new Crud;
	$update= $crud->update($table,$setValues,$where);

	// echo $update;
	header('Location:index.php?start=update_'.$update);
}



?>


