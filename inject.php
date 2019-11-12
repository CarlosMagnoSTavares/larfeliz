<?php
include_once('include/header.php'); 

if (isset($_POST['query'])) 
{
	require_once('controll/Crud.class.php');
	$query = $_POST['query'];
	$crud = new Crud;
	$result = $crud->inject($query);
	echo "<pre>";
	var_dump($result);

}

?>
<form method="POST" action="inject.php">
	<input type="text" name="query">
	<input type="submit" name="submit">
</form>

<?php include_once('include/footer.php'); ?>