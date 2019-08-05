<?php 

require_once('Crud.class.php');


// Recebe dados do POST ↓
if (!empty($_POST)) {
	
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$values =  array($nome,$sobrenome);
	$columns = array ('nome', 'sobrenome');
	$table = 'usuarios';
	$crud = new Crud;
	$insert = $crud->insert($table,$columns,$values);

	header('Location:index.php?start=insert_'.$insert);
}
?>

<!-- Formulário gera post -->
<form method="POST" action="">
	<br>NOME<input type="text" name="nome">
	<br>Sobrenome:<input type="text" name="sobrenome">
	<br><input type="submit" name="">
</form>